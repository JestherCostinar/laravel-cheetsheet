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

## 7. Route Parameter

In laravel with the help of Route Parameter you don't need to define a static id in our route URI.

- Route Parameter example 
```
Route::get('/blog/{id}', [PostsController::class, 'show']);
```
> Note, the "<em><strong>{id}<strong></em>" parameter act as wildcard in your uri.

## 8. Routes with Expressions
Laravel has a cool feature which you can add regex pattern for your route parameter.

- Routes with Expression Example:
```
Route::get('/blog/{id}', [PostsController::class, 'show'])->whereNumber('id');
```
> The code above is the same with <em><strong>Route::get('/blog/{id}', [PostsController::class, 'show'])->where('id', '[0-9]+');
<strong></em>". Laravel have this feature so that you will just type the method than the regex.


- Routes with String RegEx:
```
Route::get('/blog/{name}', [PostsController::class, 'show'])->whereAlpha('name');
```

## 9. Named Route
Laravel comes up with the cool features that will makes the anchor tag link dynamic by naming each route.

- Go to your web.php file then chain your route to your href tag
```
Route::get('/blog', [PostsController::class, 'index'])->name('blog.index');
```

- Now, go to your blade php file to dynamically changes the href link bases on your named route.
```
<a href={{ route('blog.index') }}>Blog</a>
```
> TIPS: Whenever you are working in an application where you want to make process of changing dynamic use named route.

## 10. Route prefixes
Whenever you are working with a routes with same pattern much better to group it.

```
Route::prefix('/blog')->group(function() {
    Route::get('/', [PostsController::class, 'index'])->name('blog.index');
    Route::get('/{id}', [PostsController::class, 'show'])->whereNumber('id');

    // POST
    Route::get('/create', [PostsController::class,'create']);
    Route::post('/blog', [PostsController::class, 'store']);

    // PUT or PATCH
    Route::get('/edit/{id}', [PostsController::class, 'edit']);
    Route::patch('/{id}', [PostsController::class, 'update']);

    // DELETE
    Route::delete('/{id}', [PostsController::class, 'destroy']);
});
```
> As you can see, the routes group with the prefix of blog. The root of everyroutes in the group is the prefix blog.

## 11. Fallback Route
Whenener fallback Route use in an application, it override the 404 page.

- To use fallback route. Define the following code.
```
Route::fallback(FallbackController::class);
```
> NOTE: fallback route should always at the bottom of the all route

## 12. Setting up laravel database

- Open the .env file and configure the database access

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelapp
DB_USERNAME=root
DB_PASSWORD=
```

## 13. Migration

Migration is like version control for your database. It helps allow the team to modify the database as well as share it across domain and plaform.

Migration allows us to create table in the database

> In laravel, Migration refer as a Table.

In order to create a migration, you need to perform the make:migration command instead manually creating a migation.

```
php artisan make:migration create_example_table
```

Once you've done creating a table and  the column inside the "<em><strong>up()<strong></em>" method. You need to perform a artisan command that will run all the "<em><strong>up()<strong></em>" method that haven't migrate recently.

```
php artisan migrate
```

### Some useful migration command
```
php artisan migration:status
```
> This will check each migration status.

```
php artisan migration:reset
```
> This will rollback/reset each single migration.

```
php artisan migration:refresh
```
> This will refresh each single migration.

## 14. Seeders
In laravel, You don't need to add rows in your database manually because seeders will do the job for us.

Seeders in laravel is important when generating dummy data for our database. 

In order to create a seeder, perform the command:
```
php artisan make:seeder ExampleTableSeeder
```

In order the generate data, perform the following command inside the "<em><strong>run()<strong></em>" method.

```
$posts = [
            [
                'title' => 'Post One',
                'excerpt' => 'Summary of Post One',
                'body' => 'Body of Post One',
                'image_path' => 'Empty',
                'is_published' => false,
                'min_to_read' => 2,
            ],
            [
                'title' => 'Post Two',
                'excerpt' => 'Summary of Post Two',
                'body' => 'Body of Post Two',
                'image_path' => 'Empty',
                'is_published' => false,
                'min_to_read' => 2,
            ]
        ];

