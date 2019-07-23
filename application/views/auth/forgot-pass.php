<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>SIKASPER</b>01</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <?= $this->session->flashdata('message'); ?>
                <p class="login-box-msg">Apa Anda Lupa Password</p>

                <form action="<?= base_url('auth/forgotPassword') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>" required>
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <?= form_error('email'); ?>

                    <div class="row">
                        <div class="col-8">
                            <!--<div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>-->
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <p class="mb-0">
                    <a href="<?php echo base_url('auth'); ?>" class="text-center">Kembali Ke Halaman Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->