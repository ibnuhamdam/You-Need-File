<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Files Dokumentasi</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/files/dokumentasi/update') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="meet_id" value="<?= $files[0]->mid; ?>">

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Meeting</label>
                            <select class="form-control  <?php if (session('errors.meeting')) : ?>is-invalid<?php endif ?>" name="meeting" id="exampleFormControlSelect1">
                                <option value="<?= $files[0]->mid ?>"><?= $files[0]->mnama ?></option>
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
                            <textarea class="form-control <?php if (session('errors.deskripsi')) : ?>is-invalid<?php endif ?>" id="deskripsi" name="deskripsi" rows="3"><?= (old('deskripsi')) ? old('deskripsi') : $files[0]->deskripsi ?></textarea>
                            <?php if (session('errors.deskripsi')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= session('errors.deskripsi') ?>
                                </div>
                            <?php else : ?>
                                <small>Fill it with detail information of the uploaded files</small>
                            <?php endif; ?>

                        </div>
                        <div class="form-group">
                            <label for="link">File Image</label>
                            <div>
                                <?php $no = 1;
                                foreach ($files as $f) : ?>
                                    <input type="hidden" name="id[]" value="<?= $f->id ?>">
                                    <label for="">image <?= $no++ ?></label>
                                    <div class="custom-file mb-2 <?php if (session('errors.image')) : ?>is-invalid<?php endif ?>">
                                        <input type="file" name="image[]" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile"><?= $f->nama ?></label>
                                    </div>
                                    <div class="mb-3">
                                        <a href="<?= base_url('uploads/berkas/dokumentasi') . '/' . $f->nama ?>" target="__BLANK">Lihat image</a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
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
    $(document).ready(function() {
        bsCustomFileInput.init()
    });
</script>
<?= $this->endSection(); ?>