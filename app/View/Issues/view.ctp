<div class="issues view">
	<h2><?php  echo __('Issue');?></h2>
	<?php echo $this->Html->link(__('Notifications'),array('controller'=>'notifications','action'=>'edit',$issue['Issue']['id']),
		array('title'=>'Click Here to edit your notifications for this issue')); ?><br>
	 <dl>
		  <dt><?php echo __('Id'); ?></dt>
		  <dd>
			 <?php echo h($issue['Issue']['id']); ?>
			 &nbsp;
		  </dd>
		  <dt><?php echo __('Topic'); ?></dt>
		  <dd>
			 <?php echo $this->Html->link($issue['Topic']['name'], array('controller' => 'topics', 'action' => 'view', $issue['Topic']['id'])); ?>
			 &nbsp;
		  </dd>
		  <dt><?php echo __('Description'); ?></dt>
		  <dd>
			 <?php echo nl2br($issue['Issue']['description']); ?>
			 &nbsp;
		  </dd>
	 </dl>
  <?php //debug($issue); ?>

  <?php if (!empty($issue['Meeting'])):?>
  <div class="related">
	 <h3><?php echo __('Issue Brought up at following Meetings');?></h3>
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
  </div>
  <?php endif; ?>

  <?php if (!empty($issue['Attendee'])):?>
  <div class="related">
	 <h3><?php echo __('Issue brought up by following Attendees during One on Ones');?></h3>
	 <table cellpadding = "0" cellspacing = "0">
	 <tr>
		  <th><?php echo __('Attendee'); ?></th>
		  <th><?php echo __('Interest Level'); ?></th>
		  <th></th>
	 </tr>
	 <?php
		  $i = 0;
		  foreach ($issue['Attendee'] as $attendee): ?>
		  <tr>
			 <td><?php echo $this->Html->link($attendee['name'],array('controller'=>'attendees','action'=>'view',$attendee['id']));?></td>
			 <td><?php echo $attendee['AttendeesIssue']['rank'];?></td>
			 <td class="actions">
				  <?php //echo $this->Html->link(__('View 1on1'), array('controller' => 'oneonones', 'action' => 'view', $meeting['id'])); ?>
				  <?php //echo $this->Html->link(__('Edit'), array('controller' => 'meetings', 'action' => 'edit', $meeting['id'])); ?>
				  <?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'meetings', 'action' => 'delete', $meeting['id']), null, __('Are you sure you want to delete # %s?', $meeting['id'])); ?>
			 </td>
		  </tr>
	 <?php endforeach; ?>
	 </table>
  </div>
  <?php endif; ?>
</div>

<?php echo $this->element('menu'); ?>
