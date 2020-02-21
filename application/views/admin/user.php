<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $title ?>
                <a href="" class="btn btn-xs btn-primary"><i class="fa fa-plus"> Add User</i></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- table list -->
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">User list</h3>
                        </div>
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>status</th>
                                        <th style="width: 5%">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($userall as $key) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $key['user_name'] ?></td>
                                            <td><?= $key['user_username'] ?></td>
                                            <td><?= $key['level_name'] ?></td>
                                            <td>
                                                <?php if ($key['user_status'] == 1) { ?>
                                                    <a href="<?= site_url('admin/user_status/') . $key['user_id'] ?>" class="btn btn-xs btn-primary" style="width: 80%">Active</a>
                                                <?php } else { ?>
                                                    <a href="<?= site_url('admin/user_status/') . $key['user_id'] ?>" class="btn btn-xs btn-danger" style="width: 80%">Not Active</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?= site_url('admin/user_delete/') . $key['user_id'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.table list -->
                <!-- form -->
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add User</h3>
                        </div>
                        <div class="box-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= $action ?>" method="post">
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
                                <div class="form-group">
                                    <label>Level</label>
                                    <select class="form-control" name="level_id">
                                        <?php foreach ($levelall as $key) : ?>
                                            <option value="<?= $key['level_id'] ?>"><?= $key['level_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary"><?= $button ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div><!-- /.form -->
    </section><!-- /.content -->
</div><!-- /.container -->
</div><!-- /.content-wrapper -->