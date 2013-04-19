<div class="notifications index">
	<h2><?php echo __('Notifications');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('issue_id');?></th>
			<th><?php echo $this->Paginator->sort('threshold');?></th>
			<th><?php echo $this->Paginator->sort('last_sent');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th></th>
	</tr>
	<?php
	foreach ($notifications as $notification): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($notification['User']['username'], array('controller' => 'users', 'action' => 'view', $notification['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($notification['Issue']['description'], array('controller' => 'issues', 'action' => 'view', $notification['Issue']['id'])); ?>
		</td>
		<td><?php echo h($notification['Notification']['threshold']); ?>&nbsp;</td>
		<td><?php echo h($notification['Notification']['last_sent']); ?>&nbsp;</td>
		<td><?php echo $types[$notification['Notification']['type']]; ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $notification['Notification']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $notification['Notification']['id']), null, __('Are you sure you want to delete # %s?', $notification['Notification']['id'])); ?>
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
