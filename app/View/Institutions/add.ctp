<div class="institutions form">
<?php echo $this->Form->create('Institution');?>
	<fieldset>
		<legend><?php echo __('Add Institution'); ?></legend>
	<?php
		echo $this->Form->input('name',array('id'=>'ln'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu'); ?>
<script type='text/javascript'>document.getElementById('ln').focus();</script>
