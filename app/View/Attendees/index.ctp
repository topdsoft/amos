<div class="attendees index">
	<h2><?php echo __('Attendees');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('lastName','Last Name');?></th>
			<th><?php echo $this->Paginator->sort('firstName','First Name');?></th>
			<th><?php echo $this->Paginator->sort('Institution.name','Institution');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('numAttended','HM');?></th>
			<th><?php //echo $this->Paginator->sort('ooo1','1on1a');?></th>
			<th><?php //echo $this->Paginator->sort('ooo2','1on1b');?></th>
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
		<td><?php //echo h($attendee['Attendee']['ooo1']); ?>&nbsp;</td>
		<td><?php //echo h($attendee['Attendee']['ooo2']); ?>&nbsp;</td>
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
<?php echo $this->element('menu'); ?>