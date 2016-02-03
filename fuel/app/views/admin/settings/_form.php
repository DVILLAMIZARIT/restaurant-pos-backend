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

                    <?php echo Form::textarea('setting_value', Input::post('setting_value', isset($setting) ? $setting->setting_value : ''), array('class' => 'col-md-8 form-control', 'rows' => 2, 'placeholder'=>'Setting value')); ?>
		</div>
            
            <div class="form-group">
                <?php echo Form::label('Setting data type', 'setting_data_type_id', array('class'=>'control-label')); ?>
                <select class="form-control" name="setting_data_type_id" required="">
                    <option value="" selected>- - SELECT - -</option>
                    <?php foreach ($data_types as $type): ?>
                    <option value="<?php echo $type->id; ?>" <?php echo strcasecmp(Input::post('setting_data_type_id', isset($setting) ? $setting->setting_data_type_id : 0), $type->id) == 0 ? ' selected ' : ''; ?>><?php echo $type->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
                        <?php echo Fuel\Core\Html::anchor('admin/settings', '&laquo; Settings', array('class' => 'btn btn-default')); ?>
                        <?php echo isset($setting) ? Fuel\Core\Html::anchor('admin/settings/view/'.$setting->id, 'View', array('class' => 'btn btn-warning')) : ''; ?>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
                </div>
	</fieldset>
<?php echo Form::close(); ?>