<div class="popup">
  <h2><?php echo __('Select Issue');?></h2>
  <?php echo $this->Form->create('Issue');?>
		<?php echo $this->Form->input('topic_id'); ?>
		<?php echo $this->Form->input('changetopic',array('type'=>'hidden')); ?>
		<?php //echo $this->Form->end(__('Select Topic'));?>
		
	 <table cellpadding="0" cellspacing="0">
  <?php //debug($issues); ?>
	 <tr>
			 <th><?php echo __('Issue Description');?></th>
			 <th></th>
	 </tr>
	 <?php
	 foreach ($issues as $issue): ?>
	 <tr>
		  <td><?php echo nl2br($issue['Issue']['description']); ?>&nbsp;</td>
		  <td class="actions">
			 <?php echo $this->Html->link(__('Add'), array('action' => 'additom', $issue['Issue']['id'],$meeting_id)); ?>
		  </td>
	 </tr>
  <?php endforeach; ?>
	 </table>

	 <fieldset><legend><a href="#" onclick=shownew() id="legend">Create a New Issue Here</a></legend>
	 <span id="addnew" style="display: inline-block">
	 <?php
		  echo $this->Form->input('description',array('label'=>'Enter Issue Description'));
	 ?>
	 <?php echo $this->Form->end(__('Submit'));?>
	 <a href="#" onclick=hidenew()>hide</a>
	 </span>
	 <a href="#" onclick=shownew() id="showlink">show</a>
	 </fieldset>
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
//  $("#IssueTopicName").hide();
//  $("#existing").hide();
  
	$("#IssueTopicId").change(function(){
		$("#IssueChangetopic").val('1');
		$("#IssuePopupForm").submit();
	} );
  
  function shownew() {
	 $("#legend").attr('onclick','hidenew()');
	 $("#addnew").slideDown(500);
	 $("#showlink").hide();
//	 $("#IssueDescription").focus();
  }
  
  function hidenew() {
	 $("#legend").attr('onclick','shownew()');
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