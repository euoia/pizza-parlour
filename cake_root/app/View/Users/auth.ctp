
<div class="authContainer">
	<div class="loginOrSignup">
		Been here before? New to our site? Either way, enter your username and password.
		<?php echo $this->Form->create('User') ?>
		<?php echo $this->Form->input('username'); ?>
		<?php echo $this->Form->input('password'); ?>
		<?php echo $this->Form->end(array(
			'label' => 'go'
		)) ?>
	</div>
</div>
