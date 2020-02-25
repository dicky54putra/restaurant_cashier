<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $title ?>
                <a href="<?= site_url('admin/user_add') ?>" class="btn btn-sm btn-flat bg-blue"><i class="fa fa-plus"> Add User</i></a>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <!-- table list -->
                <?php foreach ($userall as $key) : ?>
                    <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
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