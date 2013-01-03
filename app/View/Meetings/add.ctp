<div class="meetings form">
<?php echo $this->Form->create('Meeting');?>
	<fieldset>
		<legend><?php echo __('Add Meeting'); ?></legend>
	<?php
		echo $this->Form->input('location',array('id'=>'ln'));
		echo $this->Form->input('date');
		echo $this->Form->input('facilitator');
		echo $this->Form->input('notes');
//		echo $this->Form->input('Attendee');
//		echo $this->Form->input('Issue');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu'); ?>
<script type='text/javascript'>document.getElementById('ln').focus();</script>
