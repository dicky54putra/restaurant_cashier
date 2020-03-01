<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $title ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6 inline">
                    <a href="<?= site_url('admin/menu_add') ?>" class="btn btn-sm btn-flat bg-blue"><i class="fa fa-plus"> Add Menu</i></a>
                    <a href="<?= site_url('admin') ?>" class="btn btn-sm btn-flat bg-green"><i class="fa fa-refresh"></i></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    <form action="" method="post">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" name="keyword" placeholder="Search..." autocomplete="off">
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-flat" type="submit">Go!</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div style="margin-top: 8px" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <?php foreach ($menuall as $key) : ?>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <?php if ($key['menu_status'] == 1) { ?>
                            <div class="info-box bg-yellow">
                            <?php } else { ?>
                                <div class="info-box bg-red">
                                <?php } ?>
                                <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?= $key['menu_name'] ?></span>
                                    <span class="info-box-number"><?= $key['menu_price'] ?></span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="<?= site_url('admin/menu_detail/') . $key['menu_id'] ?>" style="color: aliceblue">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </span>
                                </div><!-- /.info-box-content -->
                                </div><!-- /.info-box -->
                            </div>
                        <?php endforeach ?>

                    </div>
            </div><!-- /.form -->
        </section><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->