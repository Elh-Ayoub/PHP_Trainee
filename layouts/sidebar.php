<aside class="flex-column flex-shrink-0 p-3 text-white bg-dark" id="sidebar">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item" id="close-icon-cont"><a class="link-light menu-btn text-decoration-none" style="font-size: large;" role="button"><i class="fas fa-bars px-2" id="close-icon"></i>Close</a></li>
        <hr>
        <li class="nav-item">
            <a href="/" class="nav-link text-white <? if($_SERVER['REQUEST_URI'] === '/'):?> active <? endif;?>" aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Home
            </a>
        </li>
        <? if(isset($_SESSION['auth'])): ?>
        <li>
            <a href="/profile" class="nav-link text-white <? if($_SERVER['REQUEST_URI'] === '/profile'):?> active <? endif;?>">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Profile
            </a>
        </li>
        <? else: ?>
        <li>
            <a href="/auth/login" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Login
            </a>
        </li>
        <li>
            <a href="/auth/register" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Register
            </a>
        </li>
        <? endif; ?>
        <li>
            <a href="#" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                Categories
            </a>
        </li>
    </ul>
</aside>