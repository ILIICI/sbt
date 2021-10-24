1 step: Create MySQL database with name (for example : laravel)<br />


2 step: Edit .env file, add your database credentials, ( an example is shown below)<br />


DB_CONNECTION=mysql<br />
DB_HOST=127.0.0.1<br />
DB_PORT=3306<br />
DB_DATABASE=laravel<br />
DB_USERNAME=root<br />
DB_PASSWORD=<br />


3 step: CLI commands.<br />

Open terminal and run the following commands<br />

php artisan serve<br />
php artisan migrate<br />
php artisan db:seed<br />
By default seeder will create an user:<br />

login: user@gmail.com<br />
psw:  password<br />

Also feel free to create an user on your own.<br />