foreach($posts as $key => $value) {
            Post::create($value);
}
```
> NOTE: Keep your seeders clean with real data.

Now, Navigate to "<em><strong>DatabaseSeeder.php<strong></em>" and add the following code.
```
public function run()
{
    $this->call(PostsTableSeeder::class);
}
```

Now, it's time for run our seeder.

### Two option to run seeder
- Run Only the Seeder
```
php artisan db:seed
```
> It will run your seeder without migration.

- Run Migrate and Seeder
```
php artisan migrate --seed
```
>It will migrate all tables and run our seeder.


## 15. Factory
In laravel, factory is a convinient place to define how your model should be populated with fake data.
 
Factory allow to build fake data for our models.

- In order to create a seeder file:
```
php artisan make:factory PostFactory
```

Now, in order to insert dummy data in our factory we can use faker libray and perform the following code in our factory file:

```
public function definition()
{
    return [
        'title' => $this->faker->unique()->sentence(),
        'excerpt' => $this->faker->realText($maxNbChars = 50),
        'body' => $this->faker->text(),
        'image_path' => $this->faker->imageUrl(640, 480),
        'is_published' => 1,
        'min_to_read' => $this->faker->numberBetween(1, 10),
    ];
}
```

Navigate to "<em><strong>DatabaseSeeder.php<strong></em>" and add the following code.
```
public function run()
{
    Post::factory(100)->create();
}
```

Now, it's time for run our factory class.
```
php artisan db:seed
```
> The result will generate 100 fake data.

<hr>

## The difference between seeder and factory. 
```
Seeder is used to populate tables with data
while, 
Factory is the good place to populate table with fake data
```

## 16. Query Builder
Query Builder is the core of laravel database functionality. Query Builder use method chaining to make it use as easy as possible by just calling the method.

### Some example of CRUD functionality using Query builder

- SELECT Statement
```
$posts = DB::select('SELECT * FROM posts WHERE id = :id', [':id' => 1]);
```

- CREATE Statement
```
$posts = DB::insert('INSERT INTO posts (title, excerpt, body, image_path, is_published, min_to_read)
VALUES(?, ?, ?, ?, ?, ?)', ['Title Sample', 'Excerpt Sample', 'Body Sample', 'Image Path Sample', true, 1] );
```

- UPDATE Statement
```
$posts = DB::update('UPDATE posts SET body = ? where id = ?', ['Body [UPDATED]', 104]);;
```

- DELETE Statement
```
$posts = DB::delete('DELETE FROM posts WHERE id = ?', [104]);
```

<hr>

### Chaining Method in Query builder
```
$posts = DB::table('posts')
        ->where('is_published', true)
        ->where('id', '>', 50)
        ->get();
```
>- whereBetween('Column Name', [from, to]) <br>
>- whereNotBetween('Column Name', [from, to])<br>
>- whereIn('Column Name', [LIST OF VALUE]) <br>
>- whereNull('Column Name')<br>
>- whereNotNull('Column Name')

- SELECT DISTINCT in Method Chaining
```
$posts = DB::table('posts')
        ->select('min_to_read')
        ->distinct('id', '>', 50)
        ->get();
```

- ORDER BY in Method Chaining
```
$posts = DB::table('posts')
        ->orderBy('id', 'desc')
        ->get();
```

- PAGINATION in Method Chaining
```
$posts = DB::table('posts')
        ->skip(30)
        ->take(10)
        ->get();
```

- SELECTING ONE (1) DATA in Method Chaining
```
$posts = DB::table('posts')
        ->where('id', 100)
        >first();
```

### Returning and Interesting method in Query Builder
- get() method - Returning method for query builder
- first() method - Return with limit of 1
- find() method - Return the specific value inside the find method
- count() method - Return the row count
- sum()

## 17. Installing Tailwind

To install tailwind in laravel project using CLI, your system atleast have
- Node
- NPM

Now, to install tailwind. perform this code in CLI.
```
npm install -D tailwindcss postcss autoprefixer
```

## 18. Variable and Control Structure in blade file
Laravel use blase as a custom templating engine. You can use plain PHP code in Laravel Blade.

### 3 ways how to pass data to view

- Pass data as an array in second parameter
```
$data = [
    'posts' => DB::table('posts')->get()
];

return view('blog.index', $data);
```
> This approach is the recommended way to pass data to view and the popular way.

- Chaining the with method to pass the data
```
$posts => DB::table('posts')->get();

return view('blog.index')->with('posts', $posts);
```

- Using the compact method to pass the data
```
$posts => DB::table('posts')->get();

return view('blog.index', compact('posts'));
```

<hr>

### Blade Syntax

- If statement in Blade
```
@if (count($posts) > 100)
    {{ dd($posts) }}
 @endif
```

- If.. Else.. statement in Blade
```
@if (count($posts) > 100)
    {{ dd($posts) }}
@else
    <h1>
        No Posts
    </h1>
@endif
```

- If.. Elseif.. Else.. statement in Blade
```
@if (count($posts) > 100)
    {{ dd($posts) }}
@elseif (count($posts) === 102)
    <h1>
         You have exactly 102 posts
    </h1>
@else
    <h1>
        No Posts
    </h1>
@endif
```

- Unless statement in Blade
```
@unless (!$posts)
    <h1>
        Posts has been added
    </h1>
@endunless
```
> This code is equivalent to "<em><strong>if($posts)</em></strong>"

- forelse statement in Blade
forelse is same with foreach but it allow to have fallback if iteration is empty

```
@forelse ($posts as $post )
    {{ $loop->first }}
@empty
    <p>No posts have been set</p>
@endforelse
```

## 19. Eloquent
Laravel most imporant feature is Eloquent. Eloquent in laravel is Object Relatational Model (ORM) which helps to interact with database record much easier.

Whenever you want to use eloquent, Interaction goes to model. To create a model. Perform this command to CLI.
```
php artisan make:model ModelName
```

Some attributes in Model
- protected $table = 'posts';
- protected $primaryKey = 'id';
- protected $timestamps = false;
- protected $dataTime = 'U';
- protected $connection = 'sqlite';
- protected $attributes = ['is_published' => true];

## 20. Retrieving data using Eloquent
Retrieving data happens inside the Controller.

- Retrieving Data using find() method
```
$posts = Post::all();
```

- Retrieving Data using get() method
```
$posts = Post::orderBy('id', 'desc')->take(10)->get();
```
>The difference between get() and all() is that you can chain method in get() method

- Retrieving Data using where() method
```
$posts = Post::where('min_to_read','2')->get();
```
> The where() method has 3 parameter (Column name, Comparison operator, 'Value')

- Retrieving Data using chunk() method

Laravel eloquent chunk method break the large group of data set into smaller group of data set. Chunk is mostly used when working on big laravel apps and work with large group of records from the database.

```
Post::chunk(25, function($posts) {
    foreach($posts as $post) {
        echo $post->title . '<br>';
    }
});
```

- Retrieving sorted data using orderBy() method
```
return view('blog.index', [
    'posts' => Post::orderBy('id', 'desc')->get()
]);
```

- Retrieving specific data in show($id) method
```
return view('blog.show', [
    'post' => Post::findOrFail($id)
]);
```
>findOrFail() method will return data if the data exist and will return 404 if not.
>find() method will return the data 

## 21. Output in blade

Outputting data in blade is very simple you just have to iterate the data coming from PostsController. Just like the following:

```
@foreach ($posts as $post)
<h1>
    {{ $post->title }}    
</h1>
@endforeach
```

## 22. Insert data using Eloquent
First thing to consider when Inseting data using Eloquent is to have the model for the table. 
> Each database table has a corresponding "Model" that is used to interact with that table

```
Post::create([
    'title' => $request->title,
    'excerpt' => $request->excerpt,
    'body' => $request->body,
    'image_path' => 'temporary',
    'is_published' => $request->is_published === 'on',
    'min_to_read' => $request->min_to_read
]);

return redirect(route('blog.index'));
```
## 23. Insert file in Laravel
First thing to consider when Inseting data using Eloquent is to have the model for the table. 
> Each database table has a corresponding "Model" that is used to interact with that table

```
Post::create([
    'title' => $request->title,
    'excerpt' => $request->excerpt,
    'body' => $request->body,
    'image_path' => 'temporary',
    'is_published' => $request->is_published === 'on',
    'min_to_read' => $request->min_to_read
]);

return redirect(route('blog.index'));
```

## 23. Validation in Laravel

Validate the request sending to controller
```
$request->validate([
    'title' => 'required|unique:posts|max:255',
    'excerpt' => 'required',
    'body' => 'required',
    'image' => ['required', 'mimes:png,jpg,jpeg', 'max:5048'],
    min_to_read' => 'min:0|max:60'
]);
```

To output the erros in view/blade
```
<div class="pb-8">
    @if ($errors->any())
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Something went wrong...
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
             @foreach ($errors->all() as $error)
                <li class="list-none">
                    {{ $error }}
                </li>
            @endforeach
        </div>
    @endif
</div>
```

## 24. Updating Data using Eloquent
To update data in Controller, you need first pass the id from blade to controller
```
href="{{ route('blog.edit', $post->id) }}"
```

Now, In Edit.blade.php change the request method to patch and the form action
```
<form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PATCH')
```

Its time to edit the data inside the controller
```
$request->validate([
    'title' => 'required|max:255|unique:posts,title,' . $id,
    'excerpt' => 'required',
    'body' => 'required',
    'image' => ['mimes:png,jpg,jpeg', 'max:5048'],
    'min_to_read' => 'min:0|max:60'
]);

Post::where('id', $id)->update($request->except([
        '_token', '_method'
    ])
);

return redirect(route('blog.index'));
```

## 25. Deleting Data using Eloquent
To delete a data using Eloquent you need to setup the route action in blade file
```
<form action="{{ route('blog.destroy', $post->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="pt-3 text-red-500 pr-3" type="submit">Delete</button>
</form>
```

and you can now do the destroy of data in controller
```
Post::destroy($id);

return redirect(route('blog.index'))->with('message', 'Post has been deleted');
```

> To return a message to the blade/view
```
@if (session()->has('message'))
    <div class="mx-auto w-4/5 pb-10">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Warning
        </div>
        <div class="border border-t-1 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            {{ session()->get('message') }}
        </div>
    </div>
@endif
```

## 26. Form Request
As you can see in our update() and store() method some code for form request is repeated. To avoid that we can use custom form request

- To create a Form Request, you may use this artisan command:
```
php artisan make:request PostFormRequest
```

- The authorize() method in Form Request authorize login in your application
> Just return True to set authorize

- The rules() method return the validation rules for the request data
```
$rules = [
    'title' => 'required|max:255|unique:posts,title,' . $this->id,
    'excerpt' => 'required',
    'body' => 'required',
    'image' => ['mimes:png,jpg,jpeg', 'max:5048'],
    'min_to_read' => 'min:0|max:60'
];
        
if (in_array($this->method(), ['POST'])) {
    $rules['image'] = ['required', 'mimes:png,jpg,jpeg', 'max:5048'];
}

return $rules;
```

## 27. Pagination
The most use case of pagination in laravel is when you working in large set of data.

- The pagination is use in the end of the query. To use the pagination using Eloquent:
```
'posts' => Post::orderBy('id', 'desc')->paginate(10)
```

- To have the pagination in blade/view file add this code below
```
{{ $posts->links() }}
```

## 27. Middleware
Middleware provide a convenient mechanism for inspecting and filtering HTTP requests entering your application. It prevent user not to view the page that is only for authenticated users.

### Two (2) ways to define middleware
- Via Web.php
```
Route::resource('blog', PostsController::class)->middleware(['auth']);
```

- Via Controller
```
public function __construct()
{
    $this->middleware('auth')->only(['create', 'edit', 'update', 'destroy']);
}
```

## 👨‍💻Contact Me 🚀🔵
- Email - jesther.jc15@gmail.com
- LinkedIn - https://www.linkedin.com/in/jesther-costinar/
- Facebook - https://www.facebook.com/jeestheeer
- Instagram - https://www.instagram.com/kaassmir/
- Twitter - https://twitter.com/kasmir_
