<div class="topics view">
<h2><?php  echo __('Topic');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($topic['Topic']['name']); ?>
			&nbsp;
		</dd>
	</dl>

<?php if (!empty($topic['Issue'])):?>
  <div class="related">
	 <h3><?php echo __('Related Issues');?></h3>
	 <table cellpadding = "0" cellspacing = "0">
	 <tr>
		  <th><?php echo __('Description'); ?></th>
		  <th title='How many times this issue has been brought up at house meetings.'><?php echo __('Occurrences'); ?></th>
		  <th></th>
	 </tr>
	 <?php
		  $i = 0;
		  foreach ($topic['Issue'] as $issue): ?>
		  <tr>
			 <td><?php echo nl2br($issue['description']);?></td>
			 <td><?php echo $issue['meetings'];?></td>
			 <td class="actions">
				  <?php echo $this->Html->link(__('View'), array('controller' => 'issues', 'action' => 'view', $issue['id'])); ?>
				  <?php echo $this->Html->link(__('Edit'), array('controller' => 'issues', 'action' => 'edit', $issue['id'])); ?>
				  <?php //echo $this->Form->postLink(__('Delete'), array('controller' => 'issues', 'action' => 'delete', $issue['id']), null, __('Are you sure you want to delete # %s?', $issue['id'])); ?>
			 </td>
		  </tr>
	 <?php endforeach; ?>
	 </table>
  </div>
<?php endif; ?>

</div>
<?php echo $this->element('menu'); ?>
