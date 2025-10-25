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
                    <h3 class="mb-0">Yangiliklar</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Yangiliklar</li>
                    </ol>
                </div>
                <div class="col-sm-12 d-flex justify-content-end">
                    <a href="?acontroller=news_create" class="btn btn-success">Qo'shish</a>
                </div>
                <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])) { ?>
                    <div class="col-sm-12 mt-2 success_alert">
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
                    <h3 class="card-title">Yangiliklar</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" role="table">
                        <thead>
                            <tr>
                                <th style="width: 10px" scope="col">#</th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Kategoriyasi</th>
                                <th>Ko'rishlar soni</th>
                                <th>Yaratilgan vaqti</th>
                                <th>Rasmi</th>
                                <th>Statusi</th>
                                <th>Amallar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            if (!empty($news)) {
                                foreach ($news as $newsItem) {
                                    $image = getImage("news", $newsItem['id'], $newsItem['image']);

                            ?>
                                    <tr class="align-middle">
                                        <td><?= $i++ ?></td>
                                        <td><?= $newsItem['id'] ?></td>
                                        <td><?= $newsItem['title'] ?></td>
                                        <td><?= $newsItem['category_name'] ?></td>
                                        <td><?= $newsItem['seen_count'] ?></td>
                                        <td><?= date("d.m.Y | H:i", strtotime($newsItem['created_at'])) ?></td>
                                        <td>
                                            <img style="width: 120px; height: 100px; object-fit:cover" src="<?= $image ?>" alt="<?= $newsItem['title'] ?>">
                                        </td>
                                        <td>
                                            <?php if ($newsItem['status'] == STATUS_ACTIVE) { ?>
                                                <span class="badge badge-success text-light bg bg-success">Aktiv</span>
                                            <?php } else { ?>
                                                <span class="badge badge-danger text-light bg bg-danger">Aktiv emas</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="?acontroller=news_update&id=<?= $newsItem['id'] ?>" class="btn btn-primary">
                                                <i class="fas fa-pencil"></i>
                                            </a>
                                            <a data-action="news_delete" href="?acontroller=news_delete&id=<?= $newsItem['id'] ?>" class="btn btn-danger delete_btn" data-id="<?= $newsItem['id'] ?>">
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
                        <?php
                        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        for($i=1; $i <= $pageCount; $i++ ) {
                            $activeClass = ($currentPage == $i) ? 'active' : '';
                            ?>
                            <li class="page-item <?=$activeClass?>"><a class="page-link" href="?acontroller=news_index&page=<?=$i?>"><?=$i?></a></li>
                        <?php }
                        ?>
                        
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