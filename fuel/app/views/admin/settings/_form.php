<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Setting key', 'setting_key', array('class'=>'control-label')); ?>

				<?php echo Form::input('setting_key', Input::post('setting_key', isset($setting) ? $setting->setting_key : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Setting key')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Setting title', 'setting_title', array('class'=>'control-label')); ?>

				<?php echo Form::input('setting_title', Input::post('setting_title', isset($setting) ? $setting->setting_title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Setting title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Setting value', 'setting_value', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('setting_value', Input::post('setting_value', isset($setting) ? $setting->setting_value : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Setting value')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Setting data type', 'setting_data_type', array('class'=>'control-label')); ?>

				<?php echo Form::input('setting_data_type', Input::post('setting_data_type', isset($setting) ? $setting->setting_data_type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Setting data type')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>