	<h2><?php echo __('Add New Attendee or Select From Below');?></h2>
<?php echo $this->Form->create('Attendee');?>
	<fieldset><legend>Enter a new Attendee Here</legend>
	<span id="addnew" style="display: inline-block">
	<?php
		echo $this->Form->input('lastName');
		echo $this->Form->input('firstName');
		echo $this->Form->input('institution_id');
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
<?php echo $this->Html->script(array('jquery-1.6.4.min'));?>
<script type="text/javascript">
//<!--
  function refreshandclose() {
	 opener.location.reload(true);
	 self.close();
  }

  <?php if(!isset($retry)) echo '$("#addnew").slideUp(0);' ?>
  <?php if(isset($return)) echo 'window.onload=refreshandclose();' ?>
  
  function shownew() {
	 $("#addnew").slideDown(500);
	 $("#showlink").hide();
  }
  
  function hidenew() {
	 $("#addnew").slideUp(500);
	 $("#showlink").show();
  }
//--
</script>