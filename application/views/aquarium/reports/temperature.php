<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Reportes Control Temperatura</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url("Acuario") ?>">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item active">Reportes Control Temperatura</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body card-no-border">
                        <div class="main-product-wrapper mx-auto d-flex align-items-center">
                            <div class="col-lg-4 col-sm-12">
                                <div class="badge-spacing">
                                    <a class="btn btn-danger btn-hover-effect" href="javascript:void(0)" id="export-pdf">
                                        <i class="fa fa-file-pdf-o f-18"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <div class="input-group">
                                    <input class="form-control" type="text" id="date-range" name="date-range" placeholder="Filtra por fechas">
                                    <span class="input-group-text list-light-primary">
                                        <i data-feather="calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped text-center dataTable dtr-inline nowrap">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Especies</th>
                                        <th>12:00 AM</th>
                                        <th>4:00 AM</th>
                                        <th>8:00 AM</th>
                                        <th>12:00 PM</th>
                                        <th>4:00 PM</th>
                                        <th>8:00 PM</th>
                                        <th>Observacion</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>