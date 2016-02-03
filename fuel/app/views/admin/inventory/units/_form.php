<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($inventory_unit) ? $inventory_unit->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
                        <?php echo \Fuel\Core\Html::anchor('admin/inventory/units', '&laquo; Inventory Units', array('class' => 'btn btn-default')); ?>
                        <?php echo isset($inventory_unit) ? \Fuel\Core\Html::anchor('admin/inventory/units/view/'.$inventory_unit->id, 'View', array('class' => 'btn btn-warning')) : ''; ?>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
                </div>
	</fieldset>
<?php echo Form::close(); ?>