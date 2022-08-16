<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Summary $summary
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Summaries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="summaries form content">
            <?= $this->Form->create($summary) ?>
            <fieldset>
                <legend><?= __('Add Summary') ?></legend>
                <?php
                    echo $this->Form->control('uploaded', ['empty' => true]);
                    echo $this->Form->control('total');
                    echo $this->Form->control('ok');
                    echo $this->Form->control('ng');
                    echo $this->Form->control('wavsize');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
