<div class="meetings view">
<h2><?php  echo __('Meeting');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facilitator'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['facilitator']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo nl2br($meeting['Meeting']['notes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Meeting'), array('action' => 'edit', $meeting['Meeting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Meeting'), array('action' => 'delete', $meeting['Meeting']['id']), null, __('Are you sure you want to delete # %s?', $meeting['Meeting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendees'), array('controller' => 'attendees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendee'), array('controller' => 'attendees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Issues'), array('controller' => 'issues', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Issue'), array('controller' => 'issues', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<?php if (!empty($meeting['Attendee'])):?>
	<h3><?php echo __('Attendees');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('LastName'); ?></th>
		<th><?php echo __('FirstName'); ?></th>
		<th><?php echo __('Institution'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Attended'); ?></th>
		<th></th>
	</tr>
	<?php
		$i = 0;//debug($meeting['Attendee']);
		foreach ($meeting['Attendee'] as $attendee): ?>
		<tr>
			<td><?php echo $attendee['lastName'];?></td>
			<td><?php echo $attendee['firstName'];?></td>
			<td><?php echo $attendee['Institution']['name'];?></td>
			<td><?php echo $attendee['email'];?></td>
			<td><?php echo $attendee['phone'];?></td>
			<td><?php echo $attendee['numAttended'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attendees', 'action' => 'view', $attendee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attendees', 'action' => 'edit', $attendee['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'attendees', 'action' => 'delete', $attendee['id']), null, __('Are you sure you want to delete # %s?', $attendee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<?php if (!empty($meeting['Issue'])):?>
	<h3><?php echo __('Issues');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Topic'); ?></th>
		<th><?php echo __('Issue Description'); ?></th>
		<th></th>
	</tr>
	<?php
		$i = 0;
		foreach ($meeting['Issue'] as $issue): ?>
		<tr>
			<td><?php echo $this->Html->link( $issue['Topic']['name'],array('controller'=>'topics','action'=>'view',$issue['Topic']['id']));?></td>
			<td><?php echo nl2br($issue['description']);?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'issues', 'action' => 'view', $issue['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'issues', 'action' => 'edit', $issue['id'])); ?>
				<?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'issues', 'action' => 'delete', $issue['id']), null, __('Are you sure you want to delete # %s?', $issue['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
