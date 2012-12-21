<div class="meetings form">
<?php echo $this->Form->create('Meeting');?>
	<fieldset>
		<legend><?php echo __('Edit Meeting #'.$this->Form->value('id')); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('location');
		echo $this->Form->input('date');
		echo $this->Form->input('facilitator');
		echo $this->Form->input('notes');
//		echo $this->Form->input('Attendee');
//		echo $this->Form->input('Issue');
		
		
//debug($meeting);
	?>
	<h3>Attendees</h3>
	<a href="#" onclick="window.open('<?php echo $this->Html->url(array('controller'=>'attendees','action'=>'popup',$meeting['Meeting']['id'])); ?>',
	'popup','width=500,height=600,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
	return false">Add Attendee</a>
	<table>
		<tr><th>Last Name</th><th>First Name</th><th>Institution</th><th>Num Attended</th><th></th></tr>
		<?php
		  foreach ($meeting['Attendee'] as $a) {
			 echo '<tr>';
			 echo '<td>'.$a['lastName'].'</td>';
			 echo '<td>'.$a['firstName'].'</td>';
			 echo '<td>'.$institutions[$a['institution_id']].'</td>';
			 echo '<td>'.$a['numAttended'].'</td>';
			 echo '<td class="actions">';
			 echo $this->Html->link(__('Details'), array('controller'=>'attendees','action' => 'view', $a['id']));
			 echo $this->Html->link(__('Remove'), array('controller'=>'attendees','action' => 'removefrommeeting', $a['AttendeesMeeting']['id']));
			 echo '</td>';
			 echo '</tr>';
		  }
		?>
	</table>
	
	<h3>Issues</h3>
	<a href="#" onclick="window.open('<?php echo $this->Html->url(array('controller'=>'issues','action'=>'popup',$meeting['Meeting']['id'])); ?>',
	'popup','width=500,height=600,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
	return false">Add Issue</a>
	<table>
		<tr><th>Topic</th><th>Description</th><th></th></tr>
		<?php
		  foreach ($meeting['Issue'] as $i) {
			 echo '<tr>';
			 echo '<td>'.$topics[$i['topic_id']].'</td>';
			 echo '<td>'.nl2br($i['description']).'</td>';
			 echo '<td class="actions">';
			 echo $this->Html->link(__('Details'), array('controller'=>'issues','action' => 'view', $i['id']));
			 echo $this->Html->link(__('Remove'), array('controller'=>'issues','action' => 'removefrommeeting', $i['IssuesMeeting']['id']));
			 echo '</td>';
			 echo '</tr>';
		  }
		?>
	</table>
	
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu'); ?>
