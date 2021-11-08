<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Home</title>
</head>
<body>
    <div class="wrapper">
        <!-- navbar -->
        <?php include './layouts/navbar.php';?>
        <!-- Sidebar -->
        <?php include './layouts/sidebar.php';?>
        <!-- Posts list -->
        <div class="container posts-content">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card mb-4">
                    <div class="card-body">
                        <div class="media mb-3">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="d-block ui-w-40 rounded-circle" alt="">
                        <div class="media-body ml-3">
                            Kenneth Frazier
                            <div class="text-muted small">3 days ago</div>
                        </div>
                        </div>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum. Vivamus laoreet blandit odio, vel finibus quam dictum ut.
                        </p>
                        <a href="#" class="ui-rect ui-bg-cover" style="background-image: url('https://bootdey.com/img/Content/avatar/avatar3.png');"></a>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="d-inline-block text-muted text-decoration-none">
                            <strong>123</strong> Likes</small>
                        </a>
                        <a href="#" class="d-inline-block text-muted mx-3 text-decoration-none">
                            <strong>0</strong> Dislikes</small>
                        </a>
                        <a href="#" class="d-inline-block text-muted text-decoration-none">
                            <strong>12</strong> Comments</small>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card mb-4">
                    <div class="card-body">
                        <div class="media mb-3">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="d-block ui-w-40 rounded-circle" alt="">
                        <div class="media-body ml-3">
                            Kenneth Frazier
                            <div class="text-muted small">3 days ago</div>
                        </div>
                        </div>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum. Vivamus laoreet blandit odio, vel finibus quam dictum ut.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="d-inline-block text-muted text-decoration-none">
                            <strong>123</strong> Likes</small>
                        </a>
                        <a href="#" class="d-inline-block text-muted mx-3 text-decoration-none">
                            <strong>0</strong> Dislikes</small>
                        </a>
                        <a href="#" class="d-inline-block text-muted text-decoration-none">
                            <strong>12</strong> Comments</small>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './layouts/footer.php';?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/16bfaec043.js" crossorigin="anonymous"></script>
    <script src="./js/sidebar.js"></script>
</body>
</html>