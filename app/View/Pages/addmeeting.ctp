<div class="help">

  <h2>Adding a new Meeting</h2>

  <?php echo $this->Html->link(__('Issues Database'),array('controller'=>'issues')); ?><br>
  <?php echo $this->Html->link(__('Goals for this database'),array('goals')); ?>
  <br><br>
  <h3>Step 1</h3>
  <p>Click <?php echo $this->Html->link(__('New Meeting'),array('controller'=>'meetings','action'=>'add')) ?> from the menu.</p>
	<?php echo $this->Html->image('meeting/addmeeting1.png',array('class'=>'screenshot')); ?><br>
	<?php echo $this->Html->image('meeting/addmeeting2.png',array('class'=>'screenshot')); ?><br>
	<?php echo $this->Html->image('meeting/addmeeting3.png',array('class'=>'screenshot')); ?><br>
	<?php echo $this->Html->image('meeting/addmeeting4.png',array('class'=>'screenshot')); ?><br>
	<?php echo $this->Html->image('meeting/addmeeting5.png',array('class'=>'screenshot')); ?><br>
	<?php echo $this->Html->image('meeting/addmeeting6.png',array('class'=>'screenshot')); ?><br>
	<?php // echo $this->Html->image('meeting/addmeeting7.png',array('class'=>'screenshot')); ?><br>
</div>