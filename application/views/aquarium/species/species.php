                      <!-- Page Sidebar Ends-->
                      <div class="page-body">
                          <div class="container-fluid">
                              <div class="page-title">
                                  <div class="row">
                                      <div class="col-6">
                                          <h4>Desarrollo Poblacional </h4>
                                      </div>
                                      <div class="col-6">
                                          <ol class="breadcrumb">
                                              <li class="breadcrumb-item"><a href="ADashboard-Temperatura">
                                                      <svg class="stroke-icon">
                                                          <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                                      </svg></a></li>
                                              <li class="breadcrumb-item active">Des. Poblacional </li>
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
                                                  <div class="badge-spacing">
                                                      <a class="btn btn-danger btn-hover-effect" href="javascript:void(0)" id="view-logs">
                                                          <i class="fa fa-history f-16"></i> Historial
                                                      </a>
                                                  </div>
                                                  <div class="card-header-right-icon">
                                                      <button id="btn_add" class="btn btn-pill btn-success btn-air-success" type="submit">
                                                          <i class="fa fa-plus"></i> Agregar Especie
                                                      </button>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="card-body">
                                              <div class="table-responsive">
                                                  <table class="table table-striped text-center" id="data-species">
                                                      <thead class="text-center">
                                                          <tr>
                                                              <th colspan="2">NOMBRE</th>
                                                              <th rowspan="2">TIPO AGUA</th>
                                                              <th rowspan="2">CANTIDAD</th>
                                                              <th rowspan="2">ESTADO</th>
                                                              <th rowspan="2">ACCIONES</th>
                                                          </tr>
                                                          <tr>
                                                              <th>COMUN</th>
                                                              <th>CIENTIFICO</th>
                                                          </tr>
                                                      </thead>
                                                      <tfoot class="text-center">
                                                          <tr>
                                                              <th>COMUN</th>
                                                              <th>CIENTIFICO</th>
                                                              <th>TIPO AGUA</th>
                                                              <th>CANTIDAD</th>
                                                              <th>ESTADO</th>
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
                                      <form class="form-bookmark theme-form" id="frm_specie">
                                          <div class="card-body">
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="common_n">Nombre Común</label>
                                                          <input class="form-control input-air-primary fnRow" id="common_n" name="common_n" type="text" placeholder="Ejem. Pez Cirujano" autofocus>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="scientific_n">Nombre Científico</label>
                                                          <input class="form-control input-air-primary fnRow" id="scientific_n" name="scientific_n" type="text" placeholder="Ejem. Paracanthurus hepatus">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-4">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="type_water">Tipo de Agua</label>
                                                          <select class="form-select input-air-primary fnRow" id="type_water" name="type_water">
                                                              <option value="0" selected disabled>Selecciona el Tipo de agua</option>
                                                              <option value="Salada">Salada</option>
                                                              <option value="Dulce">Dulce</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="amount_s">Cantidad de Peces</label>
                                                          <input class="form-control input-air-primary input_numb fnRow" id="amount_s" type="text" placeholder="Ejem. 3" name="amount_s">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="status">Estado de Especie</label>
                                                          <select class="form-select input-air-primary fnRow" id="status" name="status">
                                                              <option value="0" selected disabled>Selecciona Estado</option>
                                                              <option value="1">Activo</option>
                                                              <option value="2">Inactivo</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <input type="hidden" id="id_specie" name="id_specie">
                                              </div>
                                          </div>
                                          <div class="card-footer text-end">
                                              <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                                              <button class="btn btn-success disabled" type="submit" id="btn_send"><i class="fa fa-save"></i> Guardar Especie</button>
                                              <button class="btn btn-info hidden" type="submit" id="btn_update"><i class="fa fa-edit"></i> Actualizar Especie</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="modal fade" tabindex="-1" role="dialog" id="mdl_quantity" aria-hidden="true">
                          <div class="modal-dialog modal-lg modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="title_quantity"></h4>
                                      <button class="btn-close theme-close bg-primary" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">

                                      <ul class="nav nav-tabs border-tab border-0 mb-0 nav-danger" id="topline-tab" role="tablist">
                                          <li class="nav-item">
                                              <a class="nav-link active nav-border pt-0" id="topline-top-user-tab" data-bs-toggle="tab" href="#topline-top-user" role="tab" aria-controls="topline-top-user" aria-selected="true">
                                                  <i class="icofont icofont-plus-square"></i> Ingreso Especie</a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link nav-border " id="topline-top-description-tab" data-bs-toggle="tab" href="#topline-top-description" role="tab" aria-controls="topline-top-description" aria-selected="false">
                                                  <i class="icofont icofont-minus-square"></i> Salida Especie</a>
                                          </li>
                                      </ul>
                                      <div class="tab-content" id="topline-tabContent">
                                          <div class="tab-pane fade show active" id="topline-top-user" role="tabpanel" aria-labelledby="topline-top-user-tab">
                                              <div class="card-body px-0 pb-0">
                                                  <div class="user-header pb-2">
                                                      <h6 class="fw-bold"></h6>
                                                      <br>
                                                  </div>
                                                  <div class="user-content">
                                                      <form class=" theme-form" id="frm_quantity">
                                                          <div class="card-body">
                                                              <div class="row">
                                                                  <div class="col-md-4">
                                                                      <div class="mb-3">
                                                                          <label class="form-label" for="common_n">Cantidad Ingresar</label>
                                                                          <input class="form-control input-air-primary fnRow" id="ing_data" name="ing_data" type="number" autofocus>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                      <div class="mb-3">
                                                                          <label class="form-label" for="scientific_n">Cantidad actual</label>
                                                                          <input class="form-control input-air-primary fnRow disabled" id="quantityFish" type="number">
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="row">
                                                                  <div class="col-md-12">
                                                                      <div class="mb-3">
                                                                          <label class="form-label" for="exampleFormControlTextarea14">Razón de Ingreso</label>
                                                                          <textarea class="form-control btn-square" name="reason_fish" id="reason_fish" rows="3"></textarea>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="card-footer text-end">
                                                              <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                                                              <button class="btn btn-success" type="submit" id="btn_quantity"><i class="fa fa-plus"></i> Ingresar Especie</button>
                                                          </div>
                                                      </form>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="tab-pane fade" id="topline-top-description" role="tabpanel" aria-labelledby="topline-top-description-tab">
                                              <div class="card-body px-0 pb-0">
                                                  <div class="user-header pb-2">
                                                      <h6 class="fw-bold"></h6>
                                                      <br>
                                                  </div>
                                                  <div class="user-content">
                                                      <form class=" theme-form" id="frm_minus">
                                                          <div class="card-body">
                                                              <div class="alert alert-light-warning border-warning alert-dismissible fade show p-0" role="alert">
                                                                  <div class="alert-arrow bg-warning"><i class="icon-alert"></i></div>
                                                                  <p>Para eliminar un número de especie, asegúrate de que no esté actualmente asociado a una pecera. Si lo está, retíralo primero de la Pecera <a href="Peceras" target="_blank">Dirigite a Peceras</a>.</p>
                                                                  <button class="p-0 border-0 me-2 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"><span class="bg-warning px-3 py-1" aria-hidden="true">X</span></button>
                                                              </div>
                                                              <div class="row">
                                                                  <div class="col-md-4">
                                                                      <div class="mb-3">
                                                                          <label class="form-label" for="common_n">Cantidad a Retirar</label>
                                                                          <input class="form-control input-air-primary fnRow" id="minus_data" name="minus_data" type="number" autofocus>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                      <div class="mb-3">
                                                                          <label class="form-label" for="scientific_n">Cantidad Fuera de Pecera</label>
                                                                          <input class="form-control input-air-primary fnRow disabled" id="amountM" type="number">
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="row">
                                                                  <div class="col-md-12">
                                                                      <div class="mb-3">
                                                                          <label class="form-label" for="exampleFormControlTextarea14">Razón de Retiro</label>
                                                                          <textarea class="form-control btn-square" name="reason_minus" id="reason_minus" rows="3"></textarea>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="card-footer text-end">
                                                              <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                                                              <button class="btn btn-success" type="submit" id="btn_quantity_minus"><i class="fa fa-minus-square"></i> Disminuir Especie</button>
                                                          </div>
                                                      </form>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="modal fade" tabindex="-1" role="dialog" id="mdl_logs" aria-hidden="true">
                          <div class="modal-dialog modal-xl modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title">Historial Especies </h4>
                                      <button class="btn-close theme-close bg-primary" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="table-responsive">
                                          <table class="table table-striped text-center" id="data-logs">
                                              <thead class="text-center">
                                                  <tr>
                                                      <th>ESPECIE</th>
                                                      <th>MOVIMIENTO</th>
                                                      <th>CANTIDAD</th>
                                                      <th>RAZON</th>
                                                      <th>FECHA</th>
                                                  </tr>
                                              </thead>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>