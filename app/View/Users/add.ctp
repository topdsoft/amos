<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username',array('id'=>'sc'));
//		echo $this->Form->input('password');
//		echo $this->Form->input('email');
//		echo $this->Form->input('hash');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu'); ?>
<script type='text/javascript'>document.getElementById('sc').focus();</script>