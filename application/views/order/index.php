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
                <div class="col-lg-12">
                    <?php foreach ($tableall as $key) : ?>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua">
                                    <h1 style="text-align: center;"><?= $key['table_no'] ?></h1>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Capacity</span>
                                    <span class="info-box-number"><?= $key['table_capacity'] ?> Orang</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="<?= site_url('order/detail/') . $key['table_id'] ?>" style="color: blue">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
    </div>
</div>