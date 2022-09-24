Follow the steps to run the project
1. Clone the Repository from given link
2. Go inside the cloned folder and run command - "composer install"
3. Copy .env.example to .env with command - "cp .env.example .env"
4. Run "php artisan key:generate" command to generate app key
5. Run command - "php artisan migrate --seed" to create tables and insert data into table
6. Run "php artisan serve" command to run the project
7. To generate report run {Base_url}/api/generate-report
8. To generate report run {Base_url}/api/download-report?filename=1664022751_report.csv