<div class="login-box">
    <div class="login-logo">
        <a href="<?= site_url() ?>"><b>Restaurant</b>CASHIER</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php $this->session->flashdata('message'); ?>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" autocomplete="off" name="user_username">
                <span class="fa fa-user form-control-feedback"></span>
                <?= form_error('user_username', '<span class="ml-3 text-danger">', '</span>') ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" autocomplete="off" name="user_password">
                <span class="fa fa-lock form-control-feedback"></span>
                <?= form_error('user_password', '<span class="ml-3 text-danger">', '</span>') ?>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
            </div>
        </form>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->