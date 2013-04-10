<div class="popup">
	<h2><?php echo __('Add New Attendee or Select From Below');?></h2>
  <?php echo $this->Form->create('Attendee');?>
	 <fieldset><legend><a href="#" onclick=shownew() id="legend">Enter a new Attendee Here</a></legend>
	 <span id="addnew" style="display: inline-block">
	 <?php
		  echo $this->Form->input('lastName');
		  echo $this->Form->input('firstName');
		  echo $this->Form->input('institution_id',array('label'=>'Select Institution'));
		  echo '<span id="newinst">';
		  echo $this->Form->input('Institution.name',array('label'=>'Enter New Institution'));
		  echo '</span>';
		  echo $this->Form->input('email');
		  echo $this->Form->input('phone');
		  echo $this->Form->input('notes');
  //		echo $this->Form->input('Meeting');
	 ?>
	 <?php echo $this->Form->end(__('Submit'));?>
	 <a href="#" onclick=hidenew()>hide</a>
	 </span>
	 <a href="#" onclick=shownew() id="showlink">show</a>
	 <a href="#" onclick=refreshandclose()>close</a>
	 </fieldset>
	 <?php
		if(isset($initials)) {
			//show list of first latters to filter by
			foreach($initials as $i) echo $this->Html->link($i,array($meeting_id,$i)).' ';
		} else {
			//show clear option
			echo $this->Html->link('Show All Names',array($meeting_id));
		}//endif
	 ?>
	 <?php  ?>
	 <table cellpadding="0" cellspacing="0">
	 <tr>
			 <th><?php echo $this->Paginator->sort('lastName','Last Name');?></th>
			 <th><?php echo $this->Paginator->sort('firstName','First Name');?></th>
			 <th><?php echo $this->Paginator->sort('institution_id');?></th>
			 <th></th>
	 </tr>
	 <?php
	 foreach ($attendees as $attendee): ?>
	 <tr>
		  <td><?php echo h($attendee['Attendee']['lastName']); ?>&nbsp;</td>
		  <td><?php echo h($attendee['Attendee']['firstName']); ?>&nbsp;</td>
		  <td><?php echo h($attendee['Institution']['name']); ?>&nbsp;</td>
		  <td class="actions">
			 <?php echo $this->Html->link(__('Add'), array('action' => 'addatom', $attendee['Attendee']['id'],$meeting_id)); ?>
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
<?php echo $this->Html->script(array('jquery-1.6.4.min'));?>
<script type="text/javascript">
//<!--
  function refreshandclose() {
	 opener.location.reload(true);
	 self.close();
  }

  $('#newinst').hide();
  <?php if(!isset($retry)) echo '$("#addnew").slideUp(0);' ?>
  <?php if(isset($return)) echo 'window.onload=refreshandclose();' ?>

	$("#AttendeeInstitutionId").change(function(){
		if($(this).val()==0) {
			//selecting new institution
			$('#newinst').slideDown(100);
		} else {
			//using existing
			$('#InstitutionName').val('');
			$('#newinst').slideUp(100);
		}
	} );
  
  function shownew() {
	 $("#addnew").slideDown(500);
	 $("#showlink").hide();
	 $("#legend").attr('onclick','hidenew()');
  }
  
  function hidenew() {
	 $("#addnew").slideUp(500);
	 $("#showlink").show();
	 $("#legend").attr('onclick','shownew()');
  }
//--
</script>