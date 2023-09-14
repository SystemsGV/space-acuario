                      <!-- Page Sidebar Ends-->
                      <div class="page-body">
                          <div class="container-fluid">
                              <div class="page-title">
                                  <div class="row">
                                      <div class="col-6">
                                          <h4>Especies </h4>
                                      </div>
                                      <div class="col-6">
                                          <ol class="breadcrumb">
                                              <li class="breadcrumb-item"><a href="index.html">
                                                      <svg class="stroke-icon">
                                                          <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                                      </svg></a></li>
                                              <li class="breadcrumb-item">Dashboard</li>
                                              <li class="breadcrumb-item active">Especies </li>
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
                                                          <i class="fa fa-plus"></i> Agregar Especie
                                                      </button>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="card-body">
                                              <div class="table-responsive">
                                                  <table class="display" id="data-species">
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
                                      <h4 class="modal-title" id="myExtraLargeModal">Agregar Especie</h4>
                                      <button class="btn-close theme-close bg-primary" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <form class="form-bookmark theme-form" id="frm_specie">
                                          <div class="card-body">
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="common_n">Nombre Común</label>
                                                          <input class="form-control input-air-primary" id="common_n" name="common_n" type="text" placeholder="Ejem. Pez Cirujano" autofocus>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="scientific_n">Nombre Científico</label>
                                                          <input class="form-control input-air-primary" id="scientific_n" name="scientific_n" type="text" placeholder="Ejem. Paracanthurus hepatus">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-4">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="type_water">Tipo de Agua</label>
                                                          <select class="form-select input-air-primary" id="type_water" name="type_water">
                                                              <option value="0" selected disabled>Selecciona el Tipo de agua</option>
                                                              <option value="Salada">Salada</option>
                                                              <option value="Dulce">Dulce</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="amount_s">Cantidad de Peces</label>
                                                          <input class="form-control input-air-primary input_numb" id="amount_s" type="text" placeholder="Ejem. 3" name="amount_s">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="status">Estado de Especie</label>
                                                          <select class="form-select input-air-primary" id="status" name="status">
                                                              <option value="0" selected disabled>Selecciona Estado</option>
                                                              <option value="1">Activo</option>
                                                              <option value="2">Inactivo</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <input type="hidden" id="process">
                                              </div>
                                          </div>
                                          <div class="card-footer text-end">
                                              <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                                              <button class="btn btn-info disabled" type="submit" id="btn_send"><i class="fa fa-save"></i> Guardar Especie</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>