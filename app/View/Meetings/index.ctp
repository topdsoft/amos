<div class="meetings index">
	<h2><?php echo __('Meetings');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('location');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('facilitator');?></th>
			<th><?php echo $this->Paginator->sort('numAttendees');?></th>
			<th><?php echo $this->Paginator->sort('numIssues');?></th>
			<th></th>
	</tr>
	<?php
	foreach ($meetings as $meeting): ?>
	<tr>
		<td><?php echo h($meeting['Meeting']['id']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['location']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['date']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['facilitator']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['numAttendees']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['numIssues']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $meeting['Meeting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $meeting['Meeting']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $meeting['Meeting']['id']), null, __('Are you sure you want to delete # %s?', $meeting['Meeting']['id'])); ?>
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
