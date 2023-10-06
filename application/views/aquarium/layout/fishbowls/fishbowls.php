                      <!-- Page Sidebar Ends-->
                      <div class="page-body">
                          <div class="container-fluid">
                              <div class="page-title">
                                  <div class="row">
                                      <div class="col-6">
                                          <h4>ACUARIOS Y PECERAS </h4>
                                      </div>
                                      <div class="col-6">
                                          <ol class="breadcrumb">
                                              <li class="breadcrumb-item"><a href="index.html">
                                                      <svg class="stroke-icon">
                                                          <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                                      </svg></a></li>
                                              <li class="breadcrumb-item">Dashboard</li>
                                              <li class="breadcrumb-item active">Pesceras y Acuarios </li>
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
                                                          <i class="fa fa-plus"></i> Agregar Acuario o Pecera
                                                      </button>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="card-body">
                                              <div class="">
                                                  <table class="table table-striped text-center" id="data-fishbowls">
                                                      <thead class="text-center">
                                                          <tr>
                                                              <th rowspan="2">NOMBRE</th>
                                                              <th rowspan="2">TIPO AGUA</th>
                                                              <th colspan="4">VOLUMEN DE AGUA</th>
                                                              <th rowspan="2">ESTADO</th>
                                                              <th rowspan="2">ESPECIES</th>
                                                              <th rowspan="2">FECHA INSTAL.</th>
                                                              <th rowspan="2">ACCIONES</th>
                                                              <th rowspan="2">PECERA</th>
                                                              <th rowspan="2">TEMPERATURA MIN</th>
                                                              <th rowspan="2">TEMPERATURA MAX</th>
                                                          </tr>
                                                          <tr>
                                                              <th>LARGO CM</th>
                                                              <th>ANCHO CM</th>
                                                              <th>ALTO CM</th>
                                                              <th>LT</th>
                                                      </thead>
                                                      <tfoot class="text-center">
                                                          <tr>
                                                              <th>NOMBRE</th>
                                                              <th>TIPO AGUA</th>
                                                              <th>LARGO CM</th>
                                                              <th>ANCHO CM</th>
                                                              <th>ALTO CM</th>
                                                              <th>LT</th>
                                                              <th>ESTADO</th>
                                                              <th>ESPECIES</th>
                                                              <th>FECHA INSTAL.</th>
                                                              <th>ACCIONES</th>
                                                              <th>PECERA</th>
                                                              <th>TEMPERATURA MIN</th>
                                                              <th>TEMPERATURA MAX</th>

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
                          <div class="modal-dialog modal-xl modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title" id="title_modal"></h4>
                                      <button class="btn-close theme-close bg-primary" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <form class="form-bookmark theme-form" id="frm_fishbowl">
                                          <div class="card-body">
                                              <div class="row">
                                                  <div class="col-md-4">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="name_bowl">Nombre</label>
                                                          <input class="form-control input-air-primary fnRow" id="name_bowl" name="name_bowl" type="text" placeholder="Ejem. Vidrio 1" autofocus>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="type_bowl">Tipo de PECERA</label>
                                                          <select class="form-select input-air-primary fnRow" id="type_bowl" name="type_bowl">
                                                              <option value="0" selected disabled>Selecciona el Tipo de pecera</option>
                                                              <option value="Pecera">PECERA</option>
                                                              <option value="Acuario">ACUARIO</option>
                                                              <option value="Poza">POZA</option>
                                                          </select>
                                                      </div>
                                                  </div>
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
                                                          <label class="form-label" for="cleave-date1">Fecha Instalación</label>
                                                          <input class="form-control input-air-primary fnRow" id="cleave-date1" name="cleave-date1" type="text" placeholder="DD-MM-YYYY" data-listener-added_8866100a="true">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="status">Estado de PECERA</label>
                                                          <select class="form-select input-air-primary fnRow" id="status" name="status">
                                                              <option value="0" selected disabled>Selecciona Estado</option>
                                                              <option value="1">Activo</option>
                                                              <option value="2">Inactivo</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="large_b">Temperatura de Agua</label>
                                                          <div class="input-group">
                                                              <input class="form-control input-air-primary fnRow input_numb" type="text" placeholder="Minimo" id="tmp_min" name="tmp_min">
                                                              <span class="input-group-text">Hasta</span>
                                                              <input class="form-control input-air-primary fnRow input_numb" type="text" placeholder="Maximo" id="tmp_max" name="tmp_max">
                                                          </div>
                                                      </div>
                                                  </div>

                                              </div>
                                              <div class="row">
                                                  <div class="col-md-2">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="large_b">Largo (cm)</label>
                                                          <input class="form-control input-air-primary fnRow input_numb" id="large_b" name="large_b" type="text" placeholder="Ejem. 200">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="width_b">Ancho (cm)</label>
                                                          <input class="form-control input-air-primary fnRow input_numb" id="width_b" name="width_b" type="text" placeholder="Ejem. 49.7">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-2">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="height_b">Alto (cm)</label>
                                                          <input class="form-control input-air-primary fnRow input_numb" id="height_b" name="height_b" type="text" placeholder="Ejem. 80">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                      <div class="mb-3">
                                                          <label class="form-label" for="volumen_w">Volumen de Agua</label>
                                                          <input class="form-control input-air-primary fnRow disabled" id="volumen_w" name="volumen_w" type="text" placeholder="Ejem. 795.20">
                                                      </div>
                                                  </div>
                                                  <input type="hidden" id="id_fishbowl" name="id_fishbowl">
                                              </div>
                                          </div>
                                          <div class="card-footer text-end">
                                              <button class="btn btn-danger" type="button" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                                              <button class="btn btn-success disabled" type="submit" id="btn_send"><i class="fa fa-save"></i> Guardar Pecera</button>
                                              <button class="btn btn-info hidden" type="submit" id="btn_update"><i class="fa fa-edit"></i> Actualizar Especie</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>


                      <!---- MODAL LOGS ACUARIO ---->
                      <div class="modal fade" tabindex="-1" role="dialog" id="mdl_logs" aria-hidden="true">
                          <div class="modal-dialog modal-xl modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-body">
                                      <div class="container-fluid email-wrap bookmark-wrap todo-wrap">
                                          <div class="row">
                                              <div class="col-xl-3 xl-30 box-col-12">
                                                  <div class="email-sidebar md-sidebar"><a class="btn btn-primary email-aside-toggle md-sidebar-toggle">To
                                                          Do filter</a>
                                                      <div class="email-left-aside md-sidebar-aside">
                                                          <div class="card">
                                                              <div class="card-body">
                                                                  <div class="email-app-sidebar left-bookmark custom-scrollbar">
                                                                      <div class="d-flex align-items-center">
                                                                          <div class="media-size-email"><img class="me-3 img-40 rounded-circle" src="../assets/images/user/user.png" alt=""></div>
                                                                          <div class="flex-grow-1">
                                                                              <h6 class="f-w-600 title_log"></h6>
                                                                          </div>
                                                                      </div>
                                                                      <ul class="nav main-menu">
                                                                          <li class="nav-item">
                                                                              <button class="btn-primary badge-light d-block btn-mail w-100"><i class="me-2" data-feather="check-circle"> </i>To Do List</button>
                                                                          </li>
                                                                          <li class="nav-item"> <a href="javascript:void(0)"><span class="iconbg badge-light-primary"><i data-feather="file-plus"></i></span><span class="title ms-2">Todos</span></a></li>
                                                                          <li class="nav-item"><a href="javascript:void(0)"><span class="iconbg badge-light-success"><i data-feather="check-circle"></i></span><span class="title ms-2">Ingresos</span><span class="badge badge-success">3</span></a></li>
                                                                          <li class="nav-item"><a href="javascript:void(0)"><span class="iconbg badge-light-danger"><i data-feather="cast"></i></span><span class="title ms-2">Salidas</span><span class="badge badge-danger">2</span></a></li>
                                                                          <!--<li class="nav-item"><a href="javascript:void(0)"><span class="iconbg badge-light-info"><i data-feather="activity"></i></span><span class="title ms-2">Anulados</span><span class="badge badge-primary">2</span></a></li>-->
                                                                      </ul>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-xl-9 xl-70 box-col-12">
                                                  <div class="card">
                                                      <div class="card-header">
                                                          <h3 class="mb-0 title_log"></h3>
                                                      </div>
                                                      <div class="card-body">
                                                          <div class="todo">
                                                              <div class="todo-list-wrapper">
                                                                  <div class="todo-list-container">
                                                                      <div class="mark-all-tasks">
                                                                          <div class="mark-all-tasks-container">
                                                                              <span class="mark-all-btn" id="mark-all-finished" role="button">
                                                                                  <span class="btn-label">Mark all as finished</span>
                                                                                  <span class="action-box completed">
                                                                                      <i class="icon">
                                                                                          <i class="icon-check"></i>
                                                                                      </i>
                                                                                  </span>
                                                                              </span>
                                                                              <span class="mark-all-btn move-down" id="mark-all-incomplete" role="button">
                                                                                  <span class="btn-label">Mark all as
                                                                                      Incomplete</span>
                                                                                  <span class="action-box">
                                                                                      <i class="icon">
                                                                                          <i class="icon-check"></i>
                                                                                      </i>
                                                                                  </span>
                                                                              </span>
                                                                          </div>
                                                                          <div class="todo-list-footer ms-2">
                                                                              <div class="add-task-btn-wrapper"><span class="add-task-btn">
                                                                                      <button class="btn btn-primary"><i class="icon-plus"></i> Agregar Movimiento</button></span>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <div class="todo-list-body">
                                                                          <div class="todo-list-footer">
                                                                              <div class="new-task-wrapper mb-4">
                                                                                  <textarea id="new-task" placeholder="Enter new task here. . ."></textarea><span class="btn btn-danger cancel-btn" id="close-task-panel">Cerrar</span><span class="btn btn-success ms-3 add-new-task-btn" id="add-task">Guardar</span>
                                                                              </div>
                                                                          </div>
                                                                          <ul id="todo-list">
                                                                              <li class="task">
                                                                                  <div class="task-container">
                                                                                      <h4 class="task-label">Check validation involves making sure all your tags are properly
                                                                                          closed and nested.</h4>
                                                                                      <div class="d-flex align-items-center gap-4"><span class="badge badge-light-primary">In
                                                                                              Progress</span>
                                                                                          <h5 class="assign-name m-0">10 Nov</h5><span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
                                                                                      </div>
                                                                                  </div>
                                                                              </li>
                                                                              <li class="task">
                                                                                  <div class="task-container">
                                                                                      <h4 class="task-label">Test the outgoing links from all the pages to the specific domain
                                                                                          under test.</h4>
                                                                                      <div class="d-flex align-items-center gap-4"><span class="badge badge-light-danger">Pending</span>
                                                                                          <h5 class="assign-name m-0">04 Aug</h5><span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
                                                                                      </div>
                                                                                  </div>
                                                                              </li>
                                                                              <li class="completed task">
                                                                                  <div class="task-container">
                                                                                      <h4 class="task-label">Test links are used to send emails to admin or other users from
                                                                                          web pages.</h4>
                                                                                      <div class="d-flex align-items-center gap-4"><span class="badge badge-light-success">Done</span>
                                                                                          <h5 class="assign-name m-0">25 Feb</h5><span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
                                                                                      </div>
                                                                                  </div>
                                                                              </li>
                                                                              <li class="task">
                                                                                  <div class="task-container">
                                                                                      <h4 class="task-label">Options to create forms, if any, form deletes a view or modify
                                                                                          the forms.</h4>
                                                                                      <div class="d-flex align-items-center gap-4"><span class="badge badge-light-primary">In
                                                                                              Progress</span>
                                                                                          <h5 class="assign-name m-0">15 Dec</h5><span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
                                                                                      </div>
                                                                                  </div>
                                                                              </li>
                                                                              <li class="task">
                                                                                  <div class="task-container">
                                                                                      <h4 class="task-label">Wrong inputs in the forms to the fields in the forms.</h4>
                                                                                      <div class="d-flex align-items-center gap-4"><span class="badge badge-light-danger">Pending</span>
                                                                                          <h5 class="assign-name m-0">11 Nov</h5><span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
                                                                                      </div>
                                                                                  </div>
                                                                              </li>
                                                                              <li class="task completed">
                                                                                  <div class="task-container">
                                                                                      <h4 class="task-label">Check if the instructions provided are perfect to satisfy its
                                                                                          purpose.</h4>
                                                                                      <div class="d-flex align-items-center gap-4"><span class="badge badge-light-danger">Pending</span>
                                                                                          <h5 class="assign-name m-0">04 Sept</h5><span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
                                                                                      </div>
                                                                                  </div>
                                                                              </li>
                                                                              <li class="task">
                                                                                  <div class="task-container">
                                                                                      <h4 class="task-label">Application server and Database server interface.</h4>
                                                                                      <div class="d-flex align-items-center gap-4"><span class="badge badge-light-success">Done</span>
                                                                                          <h5 class="assign-name m-0">08 July</h5><span class="task-action-btn"><span class="action-box large delete-btn" title="Delete Task"><i class="icon"><i class="icon-trash"></i></i></span><span class="action-box large complete-btn" title="Mark Complete"><i class="icon"><i class="icon-check"></i></i></span></span>
                                                                                      </div>
                                                                                  </div>
                                                                              </li>
                                                                          </ul>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="notification-popup hide">
                                                                  <p><span class="task"></span><span class="notification-text"></span></p>
                                                              </div>
                                                              <script id="task-template" type="tect/template">
                                                                  <li class="task">
                                                                    <div class="task-container">
                                                                    <h4 class="task-label"></h4>
                                                                    <div class="d-flex align-items-center gap-4">
                                                                        <span class="badge badge-light-danger">Pending</span>
                                                                        <h5 class="assign-name">16 Jan</h5>
                                                                        <span class="task-action-btn">
                                                                        <span class="action-box large delete-btn" title="Delete Task">
                                                                            <i class="icon"><i class="icon-trash"></i></i>
                                                                        </span>
                                                                        <span class="action-box large complete-btn" title="Mark Complete">
                                                                            <i class="icon"><i class="icon-check"></i></i>
                                                                        </span>
                                                                        </span>
                                                                    </div>
                                                                    </div>
                                                                </li>
                                                                </script>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>