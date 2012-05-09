<div class="attendees form">
<?php echo $this->Form->create('Attendee');?>
	<fieldset>
		<legend><?php echo __('Add Attendee'); ?></legend>
	<?php
		echo $this->Form->input('lastName');
		echo $this->Form->input('firstName');
		echo $this->Form->input('institution_id');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('notes');
		echo $this->Form->input('Meeting');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Attendees'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution'), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('controller' => 'meetings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting'), array('controller' => 'meetings', 'action' => 'add')); ?> </li>
	</ul>
</div>
