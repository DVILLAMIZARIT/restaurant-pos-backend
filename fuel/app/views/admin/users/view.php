<div class="col-md-8">
    <h3><?php echo $user->description; ?></h3>

    <p>
            <strong>Name:</strong>
            <span class="pull-right"><?php echo $user->description; ?></span>
    </p>
    <p>
            <strong>Username:</strong>
            <span class="pull-right"><?php echo $user->username; ?></span>
    </p>
    <p>
            <strong>Email:</strong>
            <span class="pull-right"><?php echo $user->email; ?></span>
    </p>
    <p>
            <strong>Last login:</strong>
            <span class="pull-right"><?php echo Fuel\Core\Date::forge($user->last_login); ?></span>
    </p>
    <p>
            <strong>System Login Rights:</strong>
            <span class="pull-right"><?php echo $user->group; ?></span>
    </p>
    <p>
            <strong>Id Number:</strong>
            <span class="pull-right"><?php echo $user->id_number; ?></span>
    </p>
    <p>
            <strong>Employee Number:</strong>
            <span class="pull-right"><?php echo $user->employee_number; ?></span>
    </p>
    <p>
            <strong>Date of Birth:</strong>
            <span class="pull-right"><?php echo $user->date_of_birth; ?></span>
    </p>
    <p>
            <strong>Employee Type:</strong>
            <span class="pull-right"><?php echo $user->get_user_type()->name; ?></span>
    </p>
    <p>
            <strong>Access Options:</strong>
            <span class="pull-right"><?php echo $user->access_options; ?></span>
    </p>
    <p>
            <strong>Phone:</strong>
            <span class="pull-right"><?php echo $user->phone; ?></span>
    </p>

    <p align="center">
        <?php echo Html::anchor('admin/users', '&laquo; Users', array('class' => 'btn btn-default')); ?>
        <?php echo Html::anchor('admin/users/edit/'.$user->id, 'Edit', array('class' => 'btn btn-primary')); ?> 
    </p>
</div>
<div class="col-md-4"></div>