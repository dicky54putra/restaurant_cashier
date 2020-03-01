<div class="content-wrapper">
    <div class="container">
        <section class="content-header">
            <h1>

            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-6 col-md-6 ">
                    <div class="box box-solid bg-green-gradient">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?= $title ?></h3>
                        </div>
                        <div class="box-footer text-black">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= $action ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="menu_name" placeholder="Enter name" autocomplete="off" value="<?= $menu_name ?>">
                                            <?= form_error('menu_name', '<span class="ml-3 text-danger">', '</span>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="menu_description" autocomplete="off" rows="5"><?= $menu_description ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" class="form-control" name="menu_price" placeholder="Enter price" autocomplete="off" value="<?= $menu_price ?>">
                                            <?= form_error('menu_price', '<span class="ml-3 text-danger">', '</span>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="radio">
                                                <label><input type="radio" name="menu_status" value="1" <?= $menu_status == 1 ? "checked" : "" ?>> Ready </label>&nbsp;&nbsp;&nbsp;
                                                <label><input type="radio" name="menu_status" value="0" <?= $menu_status == 0 ? "checked" : "" ?>> Not Ready</label>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-flat bg-blue"><?= $button ?></button>
                                        <a href="<?= site_url('admin') ?>" class="btn btn-flat bg-green">Back</a>
                                        <?= $delete ?>
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