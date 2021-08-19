<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Meeting</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/meeting/insert') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-12 col-md-8">
                        <h5 class="py-3"> <strong> Detail Meeting</strong></h5>
                        <div class="form-group">
                            <label for="name">Nama Rapat</label>
                            <input type="text" name="nama" class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" id="name" autocomplete="off" autofocus value="<?= old('nama') ?>">
                            <?php if (session('errors.nama')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= session('errors.nama') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="pengundang">Instansi Pengundang</label>
                            <input type="text" name="pengundang" class="form-control <?php if (session('errors.pengundang')) : ?>is-invalid<?php endif ?>" id="pengundang" autocomplete="off" value="<?= old('pengundang') ?>">
                            <?php if (session('errors.pengundang')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= session('errors.pengundang') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="jam">Jam</label>
                                    <input type="time" name="jam" min="05:00" max="21:00" class="form-control <?php if (session('errors.jam')) : ?>is-invalid<?php endif ?>" id="jam" autocomplete="off" value="<?= old('jam') ?>">
                                    <?php if (session('errors.jam')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('errors.jam') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" min="<?= date('Y-m-d') ?>" class="form-control <?php if (session('errors.tanggal')) : ?>is-invalid<?php endif ?>" id="tanggal" autocomplete="off" value="<?= old('tanggal') ?>">
                                    <?php if (session('errors.tanggal')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('errors.tanggal') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tempat">Tempat</label>
                            <input type="text" name="tempat" class="form-control <?php if (session('errors.tempat')) : ?>is-invalid<?php endif ?>" id="tempat" autocomplete="off" value="<?= old('tempat') ?>">
                            <?php if (session('errors.tempat')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= session('errors.tempat') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="bidang">Bidang</label>
                            <select class="form-control <?php if (session('errors.bidang_id')) : ?>is-invalid<?php endif ?>" name="bidang_id" id="bidang_id">
                                <?php foreach ($bidang as $b) : ?>
                                    <option value="<?= $b['id'] ?>"><?= $b['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (session('errors.bidang_id')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= session('errors.bidang_id') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h5 class="py-3"> <strong> Detail Virtual Meeting</strong></h5>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="meet_id">Meeting ID</label>
                                    <input type="text" name="meet_id" class="form-control <?php if (session('errors.meet_id')) : ?>is-invalid<?php endif ?>" id="meet_id" autocomplete="off" value="<?= old('meet_id') ?>">
                                    <?php if (session('errors.meet_id')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('errors.meet_id') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="meet_pass">Meeting Passcode</label>
                                    <input type="text" name="meet_pass" class="form-control <?php if (session('errors.meet_pass')) : ?>is-invalid<?php endif ?>" id="meet_pass" autocomplete="off" value="<?= old('meet_pass') ?>">
                                    <?php if (session('errors.meet_pass')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('errors.meet_pass') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="link">Link Zoom Meeting</label>
                                    <input type="text" name="link" class="form-control text-primary <?php if (session('errors.link')) : ?>is-invalid<?php endif ?>" id="link" autocomplete="off" value="<?= old('link') ?>">
                                    <?php if (session('errors.link')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('errors.link') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="link">Undangan Rapat</label>
                            <div class="custom-file <?php if (session('errors.undangan')) : ?>is-invalid<?php endif ?>">
                                <input type="file" name="undangan" class="custom-file-input" id="customFile" value="<?= old('undangan') ?>" accept=".pdf">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <?php if (session('errors.undangan')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= session('errors.undangan') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4 mt-3 col-12 border-left-1">
                        <h5 class="mb-3">Anggota Meeting</h5>
                        <div class="form-group">
                            <select class="selectpicker form-control" id="anggota" name="anggota[]" multiple data-live-search="true" required>
                                <?php foreach ($users as $u) : ?>
                                    <option value="<?= $u->id ?>"><?= $u->full_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="ml-4" id="list-anggota">
                            <!-- <p> <i class="fas fa-user mr-3 text-success"></i> Ali Rachmat</p> -->
                        </div>
                    </div>
                    <button class="btn btn-success btn-md ml-3 mt-3"> <i class="fa fa-save"></i> Save changes</button>
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
        $('#anggota').change(function() {
            let nama = "";
            let id = "";
            $('#anggota option:selected').each(function() {
                nama += '<p> <i class="fas fa-user mr-3 text-success"></i>' + $(this).text() + "</p>";
                id += $(this).val() + ",";
            });
            $("#list-anggota").html(nama);
            // $(this).val(id);
        })
    });
</script>
<?= $this->endSection(); ?>