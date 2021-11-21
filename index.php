<?php
spl_autoload_register(function ($class_name) {
    include "./routes/" . $class_name . '.php';
});
require_once './Controllers/PostController.php';
require_once './Controllers/AuthController.php';
require_once './Controllers/UserController.php';
require_once './Controllers/CategoryController.php';
require_once './Controllers/LikeController.php';
require_once './Controllers/CommentController.php';
require_once './Models/Model.php';
require_once './Models/Post.php';
$configs = include "./config.php";

try {
    // ---- Routes ----
    #home
    Route::get('/', [PostController::class, 'index'])->name('home');
    #auth
    Route::get('/auth/login', [AuthController::class, 'loginView'])->name('login');
    Route::get('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/auth/register', [AuthController::class, 'registerView'])->name('register');
    Route::get('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    #user
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/users/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/users/update/password', [UserController::class, 'update_password'])->name('user.password.update');
    Route::get('/avatar', [UserController::class, 'update_avatar'])->name('user.avatar');
    Route::get('/avatar/delete', [UserController::class, 'setDefaultAvatar'])->name('user.avatar.delete');
    Route::get('/users/delete', [UserController::class, 'destroy'])->name('user.delete');

    #posts
    Route::get('/posts/create', [PostController::class, 'create'])->name('create.post');
    Route::get('/posts/store', [PostController::class, 'store'])->name('store.post');
    Route::get('/posts/edit', [PostController::class, 'edit'])->name('edit.post');
    Route::get('/posts/update', [PostController::class, 'update'])->name('update.post');
    Route::get('/posts/delete', [PostController::class, 'destroy'])->name('delete.post');

    #categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/posts', [CategoryController::class, 'showPosts'])->name('categories.posts');

    #likes
    Route::get('/like', [LikeController::class, 'store'])->name('create.like');
    Route::get('/like/list', [LikeController::class, 'getPostLikes'])->name('post.likes');
    
    #comments
    Route::get('/comment', [CommentController::class, 'store'])->name('create.comment');
    Route::get('/comment/delete', [CommentController::class, 'destroy'])->name('delete.comment');

    // ---- execute route callback ----
    $b = false;
    array_filter(Route::$routes, function($route) {
        $request_uri = explode('?', $_SERVER['REQUEST_URI'])[0];
        if ($route->action === trim($request_uri, '/')){
            global $b;
            $b = true;
            echo call_user_func($route->callback);
        }
    });
    // ---- invalid route ----
    if(!$b){
        include './routes/error404.php';
    }
}catch(Exception $e){
    echo '<h2 style="text-align: center;">Caught exception: ',  $e->getMessage(), "</h2>";
}


