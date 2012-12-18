<div class="oneonones view">
<h2><?php  echo __('Oneonone');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($oneonone['Oneonone']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attendee1'); ?></dt>
		<dd>
			<?php echo $this->Html->link($oneonone['Attendee1']['id'], array('controller' => 'attendees', 'action' => 'view', $oneonone['Attendee1']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attendee2'); ?></dt>
		<dd>
			<?php echo $this->Html->link($oneonone['Attendee2']['id'], array('controller' => 'attendees', 'action' => 'view', $oneonone['Attendee2']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($oneonone['Oneonone']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($oneonone['Oneonone']['notes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Oneonone'), array('action' => 'edit', $oneonone['Oneonone']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Oneonone'), array('action' => 'delete', $oneonone['Oneonone']['id']), null, __('Are you sure you want to delete # %s?', $oneonone['Oneonone']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Oneonones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oneonone'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendees'), array('controller' => 'attendees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendee1'), array('controller' => 'attendees', 'action' => 'add')); ?> </li>
	</ul>
</div>
