<div class="issues form">
<?php echo $this->Form->create('Issue');?>
	<fieldset>
		<legend><?php echo __('Edit Issue'); ?></legend>
	<?php
		echo $this->Html->link(__('Combine Issue with another similar Issue'),array('action'=>'combine',$this->data['Issue']['id']));
		echo $this->Form->input('id');
		echo $this->Form->input('topic_id');
		echo $this->Form->input('description');
//		echo $this->Form->input('Meeting');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu'); ?>
