<!-- Page Sidebar Ends-->
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>ACUARIOS Y PECERAS</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="<?= base_url() ?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Pesceras y Acuarios</li>
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
                                <button id="btn_add" class="btn btn-pill btn-success btn-air-success btn-animation" type="submit">
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
                                        <th rowspan="2">PECERA</th>
                                        <th rowspan="2">TEMPERATURA MIN</th>
                                        <th rowspan="2">TEMPERATURA MAX</th>
                                        <th rowspan="2">ACCIONES</th>
                                    </tr>
                                    <tr>
                                        <th>LARGO CM</th>
                                        <th>ANCHO CM</th>
                                        <th>ALTO CM</th>
                                        <th>LT</th>
                                    </tr>
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
                                        <th>PECERA</th>
                                        <th>TEMPERATURA MIN</th>
                                        <th>TEMPERATURA MAX</th>
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
                                    <input class="form-control input-air-primary fnRow" id="name_bowl" name="name_bowl" type="text" placeholder="Ejem. Vidrio 1" autofocus />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="type_bowl">Tipo de PECERA</label>
                                    <select class="form-select input-air-primary fnRow" id="type_bowl" name="type_bowl">
                                        <option value="0" selected disabled>
                                            Selecciona el Tipo de pecera
                                        </option>
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
                                        <option value="0" selected disabled>
                                            Selecciona el Tipo de agua
                                        </option>
                                        <option value="Salada">Salada</option>
                                        <option value="Dulce">Dulce</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="cleave-date1">Fecha Instalación</label>
                                    <input class="form-control input-air-primary fnRow" id="cleave-date1" name="cleave-date1" type="text" placeholder="DD-MM-YYYY" data-listener-added_8866100a="true" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="status">Estado de PECERA</label>
                                    <select class="form-select input-air-primary fnRow" id="status" name="status">
                                        <option value="0" selected disabled>
                                            Selecciona Estado
                                        </option>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="large_b">Temperatura de Agua</label>
                                    <div class="input-group">
                                        <input class="form-control input-air-primary fnRow input_numb" type="text" placeholder="Minimo" id="tmp_min" name="tmp_min" />
                                        <span class="input-group-text">Hasta</span>
                                        <input class="form-control input-air-primary fnRow input_numb" type="text" placeholder="Maximo" id="tmp_max" name="tmp_max" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label" for="large_b">Largo (cm)</label>
                                    <input class="form-control input-air-primary fnRow input_numb" id="large_b" name="large_b" type="text" placeholder="Ejem. 200" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label" for="width_b">Ancho (cm)</label>
                                    <input class="form-control input-air-primary fnRow input_numb" id="width_b" name="width_b" type="text" placeholder="Ejem. 49.7" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label" for="height_b">Alto (cm)</label>
                                    <input class="form-control input-air-primary fnRow input_numb" id="height_b" name="height_b" type="text" placeholder="Ejem. 80" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="volumen_w">Volumen de Agua</label>
                                    <input class="form-control input-air-primary fnRow disabled" id="volumen_w" name="volumen_w" type="text" placeholder="Ejem. 795.20" />
                                </div>
                            </div>
                            <input type="hidden" id="id_fishbowl" name="id_fishbowl" />
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
                            <i class="fa fa-times-circle"></i> Cancelar
                        </button>
                        <button class="btn btn-success" disabled type="submit" id="btn_send">
                            <i class="fa fa-save"></i> Guardar Pecera
                        </button>
                        <button class="btn btn-info hidden" type="submit" id="btn_update">
                            <i class="fa fa-edit"></i> Actualizar Especie
                        </button>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 id="">Product Form</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-xl-5 g-3">
                                        <div class="col-xxl-3 col-xl-4 box-col-4e sidebar-left-wrapper">
                                            <ul class="sidebar-left-icons nav nav-pills" id="add-product-pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="detail-product-tab" data-bs-toggle="pill" href="#detail-product" role="tab" aria-controls="detail-product" aria-selected="false">
                                                        <div class="nav-rounded">
                                                            <div class="product-icons">
                                                                <svg class="stroke-icon">
                                                                    <use href="../assets/svg/icon-sprite.svg#product-category">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div class="product-tab-content">
                                                            <h6>Historial de cambios</h6>
                                                            <p>Visualizaras ingresos y salidas</p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="advance-product-tab" data-bs-toggle="pill" href="#add-species-fishbowl" role="tab" aria-controls="add-species-fishbowl" aria-selected="false">
                                                        <div class="nav-rounded">
                                                            <div class="product-icons">
                                                                <svg class="stroke-icon">
                                                                    <use href="../assets/svg/icon-sprite.svg#product-detail">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div class="product-tab-content">
                                                            <h6>Ingresos</h6>
                                                            <p>Aumentar especies</p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="category-product-tab" data-bs-toggle="pill" href="#category-product" role="tab" aria-controls="category-product" aria-selected="false">
                                                        <div class="nav-rounded">
                                                            <div class="product-icons">
                                                                <svg class="stroke-icon">
                                                                    <use href="../assets/svg/icon-sprite.svg#product-category">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div class="product-tab-content">
                                                            <h6>Salidas</h6>
                                                            <p>Disminuir cantidad especies</p>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xxl-9 col-xl-8 box-col-8 position-relative">
                                            <div class="tab-content" id="add-product-pills-tabContent">
                                                <div class="tab-pane fade show active" id="detail-product" role="tabpanel" aria-labelledby="detail-product-tab">
                                                    <div class="sidebar-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Especie</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Tipo de Mov.</th>
                                                                    <th>Fecha y hora</th>
                                                                    <th>Acciones</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="category-product" role="tabpanel" aria-labelledby="category-product-tab">
                                                    <div class="sidebar-body">
                                                        <div class="row g-lg-4 g-3">
                                                            <div class="col-12">
                                                                <div class="row g-3">
                                                                    <div class="col-sm-6">
                                                                        <div class="row g-2">
                                                                            <div class="col-12">
                                                                                <label class="form-label m-0" for="validationDefault04">Add
                                                                                    Category</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <select class="form-select" id="validationDefault04" required="">
                                                                                    <option selected="" value="">
                                                                                        Toys & games
                                                                                    </option>
                                                                                    <option>Sportswear</option>
                                                                                    <option>Jewellery</option>
                                                                                    <option>Furniture and Decor
                                                                                    </option>
                                                                                    <option>
                                                                                        Health, Personal Care, and
                                                                                        Beauty
                                                                                    </option>
                                                                                    <option>Auto and Parts</option>
                                                                                    <option>Baby Care Products
                                                                                    </option>
                                                                                </select>
                                                                                <p class="f-light">
                                                                                    A product can be added to a
                                                                                    category
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="row g-2 product-tag">
                                                                            <div class="col-12">
                                                                                <label class="form-label d-block m-0">Add
                                                                                    Tag</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <input name="basic-tags" value="watches, sports, clothes, bottles" />
                                                                                <p class="f-light">
                                                                                    Products can be tagged
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row g-3">
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <label class="form-label" for="publishStatus">Publish
                                                                                    Status</label>
                                                                                <select class="form-select" id="publishStatus" required="">
                                                                                    <option selected="" value="">
                                                                                        Publish
                                                                                    </option>
                                                                                    <option>Drafts</option>
                                                                                    <option>Unpublish</option>
                                                                                </select>
                                                                                <p class="f-light">
                                                                                    Choose the status
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <label class="form-label" for="datetime-local1">Publish
                                                                                    Date & Time</label>
                                                                                <div class="input-group flatpicker-calender product-date">
                                                                                    <input class="form-control" id="datetime-local1" type="date" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="add-species-fishbowl" role="tabpanel" aria-labelledby="advance-product-tab">
                                                    <div class="sidebar-body advance-options">
                                                        <ul class="nav nav-tabs border-tab mb-0" id="advance-option-tab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="manifest-option-tab" data-bs-toggle="tab" href="#manifest-option" role="tab" aria-controls="manifest-option" aria-selected="true">Aumentar especie existente </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="new-specie-fishbowl" data-bs-toggle="tab" href="#additional-option" role="tab" aria-controls="additional-option" aria-selected="false">Agregar nueva especie</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="advance-option-tabContent">
                                                            <div class="tab-pane fade" id="manifest-option" role="tabpanel" aria-labelledby="manifest-option-tab">
                                                                <div class="meta-body">
                                                                    <div class="row g-3 custom-input">
                                                                        <div class="col-sm-6">
                                                                            <label class="form-label">Especies</label>
                                                                            <select class="form-select" aria-label="Default select example">
                                                                                <option selected="">In stock
                                                                                </option>
                                                                                <option value="1">
                                                                                    Out of stock
                                                                                </option>
                                                                                <option value="2">Pre-order</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <label class="form-label">Low
                                                                                Stock</label>
                                                                            <select class="form-select" aria-label="Default select example">
                                                                                <option selected="">
                                                                                    Low Stock (5 or less)
                                                                                </option>
                                                                                <option value="1">
                                                                                    Low Stock (10 or less)
                                                                                </option>
                                                                                <option value="2">
                                                                                    Low Stock (20 or less)
                                                                                </option>
                                                                                <option value="2">
                                                                                    Low Stock (25 or less)
                                                                                </option>
                                                                                <option value="2">
                                                                                    Low Stock (30 or less)
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-3 col-sm-6">
                                                                            <label class="form-label" for="exampleFormControlInput1">SKU
                                                                                <span class="txt-danger">*</span></label>
                                                                            <input class="form-control" id="exampleFormControlInput1" type="text" />
                                                                        </div>
                                                                        <div class="col-lg-3 col-sm-6">
                                                                            <label class="form-label" for="exampleFormControlInputa">Stock
                                                                                Quantity
                                                                                <span class="txt-danger">*</span></label>
                                                                            <input class="form-control" id="exampleFormControlInputa" type="number" value="7" min="0" />
                                                                        </div>
                                                                        <div class="col-lg-3 col-sm-6">
                                                                            <label class="form-label" for="exampleFormControlInputb">Restock
                                                                                Date
                                                                                <span class="txt-danger">*</span></label>
                                                                            <input class="form-control" id="exampleFormControlInputb" type="number" />
                                                                        </div>
                                                                        <div class="col-lg-3 col-sm-6">
                                                                            <label class="form-label" for="exampleFormControlInputc">Pre-Order
                                                                                <span class="txt-danger">*</span></label>
                                                                            <input class="form-control" id="exampleFormControlInputc" type="number" />
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <label class="form-label">Allow
                                                                                Backorders</label>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" id="gridCheck" type="checkbox" />
                                                                                <label class="form-check-label m-0" for="gridCheck">This is a
                                                                                    digital Product</label>
                                                                                <p class="f-light">
                                                                                    Decide if the product is a
                                                                                    digital
                                                                                    or physical item. Shipping may
                                                                                    be
                                                                                    necessary for real-world items.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="additional-option" role="tabpanel" aria-labelledby="new-specie-fishbowl">
                                                                <div class="meta-body">
                                                                    <form id="form-new-specie">
                                                                        <div class="row g-3">
                                                                            <div class="col-sm-6">
                                                                                <label class="form-label">Especies</label>
                                                                                <select class="form-select" aria-label="lista de especies" id="select-new-species" name="select-new-species">
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="row custom-input">
                                                                                    <label class="form-label">Cantidad Actual</label>
                                                                                    <h1 id="amount_fish"></h1>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-3">
                                                                            <div class="col-sm-6">
                                                                                <label class="form-label">Cantidad a agregar</label>
                                                                                <input type="text" class="form-control input_numb" id="add-amount" name="add-amount"  value="0">
                                                                                <div class="invalid-feedback">La cantidad a agregar debe ser menor o igual a la cantidad actual.</div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="row custom-input">
                                                                                    <label class="form-label" for="tagTitle">Cantidad Restante</label>
                                                                                    <h1 id="restant_fish"></h1>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-3">
                                                                            <div class="col-sm-12">
                                                                                <label class="form-label">Razón de ingreso</label>
                                                                                <textarea class="form-control" name="reason-add" id="reason-add" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-3 text-end">
                                                                            <div class="col-sm-12">
                                                                                <br>
                                                                                <button class="btn btn-success me-3" id="btn-send-new-specie" type="submit"><i class="fa fa-plus"></i> Agregar nueva especie</button>
                                                                            </div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>