<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tables Bidang</h6>
        </div>
        <div class="card-body">
            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah"> <i class="fa fa-plus"></i> Add Bidang</button>
            <div id="wrap-alert">
                <?php if (session('insert')) : ?>
                    <div class="alert alert-success" id="alert" role="alert"><?= session('insert') ?></div>
                <?php elseif (session('delete')) : ?>
                    <div class="alert alert-success" id="alert" role="alert"><?= session('delete') ?></div>
                <?php elseif (session('update')) : ?>
                    <div class="alert alert-success" id="alert" role="alert"><?= session('update') ?></div>
                <?php endif; ?>

            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($bidangs as $bidang) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $bidang['nama'] ?></td>
                                <td>
                                    <span class="mb-2">
                                        <button type="button" data-idb="<?= $bidang['id'] ?>" data-nama="<?= $bidang['nama'] ?>" class="btn btn-primary btn-edit mb-2">Edit</button>
                                    </span>
                                    <span>
                                        <button type="button" class="btn btn-danger mb-2 btn-delete" data-toggle="modal" data-target="#delete" data-bid="<?= $bidang['id'] ?>">Delete</button>
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

<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLabel">Tambah Bidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/bidang') ?>" method="POST">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="bidang" class="form-label">Nama Bidang</label>
                        <input type="text" name="nama" id="bidang" class="form-control" aria-describedby="passwordHelpBlock" required autocomplete="off" autofocus>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Edit Bidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/bidang/update') ?>" method="POST">
                <div class="modal-body">

                    <div class="mb-3">
                        <input type="hidden" id="idbidang" name="id" value="<?= $bidang['id'] ?>">
                        <label for="bidang" class="form-label">Nama Bidang</label>
                        <input type="text" id="namabidang" name="nama" class="form-control" aria-describedby="passwordHelpBlock" required autocomplete="off" autofocus>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
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
                <form action="<?= base_url('admin/bidang') . '/' . $bidang['id'] ?>" method="POST">
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
        $('#delete form').attr('action', '<?= base_url('admin/bidang') ?>/' + id);
    })
</script>
<?= $this->endSection(); ?>