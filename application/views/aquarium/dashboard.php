<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Graficos Temperatura Pecera </h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Dashboard-Temperatura">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Temperatura Pecera </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row widget-grid" id="pecera-grid">
            <div class="col-xxl-4 col-sm-6 box-col-6">
                <div class="card profile-box">
                    <div class="card-body">
                        <div class="media media-wrapper justify-content-between">
                            <div class="media-body">
                                <div class="greeting-user">
                                    <h4 class="f-w-600">Bienvenido a AcuaSys</h4>
                                    <p>Mantente al tanto con actualizaciones en vivo de tu mundo submarino.</p>
                                    <div class="whatsnew-btn"><a class="btn btn-outline-white">Novedades !</a></div>
                                </div>
                            </div>
                            <div>
                                <div class="clockbox">
                                    <svg id="clock" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 600 600">
                                        <g id="face">
                                            <circle class="circle" cx="300" cy="300" r="253.9"></circle>
                                            <path class="hour-marks" d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6"></path>
                                            <circle class="mid-circle" cx="300" cy="300" r="16.2"></circle>
                                        </g>
                                        <g id="hour">
                                            <path class="hour-hand" d="M300.5 298V142"></path>
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                        </g>
                                        <g id="minute">
                                            <path class="minute-hand" d="M300.5 298V67"> </path>
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                                        </g>
                                        <g id="second">
                                            <path class="second-hand" d="M300.5 350V55"></path>
                                            <circle class="sizing-box" cx="300" cy="300" r="253.9"> </circle>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="cartoon"><img class="img-fluid" src="<?= base_url() ?>assets/images/dashboard/cartoon.svg" alt="vector women with leptop"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-auto col-xl-3 col-sm-6 box-col-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round primary">
                                        <div class="bg-round">
                                            <svg class="svg-fill">
                                                <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-board"> </use>
                                            </svg>
                                            <svg class="half-circle svg-fill">
                                                <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h4><?= $totalTanks ?></h4><span class="f-light">Total Peceras</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card widget-1">
                                <div class="card-body">
                                    <div class="widget-content">
                                        <div class="widget-round primary">
                                            <div class="bg-round">
                                                <svg class="svg-fill">
                                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-board"> </use>
                                                </svg>
                                                <svg class="half-circle svg-fill">
                                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h4><?= $activeTanks ?></h4><span class="f-light">Activos</span>
                                        </div>
                                    </div>
                                    <div class="font-primary f-w-500"><span><?= number_format(round(($activeTanks / $totalTanks) * 100, 1), 1) ?>%</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-auto col-xl-3 col-sm-6 box-col-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round secondary">
                                        <div class="bg-round">
                                            <svg class="svg-fill">
                                                <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#return-box"> </use>
                                            </svg>
                                            <svg class="half-circle svg-fill">
                                                <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h4><?= $inactiveTanks ?></h4><span class="f-light">Inactivos</span>
                                    </div>
                                </div>
                                <div class="font-warning f-w-500"></i><span><?= number_format(round(($inactiveTanks / $totalTanks) * 100, 1), 1)  ?>%</span></div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card widget-1">
                                <div class="card-body">
                                    <div class="widget-content">
                                        <div class="widget-round success">
                                            <div class="bg-round">
                                                <svg class="svg-fill">
                                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#rate"> </use>
                                                </svg>
                                                <svg class="half-circle svg-fill">
                                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h4><?= $freshwaterTanks ?></h4><span class="f-light">Agua Dulce</span>
                                        </div>
                                    </div>
                                    <div class="font-success f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span><?= number_format(round(($freshwaterTanks / $totalTanks) * 100, 1), 1)  ?>%</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-auto col-xl-12 col-sm-6 box-col-6">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card widget-1">
                            <div class="card-body">
                                <div class="widget-content">
                                    <div class="widget-round info">
                                        <div class="bg-round">
                                            <svg class="svg-fill">
                                                <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#rate"> </use>
                                            </svg>
                                            <svg class="half-circle svg-fill">
                                                <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#halfcircle"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h4><?= $saltwaterTanks ?></h4><span class="f-light">Agua Salada</span>
                                    </div>
                                </div>
                                <div class="font-success f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span><?= number_format(round(($saltwaterTanks / $totalTanks) * 100, 1), 1) ?>%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body card-no-border">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 order-sm-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="search-icon text-gray" data-feather="search"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Buscar aquí.." list="datalistOptionssearch" id="exampleDataList1">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 order-sm-1">
                                <div class="input-group mb-3">
                                    <input class="form-control" type="date" placeholder="Selecciona una fecha" id="search-date">
                                    <span class="input-group-text list-light-primary">
                                        <i data-feather="calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="no-results" class="card" style="display:none">
                <div class="card-body">
                    <p class="card-text">No se encontraron resultados.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->