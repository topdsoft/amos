<div class="oneonones form">
<?php echo $this->Form->create('Oneonone');?>
	<fieldset>
		<legend><?php echo __('Edit Oneonone'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Oneonone.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Oneonone.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Oneonones'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Attendees'), array('controller' => 'attendees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendee1'), array('controller' => 'attendees', 'action' => 'add')); ?> </li>
	</ul>
</div>
