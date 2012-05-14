<div class="issues view">
<h2><?php  echo __('Issue');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($issue['Issue']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo nl2br($issue['Issue']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Topic'); ?></dt>
		<dd>
			<?php echo $this->Html->link($issue['Topic']['name'], array('controller' => 'topics', 'action' => 'view', $issue['Topic']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Issue'), array('action' => 'edit', $issue['Issue']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Issue'), array('action' => 'delete', $issue['Issue']['id']), null, __('Are you sure you want to delete # %s?', $issue['Issue']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Issues'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Issue'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('controller' => 'meetings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting'), array('controller' => 'meetings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<?php if (!empty($issue['Meeting'])):?>
	<h3><?php echo __('Meetings');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Facilitator'); ?></th>
		<th><?php echo __('Num Attendees'); ?></th>
		<th></th>
	</tr>
	<?php
		$i = 0;
		foreach ($issue['Meeting'] as $meeting): ?>
		<tr>
			<td><?php echo $meeting['id'];?></td>
			<td><?php echo $meeting['location'];?></td>
			<td><?php echo $meeting['date'];?></td>
			<td><?php echo $meeting['facilitator'];?></td>
			<td><?php echo $meeting['numAttendees'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'meetings', 'action' => 'view', $meeting['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'meetings', 'action' => 'edit', $meeting['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'meetings', 'action' => 'delete', $meeting['id']), null, __('Are you sure you want to delete # %s?', $meeting['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
