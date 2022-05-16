
## How to run this project

The project can be run by following these steps:
1. composer install
2. change the store function in page "RegisteredUserController.php" to:
 
    public function store(Request $request, CreatesNewUsers $creator): RegisterResponse 
    { 
        $user = $creator->create($request->all());
        $user->attachRole('User');
        event(new Registered($user));
        $this->guard->login($user);
        return app(RegisterResponse::class);
    }
    
// this page in path" ..vendor\laravel\fortify\src\Http\Controllers\RegisteredUserController.php"


3. npm install
4. cp .env.example .env
5. create database in phpmyadmin same name the databaes in .evn file
6. php artisan key:generate
7. php artisan migrate --seed
8. npm run dev
9. php artisan storage:link
10. php artisan optimize 
11. php artisan serv

## The user name and password 
1. Admin@gmail.com ==>> 123456789
2. OfficeAdmin@gmail.com ==> 123456789
3. Worker@gmail.com ==> 123456789
4. User@gmail.com ==> 123456789

# Taajeercom

