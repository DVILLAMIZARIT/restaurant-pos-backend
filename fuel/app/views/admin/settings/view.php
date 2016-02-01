<h2>Viewing #<?php echo $setting->id; ?></h2>

<p>
	<strong>Setting key:</strong>
	<?php echo $setting->setting_key; ?></p>
<p>
	<strong>Setting title:</strong>
	<?php echo $setting->setting_title; ?></p>
<p>
	<strong>Setting value:</strong>
	<?php echo $setting->setting_value; ?></p>
<p>
	<strong>Setting data type:</strong>
	<?php echo $setting->setting_data_type; ?></p>

<?php echo Html::anchor('admin/settings/edit/'.$setting->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/settings', 'Back'); ?>