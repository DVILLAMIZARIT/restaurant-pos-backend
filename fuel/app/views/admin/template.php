<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
            body { margin: 50px; }
	</style>
	<?php echo Asset::js(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js',
	)); ?>
	<script>
		$(function(){ $('.topbar').dropdown(); });
	</script>
</head>
<body>

    <?php if ($current_user): ?>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                </button>
                <?php echo Fuel\Core\Html::anchor('admin', 'Back Office', array('class' => 'navbar-brand')); ?>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">                                                        
                    <?php $segment = Fuel\Core\Uri::segment(2, ''); ?>

                    <li class="<?php echo $segment == '' ? 'active' : ''; ?>">
                        <?php echo Fuel\Core\Html::anchor('admin', 'Dashboard'); ?>
                    </li>
                    
                    <li class="dropdown" class="<?php echo in_array($segment, array('report', 'report')) ? 'active' : ''; ?>">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-cutlery"></span> My Shop <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo Fuel\Core\Html::anchor('admin/sales', 'Sales'); ?></li>
                            <li><?php echo Fuel\Core\Html::anchor('admin/orders', 'Orders'); ?></li>
                            <li><?php echo Fuel\Core\Html::anchor('admin/shifts', 'Shifts'); ?></li>
                            <li><?php echo Fuel\Core\Html::anchor('admin/currencies', 'Currencies'); ?></li>
                        </ul>
                    </li>

                    <li class="<?php echo $segment == 'customers' ? 'active' : ''; ?>">
                        <?php echo Fuel\Core\Html::anchor('admin/customers', 'Customers'); ?>
                    </li>

                    <li class="<?php echo $segment == 'suppliers' ? 'active' : ''; ?>">
                        <?php echo Fuel\Core\Html::anchor('admin/suppliers', 'Suppliers'); ?>
                    </li>
                    
                    <li class="dropdown" class="<?php echo in_array($segment, array('inventory', 'inventories')) ? 'active' : ''; ?>">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-barcode"></span> Stock <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo Fuel\Core\Html::anchor('admin/products', 'Products'); ?></li>
                            <li><?php echo Fuel\Core\Html::anchor('admin/inventory', 'Inventory'); ?></li>
                            <li><?php echo Fuel\Core\Html::anchor('admin/locations', 'Locations'); ?></li>
                            <li><?php echo Fuel\Core\Html::anchor('admin/inventory/units', 'Units of Measurement'); ?></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown" class="<?php echo in_array($segment, array('users', 'user')) ? 'active' : ''; ?>">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-user"></span> Users <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo Fuel\Core\Html::anchor('admin/users', 'Users'); ?></li>
                            <li><?php echo Fuel\Core\Html::anchor('admin/user/types', 'User Types'); ?></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-cog"></span> Settings <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo Fuel\Core\Html::anchor('admin/currencies', 'Currencies'); ?></li>
                            <li><?php echo Fuel\Core\Html::anchor('admin/inventory/units', 'Units of Measurement'); ?></li>
                            <li><?php echo Fuel\Core\Html::anchor('admin/settings', 'Settings'); ?></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown" class="<?php echo in_array($segment, array('reports', 'report')) ? 'active' : ''; ?>">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="glyphicon glyphicon-file"></span> Reports <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo Fuel\Core\Html::anchor('admin/reports', 'Reports'); ?></li>
                            <li><?php echo Fuel\Core\Html::anchor('admin/logs', 'Logs'); ?></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $current_user->username ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                                <li><?php echo Html::anchor('admin/logout', 'Logout') ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo $title; ?></h1>
                <hr>
                <?php if (Session::get_flash('success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>
                            <?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
                            </p>
                        </div>
                <?php endif; ?>
                <?php if (Session::get_flash('error')): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>
                            <?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
                            </p>
                        </div>
                <?php endif; ?>
            </div>
            <div class="col-md-12">
                <?php echo $content; ?>
            </div>
        </div>
        <hr/>
        <footer>
            <p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
            <p>
                <a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
                <small>Version: <?php echo e(Fuel::VERSION); ?></small>
            </p>
        </footer>
    </div>
</body>
</html>
