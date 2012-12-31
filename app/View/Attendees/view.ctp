<div class="attendees view">
<h2><?php  echo __('Attendee');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attendee['Attendee']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('LastName'); ?></dt>
		<dd>
			<?php echo h($attendee['Attendee']['lastName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('FirstName'); ?></dt>
		<dd>
			<?php echo h($attendee['Attendee']['firstName']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institution'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendee['Institution']['name'], array('controller' => 'institutions', 'action' => 'view', $attendee['Institution']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($attendee['Attendee']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($attendee['Attendee']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($attendee['Attendee']['notes']); ?>
			&nbsp;
		</dd>
	</dl>
<?php //debug($attendee);?>

  <div class="related">
	 <?php if (!empty($attendee['Meeting'])):?>
	 <h3><?php echo __('Meetings Attended');?></h3>
	 <table cellpadding = "0" cellspacing = "0">
	 <tr>
		  <th><?php echo __('Id'); ?></th>
		  <th><?php echo __('Location'); ?></th>
		  <th><?php echo __('Date'); ?></th>
		  <th><?php echo __('Facilitator'); ?></th>
		  <th></th>
	 </tr>
	 <?php
		  $i = 0;
		  foreach ($attendee['Meeting'] as $meeting): ?>
		  <tr>
			 <td><?php echo $meeting['id'];?></td>
			 <td><?php echo $meeting['location'];?></td>
			 <td><?php echo $meeting['date'];?></td>
			 <td><?php echo $meeting['facilitator'];?></td>
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

  <div class="related">
	 <?php if (!empty($attendee['Issue'])):?>
	 <h3><?php echo __('Issues '.$attendee['Attendee']['name'].' Brought up on One on Ones');?></h3>
	 <table cellpadding = "0" cellspacing = "0">
	 <tr>
		  <th><?php echo __('Issue'); ?></th>
		  <th><?php echo __('Interest Level'); ?></th>
		  <th></th>
	 </tr>
	 <?php
		  $i = 0;
		  foreach ($attendee['Issue'] as $i): ?>
		  <tr>
			 <td><?php echo $this->Html->link($i['description'],array('controller'=>'issues','action'=>'view',$i['id']));?></td>
			 <td><?php echo $i['AttendeesIssue']['rank'];?></td>
			 <td class="actions">
				  <?php //echo $this->Html->link(__('View'), array('controller' => 'oneonones', 'action' => 'view', $i['id'])); ?>
				  <?php //echo $this->Html->link(__('Edit'), array('controller' => 'meetings', 'action' => 'edit', $meeting['id'])); ?>
				  <?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'meetings', 'action' => 'delete', $meeting['id']), null, __('Are you sure you want to delete # %s?', $meeting['id'])); ?>
			 </td>
		  </tr>
	 <?php endforeach; ?>
	 </table>
  <?php endif; ?>
  </div>

  <div class="related">
	 <?php if (!empty($attendee['Interviewer'])):?>
	 <h3><?php echo __('One on Ones where '.$attendee['Attendee']['name'].' was Interviewer');?></h3>
	 <table cellpadding = "0" cellspacing = "0">
	 <tr>
		  <th><?php echo __('Interviewee'); ?></th>
		  <th><?php echo __('Date'); ?></th>
		  <th><?php echo __('Notes'); ?></th>
		  <th></th>
	 </tr>
	 <?php
		  $i = 0;
		  foreach ($attendee['Interviewer'] as $i): ?>
		  <tr>
			 <td><?php echo $this->Html->link($attendees[$i['attendee2_id']],array('controller'=>'attendees','action'=>'view',$i['attendee2_id']));?></td>
			 <td><?php echo $i['date'];?></td>
			 <td><?php echo $i['notes'];?></td>
			 <td class="actions">
				  <?php echo $this->Html->link(__('View'), array('controller' => 'oneonones', 'action' => 'view', $i['id'])); ?>
				  <?php //echo $this->Html->link(__('Edit'), array('controller' => 'meetings', 'action' => 'edit', $meeting['id'])); ?>
				  <?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'meetings', 'action' => 'delete', $meeting['id']), null, __('Are you sure you want to delete # %s?', $meeting['id'])); ?>
			 </td>
		  </tr>
	 <?php endforeach; ?>
	 </table>
  <?php endif; ?>
  </div>

  <div class="related">
	 <?php if (!empty($attendee['Interviewee'])):?>
	 <h3><?php echo __('One on Ones where '.$attendee['Attendee']['name'].' was Interviewee');?></h3>
	 <table cellpadding = "0" cellspacing = "0">
	 <tr>
		  <th><?php echo __('Interviewer'); ?></th>
		  <th><?php echo __('Date'); ?></th>
		  <th><?php echo __('Notes'); ?></th>
		  <th></th>
	 </tr>
	 <?php
		  $i = 0;
		  foreach ($attendee['Interviewee'] as $i): ?>
		  <tr>
			 <td><?php echo $this->Html->link($attendees[$i['attendee1_id']],array('controller'=>'attendees','action'=>'view',$i['attendee1_id']));?></td>
			 <td><?php echo $i['date'];?></td>
			 <td><?php echo $i['notes'];?></td>
			 <td class="actions">
				  <?php echo $this->Html->link(__('View'), array('controller' => 'oneonones', 'action' => 'view', $i['id'])); ?>
				  <?php //echo $this->Html->link(__('Edit'), array('controller' => 'meetings', 'action' => 'edit', $meeting['id'])); ?>
				  <?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'meetings', 'action' => 'delete', $meeting['id']), null, __('Are you sure you want to delete # %s?', $meeting['id'])); ?>
			 </td>
		  </tr>
	 <?php endforeach; ?>
	 </table>
  <?php endif; ?>
  </div>
</div>
<?php echo $this->element('menu'); ?>
