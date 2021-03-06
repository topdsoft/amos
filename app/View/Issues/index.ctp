<div class="issues index">
	<h2><?php echo __('Issues');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php //echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('Topic.name','Topic');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('meetings');?></th>
			<th><?php echo $this->Paginator->sort('oneonones');?></th>
			<th></th>
	</tr>
	<?php
	foreach ($issues as $issue): ?>
	<tr>
		<td><?php //echo h($issue['Issue']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($issue['Topic']['name'], array('controller' => 'topics', 'action' => 'view', $issue['Topic']['id'])); ?>
		</td>
		<td><?php echo nl2br($issue['Issue']['description']); ?>&nbsp;</td>
		<td><?php echo h($issue['Issue']['meetings']); ?>&nbsp;</td>
		<td><?php echo h($issue['Issue']['oneonones']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $issue['Issue']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $issue['Issue']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $issue['Issue']['id']), null, __('Are you sure you want to delete # %s?', $issue['Issue']['id'])); ?>
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
