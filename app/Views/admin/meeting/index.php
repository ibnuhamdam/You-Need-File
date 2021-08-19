<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tables Meeting</h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url('admin/meeting/add') ?>">
                <button class="btn btn-primary mb-3"> <i class="fa fa-plus"></i> Add Meeting</button>
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
                            <th>Nama</th>
                            <th>Jam dan Tanggal</th>
                            <th>Tempat</th>
                            <th>Bidang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($meeting as $m) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $m->nama ?></td>
                                <td><?= $m->tanggal . ' ' . $m->jam . ' WIB' ?></td>
                                <td><?= $m->tempat ?></td>
                                <td>
                                    <h5> <span class="badge badge-pill badge-success px-3 py-1"><?= $m->bidang ?></span></h5>
                                </td>
                                <td>
                                    <span class="mb-2">
                                        <a href="<?= base_url('admin/meeting') . '/' . $m->id ?>">
                                            <button type="button" class="btn btn-success btn-edit mb-2">Detail</button>
                                        </a>
                                    </span>
                                    <span class="mb-2">
                                        <a href="<?= base_url('admin/meeting/edit') . '/' . $m->id ?>">
                                            <button type="button" class="btn btn-primary btn-edit mb-2">Edit</button>
                                        </a>
                                    </span>
                                    <span>
                                        <button type="button" class="btn btn-danger btn-delete mb-2" data-bid="<?= $m->id ?>" data-toggle="modal" data-target="#delete">Delete</button>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Modal Delete -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="DeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeleteLabel">Delete Bidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center text-bold">Are You Sure Want to Delete ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="delete-form" action="<?= base_url('admin/meeting/delete') ?>" method="POST">
                    <input type="hidden" id="mid" name="id" value="">
                    <?php csrf_field() ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    // function editModal() {
    //     let nama = $('#btnedit').data('nama');
    //     console.log(nama);
    //     $('#edit').modal('show');
    //     $('#edit #namabidang').val(nama);
    // }
    $('.btn-edit').click(function() {
        let nama = $(this).data('nama');
        let id = $(this).data('idb');
        console.log(id);
        console.log(nama);
        $('#edit').modal('show');
        $('#edit #namabidang').val(nama);
        $('#edit #idbidang').val(id);
    })
    $('.btn-delete').click(function() {
        let id = $(this).data('bid');
        console.log(id);
        $('#delete form #mid').val(id);
    })
</script>
<?= $this->endSection(); ?>