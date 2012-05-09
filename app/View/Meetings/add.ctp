<div class="meetings form">
<?php echo $this->Form->create('Meeting');?>
	<fieldset>
		<legend><?php echo __('Add Meeting'); ?></legend>
	<?php
		echo $this->Form->input('location');
		echo $this->Form->input('date');
		echo $this->Form->input('facilitator');
		echo $this->Form->input('notes');
//		echo $this->Form->input('Attendee');
//		echo $this->Form->input('Issue');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Meetings'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Attendees'), array('controller' => 'attendees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendee'), array('controller' => 'attendees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Issues'), array('controller' => 'issues', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Issue'), array('controller' => 'issues', 'action' => 'add')); ?> </li>
	</ul>
</div>
