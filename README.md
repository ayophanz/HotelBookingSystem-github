# 26909. Test Assignment for Laravel _ Frontend 

https://app.codeline.io/#/projects/3060/tasks/26909


Step 1-->
Database Config.
Goto root folder.
	Duplicate .env.example file:
		->rename it ".env" without quote, use editor like vscode or sublime to rename.

	Setting up database in .env credentials:
		->set APP_name to "hotelbookingsystem" without quote.
		->set DB_DATABASE to "HotelBookingSystem" without quote.
		->set DB_USERNAME to "root" without quote.
		->set DB_PASSWORD leave it empty.


Step 2-->
Database Dummy & plugins Dependencies Config.
Goto root folder using terminal or cmd type code below.
	Run migration:
		->php artisan migrate

	Seeding dummy data: 
		->php artisan migrate:refresh
		->php artisan db:seed

	Install dependencies:
		->composer install
		->npm install	


Step 3-->
Well done
Credential to access login:
	->username: admin@me.com
	->password: qwerty123		



Note:
I was not be able to Follow SPA because I am still learning in vuejs,
I hope you consider.

Thank you