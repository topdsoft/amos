<div class="notifications form">
<?php echo $this->Form->create('Notification');?>
	<fieldset>
		<legend><?php echo __('Edit Notifications for Issue: ').$issueName; ?></legend>
	<?php
// debug($this->data);
		echo $this->Form->input('threshold',array('min'=>1,'max'=>3,'id'=>'sc',
			'label'=>'Notification (You will be notified if an attendee shows this level of interest or higher)'));
		echo $this->Form->input('type',array('type'=>'select','options'=>$types));
		echo $this->Form->input('id');
		echo $this->Form->input('issue_id',array('type'=>'hidden'));
		echo $this->Form->input('user_id',array('type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu'); ?>
<script type='text/javascript'>document.getElementById('sc').focus();</script>