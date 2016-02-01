<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Username', 'username', array('class'=>'control-label')); ?>

				<?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Username')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>

				<?php echo Form::input('password', Input::post('password', isset($user) ? $user->password : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Password')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Last login', 'last_login', array('class'=>'control-label')); ?>

				<?php echo Form::input('last_login', Input::post('last_login', isset($user) ? $user->last_login : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Last login')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Login hash', 'login_hash', array('class'=>'control-label')); ?>

				<?php echo Form::input('login_hash', Input::post('login_hash', isset($user) ? $user->login_hash : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Login hash')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Group', 'group', array('class'=>'control-label')); ?>

				<?php echo Form::input('group', Input::post('group', isset($user) ? $user->group : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Group')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Profile fields', 'profile_fields', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('profile_fields', Input::post('profile_fields', isset($user) ? $user->profile_fields : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Profile fields')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Guid', 'guid', array('class'=>'control-label')); ?>

				<?php echo Form::input('guid', Input::post('guid', isset($user) ? $user->guid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Guid')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Shop guid', 'shop_guid', array('class'=>'control-label')); ?>

				<?php echo Form::input('shop_guid', Input::post('shop_guid', isset($user) ? $user->shop_guid : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Shop guid')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::input('description', Input::post('description', isset($user) ? $user->description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>

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
			<?php echo Form::label('User type id', 'user_type_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_type_id', Input::post('user_type_id', isset($user) ? $user->user_type_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User type id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Access options', 'access_options', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('access_options', Input::post('access_options', isset($user) ? $user->access_options : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Access options')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Phone', 'phone', array('class'=>'control-label')); ?>

				<?php echo Form::input('phone', Input::post('phone', isset($user) ? $user->phone : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Phone')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>