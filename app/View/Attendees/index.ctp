<div class="attendees index">
	<h2><?php echo __('Attendees');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('lastName');?></th>
			<th><?php echo $this->Paginator->sort('firstName');?></th>
			<th><?php echo $this->Paginator->sort('institution_id');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('numAttended');?></th>
			<th></th>
	</tr>
	<?php
	foreach ($attendees as $attendee): ?>
	<tr>
		<td><?php echo h($attendee['Attendee']['id']); ?>&nbsp;</td>
		<td><?php echo h($attendee['Attendee']['lastName']); ?>&nbsp;</td>
		<td><?php echo h($attendee['Attendee']['firstName']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attendee['Institution']['name'], array('controller' => 'institutions', 'action' => 'view', $attendee['Institution']['id'])); ?>
		</td>
		<td><?php echo h($attendee['Attendee']['email']); ?>&nbsp;</td>
		<td><?php echo h($attendee['Attendee']['phone']); ?>&nbsp;</td>
		<td><?php echo h($attendee['Attendee']['numAttended']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $attendee['Attendee']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $attendee['Attendee']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $attendee['Attendee']['id']), null, __('Are you sure you want to delete # %s?', $attendee['Attendee']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Attendee'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Institutions'), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institution'), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('controller' => 'meetings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting'), array('controller' => 'meetings', 'action' => 'add')); ?> </li>
	</ul>
</div>
