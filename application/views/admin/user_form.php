<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1>
                <?= $title ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-6 col-md-6 ">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add User</h3>
                        </div>
                        <div class="box-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= $action ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="user_name" placeholder="Enter name" autocomplete="off">
                                            <?= form_error('user_name', '<span class="ml-3 text-danger">', '</span>') ?>
                                        </div>
                                        <div class=" form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="user_username" placeholder="Enter username" autocomplete="off">
                                            <?= form_error('user_username', '<span class="ml-3 text-danger">', '</span>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" name="level_id">
                                                <?php foreach ($levelall as $key) : ?>
                                                    <option value="<?= $key['level_id'] ?>"><?= $key['level_name'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class=" form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="user_password" placeholder="Enter password" autocomplete="off">
                                            <?= form_error('user_password', '<span class="ml-3 text-danger">', '</span>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Repeat Password</label>
                                            <input type="password" class="form-control" name="user_password2" placeholder="Enter repeat password" autocomplete="off">
                                            <?= form_error('user_password2', '<span class="ml-3 text-danger">', '</span>') ?>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary"><?= $button ?></button>
                                        <a href="<?= site_url('admin/user') ?>" class="btn btn-success">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>