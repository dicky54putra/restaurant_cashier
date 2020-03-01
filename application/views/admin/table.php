<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <br>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- table list -->
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                    <div class="box box-solid bg-green-gradient">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?= $title ?></h3>
                        </div>
                        <div class="box-footer text-black table-responsive">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Talble No</th>
                                        <th>Table Capacity</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($tableall as $key) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $key['table_no'] ?></td>
                                            <td><?= $key['table_capacity'] ?> Orang</td>
                                            <td>
                                                <a onclick="return confirm('Anda yakin?')" href="<?= site_url('admin/table_delete/') . $key['table_id'] ?>" class="btn btn-sm bg-red btn-flat"><i class="fa fa-trash"></i></a>
                                                <a href="<?= site_url('admin/table_edit/') . $key['table_id'] ?>" class="btn btn-sm btn-flat bg-green"><i class="fa fa-edit"></i></a>
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
                    <div class="box box-solid bg-blue-gradient">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?= $title_box ?></h3>
                        </div>
                        <div class="box-footer text-black">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>Table number</label>
                                    <input type="number" class="form-control" name="table_no" placeholder="Enter chair number" value="<?= $table_no ?>">
                                    <?= form_error('table_no', '<span class="ml-3 text-danger">', '</span>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Table_capacity</label>
                                    <input type="number" class="form-control" name="table_capacity" placeholder="Enter chair number" value="<?= $table_capacity ?>">
                                    <?= form_error('table_capacity', '<span class="ml-3 text-danger">', '</span>') ?>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-flat bg-blue">Save</button>
                                    <?= $back ?>
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