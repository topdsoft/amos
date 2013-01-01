<div class="attendees form">
<?php echo $this->Form->create('Attendee');?>
	<fieldset>
		<legend><?php echo __('New Attendee'); ?></legend>
	<?php
		echo $this->Form->input('lastName');
		echo $this->Form->input('firstName');
		echo $this->Form->input('institution_id');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('notes');
//		echo $this->Form->input('Meeting');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu'); ?>