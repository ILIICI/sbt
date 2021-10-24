1 step: Create MySQL database with name (for example : laravel)<br />


2 step: Edit .env file, add your database credentials, ( an example is shown below)<br />


DB_CONNECTION=mysql<br />
DB_HOST=127.0.0.1<br />
DB_PORT=3306<br />
DB_DATABASE=laravel<br />
DB_USERNAME=root<br />
DB_PASSWORD=<br />


3 step: CLI commands.

Open terminal and run the following commands

php artisan serve
php artisan migrate
php artisan db:seed
By default seeder will create an user:

login: user@gmail.com
psw:  password

Also feel free to create an user on your own.
