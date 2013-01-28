<div class="users view">
<h2><?php  echo __('User').': '.$user['User']['username'];?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hash'); ?></dt>
		<dd>
			<?php echo h($user['User']['hash']); ?>
			&nbsp;
		</dd>
		<strong>The new user can use the following link to create their account:</strong><br>
		<?php echo $this->Html->link($this->Html->url( array('controller'=>'users','action' => 'confirm', $user['User']['hash']),true),array('controller'=>'users','action' => 'confirm', $user['User']['hash']));
 ?>
	</dl>
</div>
<?php echo $this->element('menu'); ?>
