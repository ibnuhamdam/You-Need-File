<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Meeting</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td><?= $meeting->nama ?></td>
                        </tr>
                        <tr>
                            <th>Pengundang</th>
                            <td><?= $meeting->pengundang ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><?= $meeting->tanggal ?></td>
                        </tr>
                        <tr>
                            <th>Tempat</th>
                            <td><?= $meeting->tempat ?></td>
                        </tr>
                        <tr>
                            <th>Bidang</th>
                            <td><?= $meeting->bidang ?></td>
                        </tr>
                        <tr>
                            <th>Jam</th>
                            <td><?= $meeting->jam ?></td>
                        </tr>
                        <tr>
                            <th>Meeting ID</th>
                            <th><?= $meeting->meet_id ?></th>
                        </tr>
                        <tr>
                            <th>Meeting Passcode</th>
                            <th><?= $meeting->meet_pass ?></th>
                        </tr>
                        <tr>
                            <th>Link</th>
                            <td><a href="<?= $meeting->link ?>" target="__BLANK"><?= $meeting->link ?></a></td>
                        </tr>
                        <tr>
                            <th>Undangan</th>
                            <td>
                                <a href="<?= base_url('uploads/undangan') . '/' . $meeting->undangan ?>" target="__BLANK"><?= $meeting->undangan ?></a>
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?= $meeting->status ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href="<?= base_url('admin/meeting') ?>" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>
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