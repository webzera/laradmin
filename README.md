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
            'model' => Webzera\Laradmin\Admin::class,
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

add this line to main route>web.php file

# Route::get('/admin', 'AdminController@index')->name('admin::home');

-> php composer.phar dump-autoload

the database seeder file need to update so add force command
-> php artisan vendor:publish --force

In Http/Kenel.php add this line in
protected $routeMiddleware = [
    [...],
    'checkrole' => \App\Http\Middleware\CheckRole::class,
]
-> php composer.phar dump-autoload //must use before migration
-> php artisan migrate:fresh

change mail credentials like [mailtrap] in .env file