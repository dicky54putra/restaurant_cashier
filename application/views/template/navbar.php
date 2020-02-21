<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="" class="navbar-brand"><b>Resto</b>CASH</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-buysellads"></i> User</span> Admin page <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-book"></i> Food menu</span></a></li>
                            <li><a href="<?= base_url('admin/user') ?>"><i class="fa fa-user"></i> User</span></a></li>
                            <li><a href="<?= base_url('admin/table') ?>"><i class="fa fa-th-large"></i> Table</span></a></li>
                        </ul>
                    </li>
                    <li><a href=""><span><i class="fa fa-money"></i> Transaction</span></a></li>
                    <li><a href="#"><span><i class="fa fa-print"></i> Report</span></a></li>
                    <li><a href="#"><span><i class="fa fa-shopping-cart"></i> Service</span></a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li><a href="#"><span><i class="fa fa-sign-out"></i> Logout</span></a></li>
                </ul>
            </div><!-- /.navbar-custom-menu -->
        </div><!-- /.container-fluid -->
    </nav>
</header>