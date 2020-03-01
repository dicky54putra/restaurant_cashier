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
                    <a href="<?= site_url('admin/user_add') ?>" class="btn btn-sm btn-flat bg-blue"><i class="fa fa-plus"> Add User</i></a>
                    <a href="<?= site_url('admin/user') ?>" class="btn btn-sm btn-flat bg-green"><i class="fa fa-refresh"></i></a>
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
                <!-- table list -->
                <?php foreach ($userall as $key) : ?>
                    <div style="margin-top: 8px" class="col-lg-3 col-md-3 col-xs-12 col-sm-12">
                        <?php if ($key['user_status'] == 1) { ?>
                            <div class="small-box bg-aqua">
                            <?php } else { ?>
                                <div class="small-box bg-red">
                                <?php } ?>
                                <div class="inner">
                                    <h3 class="info-box-text" style="font-size: 28px;"><?= $key['user_name'] ?></h3>
                                    <p class="info-box-text" style="font-size: 20px;"><?= $key['level_name'] ?></p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="<?= site_url('admin/user_detail/') . $key['user_id'] ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div><!-- /.form -->
        </section><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->