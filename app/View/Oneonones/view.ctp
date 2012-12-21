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
<?php echo $this->element('menu'); ?>
