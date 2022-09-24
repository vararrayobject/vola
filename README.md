Follow the steps to run the project
1. Clone the Repository from given link
2. Go inside the cloned folder and run command - "composer install"
3. Copy .env.example to .env with command - "cp .env.example .env"
4. Run command - "php artisan key:generate" to generate app key
5. Create a table in mysql and fill the DB_DATABASE= variable accordingly
6. Run command - "php artisan migrate --seed" to create tables and insert data into table
7. Run command - "php artisan serve" to run the project
8. To generate report run {Base_url}/api/generate-report - you will receive filename with path in response
9. To download report run {Base_url}/api/download-report?filename={FILENAME_FROM_PREVIOUS_STEP_RESPONSE}.csv
