<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

                        <?php echo Form::input('name', Input::post('name', isset($user_type) ? $user_type->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
            
                <div class="form-group">
                    <?php echo Form::label('Group', 'group', array('class'=>'control-label')); ?>
                    <select name="group" class="form-control" required>
                        <option value="" selected>- - SELECT - -</option>
                        <?php foreach ($groups as $key => $name): ?>
                        <option value="<?php echo $key; ?>" <?php echo Input::post('group', isset($user_type) ? $user_type->group : '') == $key ? ' selected ' : ''; ?>><?php echo $name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
                        <?php echo \Fuel\Core\Html::anchor('admin/user/types', '&laquo; User Types', array('class' => 'btn btn-default')); ?>
                        <?php echo isset($user_type) ? \Fuel\Core\Html::anchor('admin/user/types/view/'.$user_type->id, 'View', array('class' => 'btn btn-warning')) : ''; ?>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-success')); ?>
                        
                </div>
	</fieldset>
<?php echo Form::close(); ?>

<br>