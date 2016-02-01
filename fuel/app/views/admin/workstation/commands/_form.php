<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Command key', 'command_key', array('class'=>'control-label')); ?>

				<?php echo Form::input('command_key', Input::post('command_key', isset($workstation_command) ? $workstation_command->command_key : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Command key')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Workstation id', 'workstation_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('workstation_id', Input::post('workstation_id', isset($workstation_command) ? $workstation_command->workstation_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Workstation id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Executed', 'executed', array('class'=>'control-label')); ?>

				<?php echo Form::input('executed', Input::post('executed', isset($workstation_command) ? $workstation_command->executed : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Executed')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Valid until', 'valid_until', array('class'=>'control-label')); ?>

				<?php echo Form::input('valid_until', Input::post('valid_until', isset($workstation_command) ? $workstation_command->valid_until : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Valid until')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Group key', 'group_key', array('class'=>'control-label')); ?>

				<?php echo Form::input('group_key', Input::post('group_key', isset($workstation_command) ? $workstation_command->group_key : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Group key')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Sequence number', 'sequence_number', array('class'=>'control-label')); ?>

				<?php echo Form::input('sequence_number', Input::post('sequence_number', isset($workstation_command) ? $workstation_command->sequence_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Sequence number')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Executed at', 'executed_at', array('class'=>'control-label')); ?>

				<?php echo Form::input('executed_at', Input::post('executed_at', isset($workstation_command) ? $workstation_command->executed_at : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Executed at')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>