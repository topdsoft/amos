<div class="oneonones index">
	<h2><?php echo __('Oneonones');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('attendee1_id');?></th>
			<th><?php echo $this->Paginator->sort('attendee2_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('notes');?></th>
			<th></th>
	</tr>
	<?php
	foreach ($oneonones as $oneonone): ?>
	<tr>
		<td><?php echo h($oneonone['Oneonone']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($oneonone['Attendee1']['name'], array('controller' => 'attendees', 'action' => 'view', $oneonone['Attendee1']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($oneonone['Attendee2']['name'], array('controller' => 'attendees', 'action' => 'view', $oneonone['Attendee2']['id'])); ?>
		</td>
		<td><?php echo h($oneonone['Oneonone']['date']); ?>&nbsp;</td>
		<td><?php echo h($oneonone['Oneonone']['notes']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $oneonone['Oneonone']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $oneonone['Oneonone']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $oneonone['Oneonone']['id']), null, __('Are you sure you want to delete # %s?', $oneonone['Oneonone']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Oneonone'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Attendees'), array('controller' => 'attendees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendee1'), array('controller' => 'attendees', 'action' => 'add')); ?> </li>
	</ul>
</div>
