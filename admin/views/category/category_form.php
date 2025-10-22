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
                    <h3 class="mb-0">Kategoriyalar</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="?acontroller=category_index">Kategoriyalar</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= isset($categoryItem) ? 'Tahrirlash' : "Qo'shish" ?></li>
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
                    <h3 class="card-title">Kategoriyalar</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="?acontroller=<?= isset($categoryItem) ? 'category_update&id=' . $categoryItem['id'] : 'category_create'?>">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="name" class="form-label">Nomi</label>
                                <input required type="text" class="form-control" name="name" id="name" value="<?= (isset($categoryItem) && !empty($categoryItem['name'])) ? $categoryItem['name'] : '' ?>">
                            </div>
                            <div class="mb-2">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status">
                                    <option <?= (isset($categoryItem) && $categoryItem['status'] == STATUS_ACTIVE) ? 'selected' : '' ?> value="<?=STATUS_ACTIVE?>">Aktiv</option>
                                    <option <?= (isset($categoryItem) && $categoryItem['status'] == STATUS_NOT_ACTIVE) ? 'selected' : '' ?> value="<?=STATUS_NOT_ACTIVE?>">Aktiv emas</option>
                                </select>
                            </div>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"><?= isset($categoryItem) ? 'Tahrirlash' : "Qo'shish" ?></button>
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