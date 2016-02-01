<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::input('description', Input::post('description', isset($product) ? $product->description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Barcode', 'barcode', array('class'=>'control-label')); ?>

				<?php echo Form::input('barcode', Input::post('barcode', isset($product) ? $product->barcode : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Barcode')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Short code', 'short_code', array('class'=>'control-label')); ?>

				<?php echo Form::input('short_code', Input::post('short_code', isset($product) ? $product->short_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Short code')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Cost price', 'cost_price', array('class'=>'control-label')); ?>

				<?php echo Form::input('cost_price', Input::post('cost_price', isset($product) ? $product->cost_price : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Cost price')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Retail price', 'retail_price', array('class'=>'control-label')); ?>

				<?php echo Form::input('retail_price', Input::post('retail_price', isset($product) ? $product->retail_price : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Retail price')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Is taxable', 'is_taxable', array('class'=>'control-label')); ?>

				<?php echo Form::input('is_taxable', Input::post('is_taxable', isset($product) ? $product->is_taxable : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Is taxable')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Discontinued', 'discontinued', array('class'=>'control-label')); ?>

				<?php echo Form::input('discontinued', Input::post('discontinued', isset($product) ? $product->discontinued : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Discontinued')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Picture', 'picture', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('picture', Input::post('picture', isset($product) ? $product->picture : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Picture')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Product details', 'product_details', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('product_details', Input::post('product_details', isset($product) ? $product->product_details : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Product details')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>