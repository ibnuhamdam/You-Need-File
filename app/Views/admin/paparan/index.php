<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tables Paparan</h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url('admin/files/paparan/add') ?>">
                <button class="btn btn-primary mb-3"> <i class="fa fa-plus"></i> Add Paparan</button>
            </a>
            <div id="wrap-alert">
                <?php if (session('notif')) : ?>
                    <div class="alert alert-success" id="alert" role="alert"><?= session('notif') ?></div>
                <?php elseif (session('error')) : ?>
                    <div class="alert alert-danger" id="alert" role="alert"><?= session('error') ?></div>
                <?php endif; ?>

            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Files</th>
                            <th>Meeting</th>
                            <th>Uploaded By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($files as $f) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><a style="text-decoration: none;" target="__BLANK" href="<?= base_url('uploads/berkas/paparan') . '/' . $f->nama ?>"> <i class="far fa-file-pdf mr-2"></i><?= $f->nama ?></a></td>
                                <td><?= $f->mnama; ?></td>
                                <td><?= $f->unama; ?></td>
                                <td>
                                    <a href="<?= base_url("admin/files/paparan/edit/$f->meeting_id") ?>" class="btn btn-primary">Edit</a>
                                    <form action="<?= base_url('admin/files/paparan/delete') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $f->id ?>">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>