<div class="oneonones form">
<?php echo $this->Form->create('Oneonone');?>
	<fieldset>
		<legend><?php echo __('Add Oneonone'); ?></legend>
	<?php
		echo $this->Form->input('attendee1_id');
		echo $this->Form->input('attendee2_id');
		echo $this->Form->input('date');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu'); ?>
