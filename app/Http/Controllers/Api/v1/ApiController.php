<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileNameRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Models\UserProfile;
use Carbon\Carbon;
use Response;
use Storage;


class ApiController extends Controller
{
    use ApiResponseTrait;

    private const DIRECTORY = 'files/';

    public function generateReport()
    {
        $users = UserProfile::with(['user'])
        ->select(['city', 'userId'])
        ->orderBy('city')
        ->get()
        ->groupBy(['city', 'user.isActive']);

        if (!Storage::disk('local')->exists(Self::DIRECTORY)) {
            Storage::makeDirectory(Self::DIRECTORY);
        }

        $filename =  storage_path("app/" . Self::DIRECTORY . Carbon::now()->timestamp . '_report.csv');
        $handle = fopen($filename, 'w');

        fputcsv($handle, [
            "city",
            "activeCount",
            "inactiveCount",
        ]);

        // $finalArray = [];
        foreach ($users as $key => $value) {
            // array_push($finalArray, [
            //     'city' => $key,
            //     'activeUsers' => $value[1]->count(),
            //     'inActiveUsers' => $value[0]->count(),
            // ]);
            fputcsv($handle, [
                $key,
                $value[1]->count(),
                $value[0]->count(),
            ]);
        }

        fclose($handle);
        return $this->successResponse(200, $filename);
    }

    public function downloadReport(FileNameRequest $request)
    {
        $validated = $request->validated();
        $filePath = Self::DIRECTORY . $validated['filename'];

        if(Storage::disk('local')->exists($filePath)){
            return Response::download(storage_path("app/" . $filePath));
        } else {
            return $this->errorResponse(404, 'File Not Found');
        }
    }
}
