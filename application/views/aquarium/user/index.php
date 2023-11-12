<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Usuarios</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url("Acuario/Dashboard-Temperatura") ?>">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Add rows  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-no-border">
                        <div class="header-top">
                            <h5 class="m-0"></h5>
                            <div class="card-header-right-icon">
                                <button id="btn_add" class="btn btn-pill btn-success btn-air-success" type="submit">
                                    <i class="fa fa-plus"></i> Agregar Usuario
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped text-center" id="data-user">
                                <thead class="text-center">
                                    <tr>
                                        <th>APELLIDOS NOMBRES</th>
                                        <th>DNI</th>
                                        <th>ROL</th>
                                        <th>USUARIO</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <tfoot class="text-center">
                                    <tr>
                                        <th>APELLIDOS NOMBRES</th>
                                        <th>DNI</th>
                                        <th>ROL</th>
                                        <th>USUARIO</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add rows Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="mdl_add" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title_modal"></h4>
                <button class="btn-close theme-close bg-primary" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-bookmark theme-form" id="frm_user">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="amount_s">DNI</label>
                                    <input class="form-control input-air-primary digits" id="dni_user" type="number" name="dni_user" maxlength="8" autofocus>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="common_n">Apellidos y Nombres</label>
                                    <input class="form-control input-air-primary fnRow" id="flname" name="flname" type="text">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="type_water">Rol</label>
                                    <select class="form-select input-air-primary fnRow" id="type_role" name="type_role">
                                        <option value="0" selected disabled>Selecciona rol</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Control</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="common_n">Usuario</label>
                                    <input class="form-control input-air-primary fnRow" id="user_name" name="user_name" type="text">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="common_n">Contraseña</label>
                                    <input class="form-control input-air-primary fnRow" id="user_pass" name="user_pass" type="text">
                                </div>
                            </div>
                            <input type="hidden" name="id_user" id="id_user">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                        <button class="btn btn-success" type="submit" id="btn_send"><i class="fa fa-save"></i> Guardar Usuario</button>
                        <button class="btn btn-info hidden" type="submit" id="btn_update"><i class="fa fa-edit"></i> Actualizar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>