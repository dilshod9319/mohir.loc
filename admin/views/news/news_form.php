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
                        <li class="breadcrumb-item" aria-current="page"><a href="?acontroller=news_index">Yangiliklar</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= isset($newsItem) ? 'Tahrirlash' : "Qo'shish" ?></li>
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
                    <h3 class="card-title">Yangiliklar</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="?acontroller=<?= isset($newsItem) ? 'news_update&id=' . $newsItem['id'] : 'news_create' ?>" enctype="multipart/form-data">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="title" class="form-label">Sarlavha</label>
                                <input required type="text" class="form-control" name="title" id="title" value="<?= (isset($newsItem) && !empty($newsItem['title'])) ? $newsItem['title'] : '' ?>">
                            </div>
                            <div class="mb-2">
                                <label for="category" class="form-label">Kategoriya</label>
                                <select class="form-select" name="category_id" id="category" required>
                                    <option value="">Kategoriyani tanlang</option>
                                    <?php if (!empty($categories)) {
                                        foreach ($categories as $category) { ?>
                                            <option <?= (isset($newsItem) && ($newsItem['category_id'] == $category['id'])) ? 'selected' : '' ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea required class="form-control" name="description" id="description" cols="30"><?= (isset($newsItem) && !empty($newsItem['description'])) ? $newsItem['description'] : '' ?></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="body" class="form-label">Asosiy matn</label>
                                <textarea required class="form-control" name="body" id="body" rows="5" cols="30"><?= (isset($newsItem) && !empty($newsItem['body'])) ? $newsItem['body'] : ''?></textarea>
                            </div>

                            <div class="mb-2">
                                <label for="image" class="form-label">Rasm</label>
                                <input type="file" class="form-control" name="image" id="image" accept="image/jpg, image/png">
                            </div>
                            <div class="mb-2">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status">
                                    <option <?= (isset($newsItem) && $newsItem['status'] == STATUS_ACTIVE) ? 'selected' : '' ?> value="<?= STATUS_ACTIVE ?>">Aktiv</option>
                                    <option <?= (isset($newsItem) && $newsItem['status'] == STATUS_NOT_ACTIVE) ? 'selected' : '' ?> value="<?= STATUS_NOT_ACTIVE ?>">Aktiv emas</option>
                                </select>
                            </div>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"><?= isset($newsItem) ? 'Tahrirlash' : "Qo'shish" ?></button>
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

<script>
    document.getElementById('image').addEventListener('change', function(){
        const file = this.files[0];
        if(file){
            const maxSize = 2 * 1024 * 1024; // 2mb
            if(file.size > maxSize){
                alert("Fayl hajmi 2MB dan katta bo'lmasligi kerak!");
                this.value = ""; // faylni tozalash
            }
        }
    });
</script>