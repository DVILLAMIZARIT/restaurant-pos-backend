<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($product_subcategory) ? $product_subcategory->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Product id', 'product_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('product_id', Input::post('product_id', isset($product_subcategory) ? $product_subcategory->product_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Product id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Orientation', 'orientation', array('class'=>'control-label')); ?>

				<?php echo Form::input('orientation', Input::post('orientation', isset($product_subcategory) ? $product_subcategory->orientation : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Orientation')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Picture', 'picture', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('picture', Input::post('picture', isset($product_subcategory) ? $product_subcategory->picture : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Picture')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>