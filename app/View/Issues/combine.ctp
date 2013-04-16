<div class="issues form">
<?php echo $this->Form->create('Issue');?>
	<fieldset>
		<legend><?php echo __('Combine Issues'); ?></legend>
	<?php
		echo 'Combine Issue: <strong>'.$issue['Issue']['description'].'</strong>';
		if(!isset($secondIssue)) {
			echo ' with another similar issue from topic: ';
			echo $this->Html->link($issue['Topic']['name'],array('controller'=>'topics','action'=>'view',$issue['Topic']['id']));
		}//endif
// debug($secondIssue);
		if(isset($secondIssue)) echo '<br>With issue: <strong>'.$secondIssue['Issue']['description'].'</strong>.';
		echo $this->Form->input('id');
		if(isset($secondIssue)){
			echo $this->Form->input('description',array('id'=>'sc','label'=>'Description of combined issues'));
			$text='Confirm';
		} else {
			echo $this->Form->input('issue_id');
			$text='Select Issue';
		}
	?>
	</fieldset>
<?php echo $this->Form->end(__($text));?>
</div>
<?php echo $this->element('menu'); ?>
<script type='text/javascript'>document.getElementById('sc').focus();</script>