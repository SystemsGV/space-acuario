<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader-index"> <span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>

    <input type="hidden" value="<?= base_url() ?>" id="url_base">
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper"><a href="<?= base_url('Acuario') ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/logo/logo.png" alt></a></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
                </div>

                <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
                    <ul class="nav-menus">
                        <li>
                            <div class="mode">
                                <svg>
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#moon"></use>
                                </svg>
                            </div>
                        </li>
                        <li class="onhover-dropdown">
                            <div class="notification-box">
                                <svg>
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#notification"></use>
                                </svg><span class="badge rounded-pill badge-secondary">4
                                </span>
                            </div>
                            <div class="onhover-show-div notification-dropdown">
                                <h6 class="f-18 mb-0 dropdown-title">Notitications
                                </h6>
                                <ul>
                                    <li class="b-l-primary border-4">
                                        <p>Delivery processing <span class="font-danger">10 min.</span></p>
                                    </li>
                                    <li class="b-l-success border-4">
                                        <p>Order Complete<span class="font-success">1 hr</span></p>
                                    </li>
                                    <li class="b-l-secondary border-4">
                                        <p>Tickets Generated<span class="font-secondary">3 hr</span></p>
                                    </li>
                                    <li class="b-l-warning border-4">
                                        <p>Delivery Complete<span class="font-warning">6 hr</span></p>
                                    </li>
                                    <li><a class="f-w-700" href="#">Check all</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="profile-nav onhover-dropdown pe-0 py-0">
                            <div class="media profile-media"><img class="b-r-10" src="<?= base_url() ?>assets/images/dashboard/profile.png" alt>
                                <div class="media-body"><span>Emay Walter</span>
                                    <p class="mb-0">Admin <i class="middle fa fa-angle-down"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li><a href="#"><i data-feather="user"></i><span>Account
                                        </span></a></li>
                                <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
                                <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
                                <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li>
                                <li><a href="#"><i data-feather="log-in"> </i><span>Log
                                            in</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="page-body-wrapper">
            <div class="sidebar-wrapper" sidebar-layout="stroke-svg">
                <div>
                    <div class="logo-wrapper"><a href="<?= base_url('Acuario') ?>"><img class="img-fluid for-light" src="<?= base_url() ?>assets/images/logo/logo.png" alt><img class="img-fluid for-dark" src="<?= base_url() ?>assets/images/logo/logo_dark.png" alt></a>
                        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid">
                            </i></div>
                    </div>
                    <div class="logo-icon-wrapper"><a href="<?= base_url('Acuario') ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/logo/logo-icon.png" alt></a></div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"><a href="<?= base_url('Acuario') ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/logo/logo-icon.png" alt></a>
                                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                                </li>
                                <li class="pin-title sidebar-main-title">
                                    <div>
                                        <h6>Fijados</h6>
                                    </div>
                                </li>
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6 class="lan-1">General</h6>
                                    </div>
                                </li>
                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                                    <label class="badge badge-light-primary">2</label><a class="sidebar-link sidebar-title" href="#">
                                        <svg class="stroke-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#fill-home"></use>
                                        </svg><span class="lan-3">Dashboard
                                        </span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a class="lan-4" href="Dashboard-Temperatura">Metrica Temp.</a></li>
                                        <li><a class="lan-5" href="Dashboard-Especies">Metrica Especies</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>MANTENIMIENTO</h6>
                                    </div>
                                </li>
                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                                    <a class="sidebar-link sidebar-title link-nav" href="Especies">
                                        <svg class="stroke-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-file"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#fill-file"></use>
                                        </svg><span>Especies</span></a>
                                </li>
                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                                    <a class="sidebar-link sidebar-title link-nav" href="Peceras">
                                        <svg class="stroke-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-board"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#fill-board"></use>
                                        </svg><span>Peceras</span></a>
                                </li>
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>CONTROL</h6>
                                    </div>
                                </li>
                                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                                        <svg class="stroke-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-form"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#fill-form">
                                            </use>
                                        </svg><span>Control Pec.</span></a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="Control-Temperatura">Medición Temp. </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>Reportes</h6>
                                    </div>
                                </li>
                                <li class="sidebar-list">
                                    <i class="fa fa-thumb-tack"></i>
                                    <a class="sidebar-link sidebar-title link-nav" href="Reporte-Temperatura">
                                        <svg class="stroke-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-others">
                                            </use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#fill-landing-page">
                                            </use>
                                        </svg>
                                        <span>Registros Temp.</span>
                                    </a> 
                                </li>
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>SISTEMA</h6>
                                    </div>
                                </li>
                                <li class="sidebar-list">
                                    <i class="fa fa-thumb-tack"></i>
                                    <a class="sidebar-link sidebar-title link-nav" href="Usuarios">
                                        <svg class="stroke-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-user">
                                            </use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#fill-landing-page">
                                            </use>
                                        </svg>
                                        <span>Usuarios</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </nav>
                </div>
            </div>