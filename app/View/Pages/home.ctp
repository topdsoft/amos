<div class="help">
<h2>Prototype Front Page</h2>

<?php echo $this->Html->link(__('Issues Database'),array('controller'=>'issues')); ?><br>
<?php echo $this->Html->link(__('Goals for this database'),array('goals')); ?><br>
<br><br>
AMOS (A
        Mid-Iowa Organizing Strategy) is a broad-based community
        organization that help citizens get actively engaged in the
        political process. AMOS is non-partisan, does not endorse
        candidates, yet helps build relationships with politicians,
        administrators, and others in positions of power. We strive to
        make our voices heard on social and community issues such as
        education, criminal justice, mental healthcare, immigration, and
        other topics of concern.


<br><br>
AMOS members
        build relationships with members of their own individual
        communities through face-to-face and one-on-one meetings. From
        these meetings we collect our concerns on each issue, research
        the facts about them, develop solutions at a larger scale, and
        then promote our needs to the decision-makers to help implement
        them.


<br><br>
You can
        participate in AMOS directly at Plymouth Church by attending our
        monthly meetings. AMOS also conducts monthly cluster meetings
        among our members, which you are also welcome to attend. For
        more information about AMOS, check out our Web site at
<?php
		echo $this->Html->link(
			__d('AMOSIowa', 'AMOS Iowa'),
			'http://www.amosiowa.org/about-us',
			array('target' => '_blank', 'escape' => false)
		);
?>.

<br><br>
Our group is part of 
<?php
		echo $this->Html->link(
			__d('Plymouth UCC', 'Plymouth UCC'),
			'http://www.plymouthchurch.com',
			array('target' => '_blank', 'escape' => false)
		);
?>.
</div>
<br><br>
<fieldset><legend>Statistics</legend>
<?php
	echo '<strong>'.ClassRegistry::init('Attendee')->find('count').'</strong> Attendees from ';
	echo '<strong>'.ClassRegistry::init('Institution')->find('count').'</strong> institutions. ';
	echo 'Have attended <strong>'.ClassRegistry::init('Meeting')->find('count').'</strong> meetings and brought up ';
	echo '<strong>'.ClassRegistry::init('Issue')->find('count').'</strong> Issues over <strong>';
	echo ClassRegistry::init('Topic')->find('count').'</strong> topics.';
?>
</fieldset>
