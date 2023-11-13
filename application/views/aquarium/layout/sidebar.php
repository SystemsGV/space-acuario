<body>
    <style>
        .notification-dropdown {
            max-height: 500px;
            /* Establece la altura máxima para activar el desplazamiento */
            overflow-y: auto !important;
            /* Habilita el desplazamiento vertical cuando se supera la altura máxima */
            scrollbar-width: thin;
            /* Estilo de la barra de desplazamiento para Firefox */
            scrollbar-color: #007bff #f8f9fa;
            /* Establece los colores de la barra de desplazamiento (para Firefox) */
        }

        .notification-dropdown::-webkit-scrollbar {
            width: 6px;
            /* Ancho de la barra de desplazamiento para WebKit (Chrome, Safari) */
        }

        .notification-dropdown::-webkit-scrollbar-thumb {
            background-color: rgba(64, 124, 243, 0.5);
            /* Color del pulgar de la barra de desplazamiento con opacidad */
            border-radius: 5px;
            /* Agregar bordes redondeados */
        }

        .notification-dropdown::-webkit-scrollbar-track {
            background-color: #f8f9fa;
            /* Color del riel de la barra de desplazamiento para WebKit */
            border-radius: 5px;
            /* Agregar bordes redondeados */
        }

        .notification-dropdown ul {
            padding: 10px;
            /* Ajusta el relleno según tu diseño */
            margin: 0;
            /* Asegura que no haya márgenes externos */
            list-style: none;
            /* Elimina los estilos de lista predeterminados */
        }

        .dropdown-title {
            position: sticky;
            top: 0;
            background-color: #fff;
            /* Color de fondo según tu diseño */
            z-index: 1;
            /* Asegura que esté por encima del contenido de la lista */
        }

        @media only screen and (max-width: 932.98px) {
            .notification-dropdown {
                max-height: 320px;
                /* Establece la altura máxima para activar el desplazamiento */
            }
        }
    </style>
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
                    <div class="logo-wrapper"><a href="<?= base_url('Acuario/Dashboard-Temperatura') ?>"><img class="img-fluid" src="<?= base_url() ?>assets/images/logo/logo.png" alt></a></div>
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
                        <?php if ($this->session->userdata('id_role') == 1) { ?>

                            <li class="onhover-dropdown">
                                <div class="notification-box">
                                    <svg>
                                        <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#notification"></use>
                                    </svg>
                                    <span id="notificationCount" class="badge rounded-pill badge-secondary">0</span>
                                </div>
                                <div class="onhover-show-div notification-dropdown">
                                    <h6 class="f-18 mb-0 dropdown-title">Notificaciones
                                    </h6>
                                    <ul>

                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                        <li class="profile-nav onhover-dropdown pe-0 py-0">
                            <div class="media profile-media"><img class="b-r-10" src="<?= base_url() ?>assets/images/dashboard/profile.png" alt>
                                <div class="media-body"><span><?= $this->session->userdata('user_name'); ?></span>
                                    <p class="mb-0"><?= viewRol($this->session->userdata('id_role')) ?> <i class="middle fa fa-angle-down"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li><a href="#"><i data-feather="user"></i><span>Cuenta
                                        </span></a></li>
                                <li><a href="Cerrar-Sesion"><i data-feather="log-in"> </i><span>Salir</span></a></li>
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
                                <?php if ($this->session->userdata('id_role') == 1) { ?>
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
                                            </svg><span>Des. Poblacional</span></a>
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
                                <?php }
                                if ($this->session->userdata('id_role') || 1 && $this->session->userdata('id_role') == 2) { ?>
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
                                <?php }
                                if ($this->session->userdata('id_role') == 1) { ?>
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
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </nav>
                </div>
            </div>