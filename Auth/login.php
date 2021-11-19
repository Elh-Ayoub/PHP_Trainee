<?php 
    $configs = include "./config.php";
    require_once "./routes/route.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-4 mx-auto">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden login">
                    <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-2 fw-light fs-5">Log in</h5>
                    <p class="text-center" style="font-size: large; font-family: Verdana, Geneva, Tahoma, sans-serif;">Welcome back to Sociopedia!</p>
                        <form method="POST" action="<?php echo $configs['App_url'] . Route::route('login.post')->action ?>">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="floatingInputEmail" placeholder="name@example.com" required>
                                <label for="floatingInputEmail">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Login</button>
                            </div>
                            <a class="d-block text-center mt-2 small" href="/auth/register">Have an account? Sign In</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body> 
</html>