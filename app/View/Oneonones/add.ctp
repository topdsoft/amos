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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Oneonones'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Attendees'), array('controller' => 'attendees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendee1'), array('controller' => 'attendees', 'action' => 'add')); ?> </li>
	</ul>
</div>
