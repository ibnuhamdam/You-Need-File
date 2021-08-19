<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tables Daftar Hadir</h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url('admin/files/attendes/add') ?>">
                <button class="btn btn-primary mb-3"> <i class="fa fa-plus"></i> Add Daftar Hadir</button>
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
                            <th>Daftar Hadir</th>
                            <th>Link</th>
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
                                <td class="ellipsed"><a class="ellipsed" style="text-decoration: none;" target="__BLANK" href="<?= base_url('uploads/berkas/attendes') . '/' . $f->nama ?>"> <i class="far fa-file-image mr-2"></i><?= $f->nama ?></a></td>
                                <td>
                                    <a href="#" onclick="copy()" id="link" data-toggle="tooltip" data-placement="right" title="Copied Text">
                                        <?= $f->flink; ?>
                                        </button>
                                    </a>

                                </td>
                                <td><?= $f->mnama; ?></td>
                                <td><?= $f->unama; ?></td>
                                <td>
                                    <a href="<?= base_url("admin/files/attendes/edit/$f->id") ?>" class="btn btn-primary">Edit</a>
                                    <form action="<?= base_url('admin/files/attendes/delete') ?>" method="POST">
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

<?= $this->section('scripts') ?>
<script>
    function copy() {
        /* Get the text field */
        var copyText = document.getElementById("link");

        /* Select the text field */
        copyText.textContent;

        console.log(copyText.textContent);

        /* Copy the text inside the text field */
        document.execCommand("copy");
    }
</script>
<?= $this->endSection(); ?>