<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Meeting Reminder</h6>
        </div>
        <div class="card-body">
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
                            <th>Anggota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($meeting as $m) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $m['nama'] ?></td>
                                <td><?= $m['jam'] . ' WIB ' . $m['tanggal']  ?></td>
                                <td class="p-3 ellipsed">
                                    <?php foreach ($m['users'] as $u) : ?>
                                        <?php $nomor = str_replace('0', '62', $u['no_hp']); ?>
                                        <?php $nama = str_replace(' ', '%20', $m['nama']);
                                        $tempat = str_replace(' ', '%20', $m['tempat'])  ?>
                                        <div class="mb-3"> <i class="fas fa-user mr-3 text-primary"></i> <?= $u['nama'] ?>
                                            <span class="ml-2">
                                                <a href="<?= ($u['no_hp'] != null) ? "https://wa.me/$nomor?text=Halo%2C%20selamat%20pagi%20bapak%2Fibu%2C%20ingin%20mengingatkan%20bahwa%20pada%20jam%20$m[jam]%20nanti%20akan%20diadakan%20rapat%20mengenai%20$nama%20diruang%20rapat%20$tempat%2C%20%0aTerimakasih" : '#' ?>" disabled>
                                                    <span class="badge <?= ($u['no_hp'] != null) ? 'badge-primary' : 'badge-secondary' ?> px-3 py-2">Ingatkan</span>
                                                </a>
                                            </span>
                                        </div>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php $nama = str_replace(' ', '%20', $m['nama']);
                                    $tempat = str_replace(' ', '%20', $m['tempat'])  ?>
                                    <span class="mb-2">
                                        <a href="https://wa.me/?text=Halo%2C%20selamat%20pagi%20bapak%2Fibu%2C%20ingin%20mengingatkan%20bahwa%20pada%20jam%20<?= $m['jam'] ?>%20nanti%20akan%20diadakan%20rapat%20mengenai%20<?= $nama ?>%20diruang%20rapat%20<?= $tempat ?>%2C%20%0aTerimakasih">
                                            <button type="button" class="btn btn-success btn-edit mb-2">Ingatkan Semua</button>
                                        </a>
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