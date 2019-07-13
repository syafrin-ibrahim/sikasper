<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Data User</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php
            //  echo form_open_multipart('admin/product/post');
            ?>
            <form role="form" method="post" action="<?= base_url('admin/user/edit') ?>">
                <input type="hidden" class="form-control" name="id" value="<?= $user['user_id'] ?>">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" class="form-control" name="nama" value="<?= $user['nama'] ?>" required>
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="form-control">
                                <?php
                                foreach ($role as $k) {
                                    echo "<option value='$k->role_id' ";
                                    echo $k->role_id == $user['role_id'] ? 'selected' : '';
                                    echo ">$k->role</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Status</label>

                            <div class="form-check">
                                <input name="status" class="form-check-input" type="radio" value="1" <?php if ($user['is_active'] == 1) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                <label class="form-check-label">Aktif</label>
                            </div>
                            <div class="form-check">
                                <input name="status" class="form-check-input" type="radio" value="2" <?php if ($user['is_active'] == 2) {
                                                                                                            echo "checked";
                                                                                                        } ?>> <label class="form-check-label">Non Aktif</label>
                            </div>
                        </div>


                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <?php
                        echo anchor('admin/user', 'Kembali', array('class' => 'btn btn-primary'));
                        ?>
                    </div>
            </form>
        </div>
</div><!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->