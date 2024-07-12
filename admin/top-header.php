<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class="bx bx-menu"></i></div>
            <!-- search box  -->
            <div class="position-relative search-bar d-lg-block d-none">
                <!-- <input class="form-control px-5" type="search" placeholder="Search" />
                <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i class="bx bx-search"></i></span> -->
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <!-- search box mobile  -->
                    <li class="nav-item mobile-search-icon d-flex d-lg-none">
                        <!-- <a class="nav-link" href="javascript:;"><i class="bx bx-search"></i>
                        </a> -->
                    </li>

                    <li class="nav-item dropdown dropdown-app">
                        <div class="dropdown-menu dropdown-menu-end p-0">
                            <div class="app-container p-2 my-2">
                                <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="header-notifications-list">
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="header-message-list">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../img/ru_logo.png" class="user-img" alt="user avatar" />
                    <div class="user-info">
                        <p class="user-name mb-0">Admin</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="./logout.php"><i class="bx bx-log-out-circle text-danger"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>