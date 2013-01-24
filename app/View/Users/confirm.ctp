<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Confirm Your Account'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username',array('id'=>'sc'));
		echo $this->Form->input('pw1',array('label'=>'Password','type'=>'password'));
		echo $this->Form->input('pw2',array('label'=>'Repeat Password','type'=>'password'));
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php //echo $this->element('menu'); ?>
<script type='text/javascript'>document.getElementById('sc').focus();</script>