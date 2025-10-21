<?php
require_once __DIR__ .  "/../widgets/header.php";
?>
<!--begin::Sidebar-->
<?php
require_once __DIR__ .  "/../widgets/sidebar.php";
?>
<!--end::Sidebar-->

<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Menular</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="?acontroller=menu_index">Menular</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= isset($menuItem) ? 'Tahrirlash' : "Qo'shish" ?></li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Bordered Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="?acontroller=<?= isset($menuItem) ? 'menu_update&id=' . $menuItem['id'] : 'menu_create'?>">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="name" class="form-label">Nomi</label>
                                <input required type="text" class="form-control" name="name" id="name" value="<?= (isset($menuItem) && !empty($menuItem['name'])) ? $menuItem['name'] : '' ?>">
                            </div>
                            <div class="mb-2">
                                <label for="position" class="form-label">Pozitsiya</label>
                                <input required type="number" class="form-control" name="position" id="position" value="<?= (isset($menuItem) && !empty($menuItem['position'])) ? $menuItem['position'] : '' ?>">
                            </div>
                            <div class="mb-2">
                                <label for="url" class="form-label">Url</label>
                                <input required type="text" class="form-control" name="url" id="url" value="<?= (isset($menuItem) && !empty($menuItem['url'])) ? $menuItem['url'] : '' ?>">
                            </div>
                            <div class="mb-2">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status">
                                    <option <?= (isset($menuItem) && $menuItem['status'] == STATUS_ACTIVE) ? 'selected' : '' ?> value="<?=STATUS_ACTIVE?>">Aktiv</option>
                                    <option <?= (isset($menuItem) && $menuItem['status'] == STATUS_NOT_ACTIVE) ? 'selected' : '' ?> value="<?=STATUS_NOT_ACTIVE?>">Aktiv emas</option>
                                </select>
                            </div>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"><?= isset($menuItem) ? 'Tahrirlash' : "Qo'shish" ?></button>
                        </div>
                        <!--end::Footer-->
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->

<?php
require_once __DIR__ .  "/../widgets/footer.php";
?>