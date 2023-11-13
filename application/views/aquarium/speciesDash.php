<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Metrica Especies </h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Acuario/Dashboard-Temperatura">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Metrica Especies</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row widget-grid" id="fish-grid">
            <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
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
                                        <h4><?= $type_species ?></h4><span class="f-light">Total tipos especies</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
                <div class="row">
                    <div class="col-xl-12">
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
                                            <h4><?= $total ?></h4><span class="f-light">Total especies</span>
                                        </div>
                                    </div>
                                    <div class="font-primary f-w-500"><span>100%</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
                <div class="row">
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
                                        <h4><?= $freshwater ?></h4><span class="f-light">Agua Dulce</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6 box-col-6">
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
                                    <h4><?= $saltwater ?></h4><span class="f-light">Agua Salada</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header card-no-border">
                        <div class="main-product-wrapper">
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="search-icon text-gray" data-feather="search"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Busca aqui.." list="datalistOptionssearch" id="exampleDataList1">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="no-results" class="card" style="display: none;">
                <div class="card-body">
                    <p class="card-text">No se encontraron resultados.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->