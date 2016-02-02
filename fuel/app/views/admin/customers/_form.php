<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::input('description', Input::post('description', isset($customer) ? $customer->description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Contact person', 'contact_person', array('class'=>'control-label')); ?>

				<?php echo Form::input('contact_person', Input::post('contact_person', isset($customer) ? $customer->contact_person : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Contact person')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Phone', 'phone', array('class'=>'control-label')); ?>

				<?php echo Form::input('phone', Input::post('phone', isset($customer) ? $customer->phone : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Phone')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($customer) ? $customer->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php 
				echo Html::anchor('admin/customers', '&laquo; Customers', array('class' => 'btn btn-default'));
			?> 
			<?php
				echo isset($customer) ? Html::anchor('admin/customers/view/'.$customer->id, 'View', array('class' => 'btn btn-warning')) : '';
			?> 
			<?php
				echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); 
			?>		
		</div>
	</fieldset>
<?php echo Form::close(); ?>