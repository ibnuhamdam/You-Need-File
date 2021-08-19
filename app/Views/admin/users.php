<?= $this->extend('admin/templates/index') ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Users</h6>
        </div>
        <?php if (session('notif')) : ?>
            <div class="alert alert-success" id="alert" role="alert"><?= session('notif') ?></div>
        <?php elseif (session('error')) : ?>
            <div class="alert alert-danger" id="alert" role="alert"><?= session('error') ?></div>
        <?php endif; ?>
        <div class="card-body">
            <button class="btn btn-primary px-3 mb-3" data-toggle="modal" data-target="#tambah">
                <i class="fa fa-plus"></i>
                Add User
            </button>

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
                        <form action="<?= base_url('user/add') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="bidang" class="form-label">Full Name</label>
                                    <input type="text" name="full_name" id="bidang" class="form-control" required autocomplete="off" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">Telp Number (WA Number)</label>
                                    <input type="number" name="no_hp" id="no_hp" class="form-control" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="pass_confirm" class="form-label">Confirm Password</label>
                                    <input type="password" name="pass_confirm" id="pass_confirm" class="form-control" required autocomplete="off">
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Avatar</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="user_image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    <small>Untuk Resolusi yang maximal, pastikan foto adalah persegi</small>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Bidang</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Bidang</label>
                                        </div>
                                        <select name="bidang" class="custom-select" id="inputGroupSelect01">
                                            <?php foreach ($bidang as $bid) : ?>
                                                <option value="<?= $bid['id'] ?>"><?= $bid['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
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

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Avatar</th>
                            <th>Bidang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $user->full_name ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= $user->username ?></td>
                                <td class="text-center">
                                    <img src="<?= base_url('/uploads') . '/' . $user->user_image ?>" width="50" height="50" alt="" class="text-center rounded-circle">
                                </td>
                                <td><?= $user->bidang ?></td>
                                <td>
                                    <span class="mb-2">
                                        <button type="button" class="btn btn-primary btn-edit mb-2" data-id=" <?= $user->id ?>" data-nama="<?= $user->full_name ?>" data-username="<?= $user->username ?>" data-userimage="<?= $user->user_image ?>" data-email="<?= $user->email ?>" data-bidang="<?= $user->bidang ?>" data-bidangid="<?= $user->bid ?>">Edit</button>
                                    </span>
                                    <span>
                                        <button type="button" class="btn btn-danger btn-delete mb-2" data-id=" <?= $user->id ?>">Delete</button>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
                <form action="<?= base_url('admin/users/update') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="">

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="full_name" id="name" class="form-control" required autocomplete="off" autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" disabled autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Avatar</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="user_image" class="custom-file-input" id="user_image" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" id="label_image" for="user_image">Choose file</label>
                                </div>
                            </div>
                            <small>Untuk Resolusi yang maximal, pastikan foto adalah persegi</small>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Bidang</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="bidang">Bidang</label>
                                </div>
                                <select name="bidang" class="custom-select" id="bidang">
                                    <option value="" id="opt-bidang"></option>

                                    <?php foreach ($bidang as $bid) : ?>
                                        <option value="<?= $bid['id'] ?>"><?= $bid['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
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
                    <form id="delete-form" action="<?= base_url('admin/users') . '/' . $user->id ?>" method="POST">
                        <?php csrf_field() ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        bsCustomFileInput.init()

        // Modal Edit JS
        $('.btn-edit').click(function() {
            let nama = $(this).data('nama');
            let id = $(this).data('id');
            let username = $(this).data('username');
            let email = $(this).data('email');
            let user_image = $(this).data('userimage');
            let bidang = $(this).data('bidang');
            let bidangid = $(this).data('bidangid');
            console.log(bidang);

            $('#edit').modal('show');
            $('#edit #name').val(nama);
            $('#edit #id').val(id);
            $('#edit #username').val(username);
            $('#edit #email').val(email);
            $('#edit #user_image').val("C:/fakepath/".user_image);
            $('#edit #label_image').html(user_image);
            $('#edit #bidang #opt-bidang').val(bidangid);
            $('#edit #bidang #opt-bidang').html(bidang);
        });

        // Modal Delete
        $('.btn-delete').click(function() {
            let id = $(this).data('id');

            $('#delete').modal('show');
            $('#delete-form').attr('action', '<?= base_url('admin/users') ?>' + '/' + id)
            console.log();
        })
    })
</script>
<?= $this->endSection(); ?>