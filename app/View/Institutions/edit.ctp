<div class="institutions form">
<?php echo $this->Form->create('Institution');?>
	<fieldset>
		<legend><?php echo __('Edit Institution'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Institution.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Institution.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Attendees'), array('controller' => 'attendees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendee'), array('controller' => 'attendees', 'action' => 'add')); ?> </li>
	</ul>
</div>
