<?php echo Form::open(array("class"=>"form-horizontal")); ?>
    <fieldset>
        <div class="form-group">
            <?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

            <?php echo Form::input('name', Input::post('name', isset($currency) ? $currency->name : ''), array('class' => 'form-control', 'placeholder'=>'Name')); ?>
        </div>
        <div class="form-group">
            <?php echo Form::label('Symbol', 'symbol', array('class'=>'control-label')); ?>

            <?php echo Form::input('symbol', Input::post('symbol', isset($currency) ? $currency->symbol : ''), array('class' => 'form-control', 'placeholder'=>'Symbol')); ?>
        </div>
        <div class="form-group">
            <?php echo Form::label('Country', 'country', array('class'=>'control-label')); ?>

            <select name="country" class="form-control" required="required">
                <option value="" selected>- SELECT -</option>
                <?php foreach ($countries as $country): ?>
                <option value="<?php echo $country->name; ?>" <?php echo Input::post('country', isset($currency) ? $currency->country : '') == $country->name ? ' selected ' : ''; ?>><?php echo ucfirst($country->name); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
                <?php echo Form::label('Is Default Currency?', 'is_default', array('class'=>'control-label')); ?>
                
                <select name="is_default" class="form-control" required="required">
                    <?php foreach ($yes_no as $key => $value): ?>
                    <option value="<?php echo $key; ?>" <?php echo Input::post('is_default', isset($currency) ? $currency->is_default : '') == $key ? ' selected ' : ''; ?>><?php echo ucfirst($value); ?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        <div class="form-group">
                <?php echo Form::label('Exchange rate', 'exchange_rate', array('class'=>'control-label')); ?>

                <?php echo Form::input('exchange_rate', Input::post('exchange_rate', isset($currency) ? $currency->exchange_rate : ''), array('class' => 'form-control', 'placeholder'=>'Exchange rate')); ?>

        </div>
        <div class="form-group">
            <label class='control-label'>&nbsp;</label>
            
            <?php echo Fuel\Core\Html::anchor('admin/currencies', '&laquo; Currencies', array('class' => 'btn btn-default')); ?>
            
            <?php if (isset($currency)): ?>
            <?php echo Fuel\Core\Html::anchor('admin/currencies/view/'.$currency->id, 'View', array('class' => 'btn btn-warning')); ?>
            <?php endif; ?>
            
            <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		
        </div>
    </fieldset>
<?php echo Form::close(); ?>