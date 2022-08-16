<!-- /templates/Users/menu.php -->

<div class="users menu content">
    <?= $this->Flash->render() ?>
    <h3><?= __('Menu') ?></h3>

    <div class="column-responsive">
	    <?= $this->Html->link(__('Summaries'), ['controller' => 'Summaries', 'action' => 'index'], ['class' => 'button']) ?>
	    <?= $this->Html->link(__('Accs'), ['controller' => 'Summaries', 'action' => 'index2'], ['class' => 'button']) ?><br/>
	    <?= $this->Html->link(__('Jobs'), ['controller' => 'Jobs', 'action' => 'index'], ['class' => 'button']) ?><br/>
	    <br/>
	    <?= $this->Html->link(__('Jobmappings'), ['controller' => 'Jobmappings', 'action' => 'index'], ['class' => 'button']) ?>
	    <?= $this->Html->link(__('Svmappings'), ['controller' => 'Svmappings', 'action' => 'index'], ['class' => 'button']) ?><br/>
	    <?= $this->Html->link(__('Uploadlogs'), ['controller' => 'Uploadlogs', 'action' => 'index'], ['class' => 'button']) ?>
	    <?= $this->Html->link(__('Sendlogs'), ['controller' => 'Sendlogs', 'action' => 'index'], ['class' => 'button']) ?>
    </div>
</div>
