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
                        <li class="breadcrumb-item active" aria-current="page">Kategoriyalar</li>
                    </ol>
                </div>
                <div class="col-sm-12 d-flex justify-content-end">
                    <a href="?acontroller=category_create" class="btn btn-success">Qo'shish</a>
                </div>
                <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])) { ?>
                    <div class="col-sm-12 mt-2 success-alert-category">
                        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
                    </div>
                <?php
                    unset($_SESSION['success']);
                } ?>
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
                    <table class="table table-bordered" role="table">
                        <thead>
                            <tr>
                                <th style="width: 10px" scope="col">#</th>
                                <th>ID</th>
                                <th>Nomi</th>
                                <th>Status</th>
                                <th>Amallar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            if (!empty($categories)) {
                                foreach ($categories as $category) { ?>
                                    <tr class="align-middle">
                                        <td><?= $i++ ?></td>
                                        <td><?= $category['id'] ?></td>
                                        <td><?= $category['name'] ?></td>
                                        <td><?= $category['status'] ?></td>
                                        <td>
                                            <a href="?acontroller=category_update&id=<?= $category['id'] ?>" class="btn btn-primary">
                                                <i class="fas fa-pencil"></i>
                                            </a>
                                            <a href="?acontroller=category_delete&id=<?= $category['id'] ?>" class="btn btn-danger delete-category" data-type="category" data-id-category="<?= $category['id'] ?>">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
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