-> php composer.phar require webzera/laradmin
Auth
-----
-> php composer.phar require laravel/ui
-> php artisan ui vue --auth

Auth guard [admin] defined config/auth.php file
-----------------------------------------------
Laravel uses guards for authentication which allows you to manage multiple authenticated instances from multiple tables. To create a new guard open the auth.php from the config directory:
'guards' => [
	[...],
	'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
],
'providers' => [
	[...],
	'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],
],
'passwords' => [
        [...],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

the database seeder file need to update so add force command
-> php artisan vendor:publish --force


-> php artisan migrate:fresh

admin user email : johnszen@gmail.com
admin password : password