<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Files Paparan</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/files/dokumentasi/insert') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Meeting</label>
                            <select class="form-control  <?php if (session('errors.meeting')) : ?>is-invalid<?php endif ?>" name="meeting" id="exampleFormControlSelect1">
                                <?php foreach ($meeting as $m) : ?>
                                    <option value="<?= $m['id'] ?>"><?= $m['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (session('errors.meeting')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= session('errors.meeting') ?>
                                </div>
                            <?php else : ?>
                                <small class="text-primary">Please choose meeting before uploading files</small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Files</label>
                            <textarea class="form-control <?php if (session('errors.deskripsi')) : ?>is-invalid<?php endif ?>" id="deskripsi" name="deskripsi" rows="3"><?= old('deskripsi') ?></textarea>
                            <?php if (session('errors.deskripsi')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= session('errors.deskripsi') ?>
                                </div>
                            <?php else : ?>
                                <small>Fill it with detail information of the uploaded files</small>
                            <?php endif; ?>

                        </div>
                        <div class="form-group">
                            <label for="input-fa">Upload Dokumentasi</label>
                            <div class="file-loading">
                                <input id="input-fa" class="" name="image[]" type="file" accept="image/*" multiple>
                            </div>
                            <input type="hidden" class="<?php if (session('errors.image')) : ?>is-invalid<?php endif ?>">
                            <?php if (session('errors.image')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= session('errors.image') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <button class="btn btn-success">Submit Files</button>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>
<?= $this->section('scripts') ?>
<script>
    // For Bootstrap 4.x uncomment and use below code
    $("#input-fa").fileinput({
        theme: "fas",
        uploadAsync: false,
        maxFileCount: 3,
        showUpload: false,
    });
</script>
<?= $this->endSection(); ?>