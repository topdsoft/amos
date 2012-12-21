<div class="institutions view">
<h2><?php  echo __('Institution');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($institution['Institution']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php echo $this->element('menu'); ?>
<div class="related">
	<?php if (!empty($institution['Attendee'])):?>
	<h3><?php echo __('Attendees');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Attended'); ?></th>
		<th></th>
	</tr>
	<?php
		$i = 0;
		foreach ($institution['Attendee'] as $attendee): ?>
		<tr>
			<td><?php echo $attendee['lastName'];?></td>
			<td><?php echo $attendee['firstName'];?></td>
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
