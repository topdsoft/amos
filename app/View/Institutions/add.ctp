<div class="institutions form">
<?php echo $this->Form->create('Institution');?>
	<fieldset>
		<legend><?php echo __('Add Institution'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu'); ?>
