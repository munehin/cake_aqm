<!-- /templates/Users/login.php -->
<div class="users login content">
    <?= $this->Flash->render() ?>
    <h3><?= __('Login') ?></h3>
    <div class="column-responsive">
	    <div class="users form content">
		    <?= $this->Form->create() ?>
		    <fieldset>
		        <legend><?= __('Please enter your email and password') ?></legend>
		        <?= $this->Form->control('email', ['type' => 'text', 'required' => true]) ?>
		        <?= $this->Form->control('password', ['required' => true]) ?>
		    </fieldset>
		    <?= $this->Form->submit(__('Login')); ?>
		    <?= $this->Form->end() ?>
	    </div>
    </div>
</div>
