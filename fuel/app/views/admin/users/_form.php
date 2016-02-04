<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Full Name', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::input('description', Input::post('description', isset($user) ? $user->description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('System Login Rights', 'group', array('class'=>'control-label')); ?>

                        <?php echo \Fuel\Core\Form::select('group',  Input::post('group', isset($user) ? $user->group : 0), $groups, array('class' => 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>

				<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Username')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', '', array('class' => 'col-md-4 form-control', 'placeholder'=>'Leave blank to keep existing password')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Id number', 'id_number', array('class'=>'control-label')); ?>

				<?php echo Form::input('id_number', Input::post('id_number', isset($user) ? $user->id_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id number')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Employee number', 'employee_number', array('class'=>'control-label')); ?>

				<?php echo Form::input('employee_number', Input::post('employee_number', isset($user) ? $user->employee_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Employee number')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Date of birth', 'date_of_birth', array('class'=>'control-label')); ?>

				<?php echo Form::input('date_of_birth', Input::post('date_of_birth', isset($user) ? $user->date_of_birth : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Date of birth')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Employee Type', 'user_type_id', array('class'=>'control-label')); ?>

                    <select name="user_type_id" class="form-control" required="">
                        <option value="">- - SELECT - -</option>
                        <?php foreach ($user_types as $type): ?>
                        <option value="<?php echo $type->id; ?>" <?php echo Input::post('user_type_id', isset($user) ? $user->user_type_id : '') == $type->id ? ' selected ' : ''; ?>><?php echo $type->name; ?></option>
                        <?php endforeach; ?>
                    </select>

		</div>
            <!--provide access options as check boxes--> 
		<div class="form-group">
			<?php echo Form::label('Phone', 'phone', array('class'=>'control-label')); ?>

				<?php echo Form::input('phone', Input::post('phone', isset($user) ? $user->phone : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Phone')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
                        <?php echo Fuel\Core\Html::anchor('admin/users', '&laquo; Users', array('class' => 'btn btn-default')); ?>
                        <?php echo isset($user) ? Fuel\Core\Html::anchor('admin/users/view/'.$user->id, 'View', array('class' => 'btn btn-warning')) : ''; ?>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
                </div>
	</fieldset>
<?php echo Form::close(); ?>