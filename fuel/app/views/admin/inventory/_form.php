<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::input('description', Input::post('description', isset($inventory) ? $inventory->description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Barcode', 'barcode', array('class'=>'control-label')); ?>

				<?php echo Form::input('barcode', Input::post('barcode', isset($inventory) ? $inventory->barcode : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Barcode')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Short code', 'short_code', array('class'=>'control-label')); ?>

				<?php echo Form::input('short_code', Input::post('short_code', isset($inventory) ? $inventory->short_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Short code')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Units', 'inventory_units_id', array('class'=>'control-label')); ?>

				<?php // echo Form::input('inventory_units_id', Input::post('inventory_units_id', isset($inventory) ? $inventory->inventory_units_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Inventory units id')); ?>
                        <?php echo \Fuel\Core\Form::select('inventory_units_id', Input::post('inventory_units_id', isset($inventory) ? $inventory->inventory_units_id : 0), \Fuel\Core\Arr::assoc_to_keyval($inventory_units, 'id', 'name'), array('class' => 'form-control', 'required')); ?>
		</div>
		<div class="form-group">
			<?php echo Form::label('Warning level', 'warning_level', array('class'=>'control-label')); ?>

				<?php echo Form::input('warning_level', Input::post('warning_level', isset($inventory) ? $inventory->warning_level : 0), array('class' => 'col-md-4 form-control', 'placeholder'=>'Warning level')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
                        <?php echo Fuel\Core\Html::anchor('admin/inventory', '&laquo; Inventories', array('class' => 'btn btn-default')); ?>
                        <?php echo isset($inventory) ? Fuel\Core\Html::anchor('admin/inventory/view/'.$inventory->id, 'View', array('class' => 'btn btn-warning')) : ''; ?>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
                </div>
	</fieldset>
<?php echo Form::close(); ?>