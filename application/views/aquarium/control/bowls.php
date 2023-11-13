<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Medición de Temperatura </h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Dashboard-Temperatura">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item">Control Pec. </li>
                        <li class="breadcrumb-item active">Medicion de Temp.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Control de Temperatura Acuario</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table-temp">
                                <thead class="text-center">
                                    <tr>
                                        <th>FECHA: </th>
                                        <th id="date-temp">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">ACUARIO</th>
                                        <th rowspan="2">
                                            ESPECIE
                                        </th>
                                        <th colspan="6" rowspan="1">
                                            HORA
                                        </th>
                                        <th rowspan="2">
                                            OBSERVACION
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>12:00 am</th>
                                        <th>04:00 am</th>
                                        <th>08:00 am</th>
                                        <th>12:00 pm</th>
                                        <th>04:00 pm</th>
                                        <th>08:00 pm</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>