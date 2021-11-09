<nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">
    <div class="container">
        <a href="#" class="navbar-brand" id="sidebarToggle">
            <img src="<?php echo 'http://'. $_SERVER['HTTP_HOST'] . '/img/logo.png'?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width: 80px; ">
            <span class="brand-text font-weight-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">Sociopedia</span>
        </a>
        <button class="navbar-toggler order-1 menu-btn" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-btn" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            <div class="ml-0 ml-md-3">
                <div class="d-inline-block">
                <input class="form-control form-control-navbar" id="event-search" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <ul class="position-absolute list-group" id="search-results">
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto d-flex align-items-center justify-content-center">
            <li class="nav-item user-panel d-flex">
                <div>
                    <a href="/profile.php" class="nav-link d-flex align-items-center justify-content-center">
                        <div class="image px-1">
                            <img src="<?php echo 'http://'. $_SERVER['HTTP_HOST'] . '/img/default.png' ?>" class="img-fluid img-circle" alt="User" width="30" height="30" style="border-radius: 50%;">
                        </div>
                        <span>Username</span>
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Log out</a>
            </li>
        </ul>
    </div>
</nav>