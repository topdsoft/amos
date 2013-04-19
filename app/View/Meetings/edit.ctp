<div class="meetings form">
<?php echo $this->Form->create('Meeting');?>
	<fieldset>
		<legend><?php echo __('Edit Meeting #'.$this->Form->value('id')); ?></legend>
	<?php
		//show link for page specific help
		echo $this->Html->link(__('Meeting entry help page'),array('controller'=>'pages','action'=>'addmeeting'),array('target'=>'none'));
		echo $this->Form->input('id');
		echo $this->Form->input('location',array('id'=>'ln'));
		echo $this->Form->input('date');
		echo $this->Form->input('facilitator');
		echo $this->Form->input('notes');
//		echo $this->Form->input('Attendee');
//		echo $this->Form->input('Issue');
		
		
// debug($meeting);
	?>
	<h3>Attendees</h3>
	<a href="#" onclick="window.open('<?php echo $this->Html->url(array('controller'=>'attendees','action'=>'popup',$meeting['Meeting']['id'])); ?>',
	'popup','width=500,height=600,scrollbars=yes,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
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
	'popup','width=500,height=600,scrollbars=yes,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
	return false">Add Issue</a>
	<table>
		<tr><th>Topic</th><th>Description</th><th></th></tr>
		<?php
		$row=0;
		$starId=0;
		foreach ($meeting['Issue'] as $i) {
			echo '<tr>';
			echo '<td>'.$topics[$i['topic_id']].'</td>';
			echo '<td>'.nl2br($i['description']).'</td>';
			echo '<td class="actions">';
			echo $this->Html->link(__('Details'), array('controller'=>'issues','action' => 'view', $i['id']));
			echo $this->Html->link(__('Remove'), array('controller'=>'issues','action' => 'removefrommeeting', $i['IssuesMeeting']['id']));
			echo '</td>';
			echo '</tr>';
			//show attendees for each issue
			echo '<tr id="row'.$row++.'">';
			echo '<td></td><td>';
			foreach ($meeting['Attendee'] as $a) {
				//show all attendees
				$inputname='AttendeesIssue.'.$i['id'].'.'.$a['id'].'.rank';
				$starId++;
				echo $a['firstName'].' '.$a['lastName'].'<table style="margin:0;width:20px;display:inline-table;"><tr>';
				for ($ii=0; $ii<3; $ii++) echo '<td style="padding:0;border:none;"><div class="tdBox">'.$this->Html->image('offstar.png',
					array('class'=>'L1','url'=>"javascript:rating(".($ii+1).",'on$starId','input$starId')",'style'=>'position:relative;')).$this->Html->image('onstar.png',
					array('class'=>'L1','url'=>"javascript:rating(".($ii+1).",'on$starId','input$starId')",'id'=>'on'.$starId,
					'style'=>''.(($this->Form->value($inputname)>$ii ? '' : 'display:none;')))).'</div></td>';
				echo '</tr></table><br>';
				echo $this->Form->input($inputname,array('label'=>'','before'=>$a['firstName'].' '.$a['lastName'],'id'=>'input'.$starId,'type'=>'hidden','max'=>3,'min'=>0));
			}
			 echo '</tr>';
		  }
		?>
	</table>
	
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu'); ?>
<script type='text/javascript'>document.getElementById('ln').focus();</script>
<?php echo $this->Html->script(array('jquery-1.6.4.min','ratingstars.js'));?>
<style type='text/css'>
.tdBox { position:relative; padding:0; margin:0; }
.L1 { position:absolute; width:15px; top:0px; left:0px; z-index:1; }
</style>
