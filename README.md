<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## 1. Getting Started with Laravel

Before anything else, make sure PHP and Composer are installed on your local workstation before starting your first Laravel project. PHP and Composer can be installed via Homebrew if you are working on macOS development and in Windows manually installed xampp and composer on browser. Additionally, I advise setting up NPM and Node.

- Xampp Installation link: [Xampp](https://www.apachefriends.org/download.html)
- Composer Installtion link: [Composer](https://getcomposer.org/download/)

After you have installed PHP and Composer, you may create a new Laravel in different ways.

## Your first laravel project

- You may create you laravel project via composer command:
```
 composer create-project laravel/laravel example-app
```

Alternatively, you can start your Laravel projects by using Composer to globally install the Laravel installer:

- You may create you laravel project via composer command:
```
 composer global require laravel/installer
 
 laravel new example-app
```

Congratulations, you have now create your first laravel project.🥳
<hr>


## 2. Laravel Debugbar

Laravel Debugbar is a php package that allows you to quickly debug your application during development. PHP debugbar includes a service provider to register a debugbar in the browser.

- Laravel Debugbar Documentation: [Laravel-Debugbar](https://github.com/barryvdh/laravel-debugbar)

After you have installed PHP and Composer, you may create a new Laravel in different ways.

## Setting up Laravel Debugbar

Debugbar package will be added through command line interface. You IDE has integrated terminal that allows you to perform and execute commands.

- In order to install Laravel-Debugbar. Perform this command in terminal.
```
composer require barryvdh/laravel-debugbar --dev
```

> Note, "<em><strong>--dev<strong></em>" keywork is use to specifically view the package in development mode.

- You may create you laravel project via composer command:
```
 composer global require laravel/installer
 
 laravel new example-app
```

## 3. Config and ENV file

The env file gives a very convenient way of manipulating the behavior of our application in these different environments. configuration of database connection, mailer, aws can be done in config file.


### Two (2) important variables in config file
- APP_KEY
- APP_DEBUG

This 2 variables are used for debug purpose and the app_key is the unique application key for your project.

## 4. Controller

Controller are responsible to determine how the HTTP request should be handled. It also serve as the medium between model, view, and other resources.

- In order to make a controller, artisan can make the job easily by just typing the command:.
```
php artisan make:controller UserController --resource
```
> Note, "<em><strong>--resource<strong></em>" keywork is optional. The purpose of it is to generate a contoller with complete method package.

## 5. Single Action Controller

In php, we have "<em><strong>__invoke()<strong></em>" magic method that will make a class run as a function. Whenever you use one single method inside controller I recommend to use __invoke() method.

- In order to make a controller with __invoke() method, artisan can make the job easily by just typing the command:.
```
php artisan make:controller HomeController --invokable
```

## 6. Routing

In laravel, We process all requests with the helps of routes. Laravel provide 6 route option which we can use in our web.php file.

### Six (6) available route method
- GET - Request a resource
- POST - Create a new resource
- PUT - Update a resource
- PATCH - Modify a resource
- Delete - Delete the resource
- OPTIONS - Ask the server which verbs are allowed

We can used the following route method via:

- GET 
```
Route::get('/blog', [PostsController::class, 'index']);
Route::get('/blog/1', [PostsController::class, 'show']);
```

- POST 
```
Route::get('/blog/create', [PostsController::class, 'create']);
Route::post('/blog', [PostsController::class, 'store']);
```

- PUT or PATCH
```
Route::get('/blog/edit/1', [PostsController::class, 'edit']);
Route::patch('/blog/1', [PostsController::class, 'update']);
```

- DELETE
```
Route::delete('/blog/1', [PostsController::class, 'destroy']);
```

- Multiple HTTP verbs
```
Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);
Route::any('/blog', [PostsController::class, 'index']);
```

- Return only a view
```
Route::view('/blog', 'blog.index', ['name' => 'Jesther Costinar']);
```


## 👨‍💻Contact Me 🚀🔵
- Email - jesther.jc15@gmail.com
- LinkedIn - https://www.linkedin.com/in/jesther-costinar/
- Facebook - https://www.facebook.com/jeestheeer
- Instagram - https://www.instagram.com/kaassmir/
- Twitter - https://twitter.com/kasmir_
