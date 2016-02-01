<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($workstation) ? $workstation->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Pc name', 'pc_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('pc_name', Input::post('pc_name', isset($workstation) ? $workstation->pc_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Pc name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Processor key', 'processor_key', array('class'=>'control-label')); ?>

				<?php echo Form::input('processor_key', Input::post('processor_key', isset($workstation) ? $workstation->processor_key : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Processor key')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Image layout', 'image_layout', array('class'=>'control-label')); ?>

				<?php echo Form::input('image_layout', Input::post('image_layout', isset($workstation) ? $workstation->image_layout : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Image layout')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Location id', 'location_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('location_id', Input::post('location_id', isset($workstation) ? $workstation->location_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Location id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>