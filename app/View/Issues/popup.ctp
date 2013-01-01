<div class="popup">
  <h2><?php echo __('Add New Issue or Select From Below');?></h2>
  <?php echo $this->Form->create('Issue');?>
	 <fieldset><legend>Enter a new Issue Here</legend>
	 <span id="addnew" style="display: inline-block">
	 <a href="#" onclick=show() id="show">Add new Topic</a>
	 <a href="#" onclick=hide() id="existing">Use Existing Topic</a>
	 <?php
		  echo $this->Form->input('topic_id');
		  echo $this->Form->input('topicName',array('label'=>''));
		  echo $this->Form->input('description');
  //		echo $this->Form->input('Meeting');
	 ?>
	 <?php echo $this->Form->end(__('Submit'));?>
	 <a href="#" onclick=hidenew()>hide</a>
	 </span>
	 <a href="#" onclick=shownew() id="showlink">show</a>
	 </fieldset>
	 <table cellpadding="0" cellspacing="0">
  <?php //debug($issues); ?>
	 <tr>
			 <th><?php echo $this->Paginator->sort('topic');?></th>
			 <th><?php echo $this->Paginator->sort('description');?></th>
			 <th></th>
	 </tr>
	 <?php
	 foreach ($issues as $issue): ?>
	 <tr>
		  <td><?php echo h($issue['Topic']['name']); ?>&nbsp;</td>
		  <td><?php echo nl2br($issue['Issue']['description']); ?>&nbsp;</td>
		  <td class="actions">
			 <?php echo $this->Html->link(__('Add'), array('action' => 'additom', $issue['Issue']['id'],$meeting_id)); ?>
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

  <?php if(!isset($retry)) echo '$("#addnew").slideUp(0);' ?>
  <?php if(isset($return)) echo 'window.onload=refreshandclose();' ?>
  $("#IssueTopicName").hide();
  $("#existing").hide();
  
  function shownew() {
	 $("#addnew").slideDown(500);
	 $("#showlink").hide();
  }
  
  function hidenew() {
	 $("#addnew").slideUp(500);
	 $("#showlink").show();
  }
  
  function show() {
	  $("#IssueTopicName").show();
	  $("#existing").show();
	  $("#IssueTopicId").hide();
	  $("#show").hide();
  }
  
	function hide() {
		$("#IssueTopicName").hide();
		$("#existing").hide();
		$("#IssueTopicId").show();
		$("#show").show();
	}
//--
</script>