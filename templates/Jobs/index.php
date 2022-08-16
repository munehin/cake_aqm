
<div class="jobs index content">

    <?= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Jobs') ?></h3>
    <div class="table-responsive">
        <table>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('clientcode') ?></th>
                <th><?= $this->Paginator->sort('subjob') ?></th>
                <th><?= $this->Paginator->sort('sendmin') ?></th>
                <th><?= $this->Paginator->sort('sendmax') ?></th>
                <th><?= $this->Paginator->sort('wavmin') ?></th>
                <th><?= $this->Paginator->sort('wavmax') ?></th>
                <th><?= __('Jobmappings') ?></th>
                <th><?= __('Svmappings') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>

            <?php foreach ($jobs as $job): ?>
            <tr>
                <td>
                    <?= h($job->id) ?>
                </td>
                <td>
                    <?= h($job->name) ?>
                </td>
                <td>
                    <?= h($job->clientcode) ?>
                </td>
                <td>
                    <?= h($job->subjob) ?>
                </td>
                <td>
                    <?= h($job->sendmin) ?>
                </td>
                <td>
                    <?= h($job->sendmax) ?>
                </td>
                <td>
                    <?= h($job->wavmin) ?><br /><?= is_null($job->wavmin) ? '' : h(floor($job->wavmin / 15.3) . '秒') ?>
                </td>
                <td>
                    <?= h($job->wavmax) ?><br /><?= is_null($job->wavmax) ? '' : h(floor($job->wavmax / 15.3) . '秒') ?>
                </td>
                <td>
                    <?= $this->Html->link(__('View'), ['controller' => 'Jobmappings', 'action' => 'index2', $job->id]) ?><br/>
                    <?= $this->Html->link(__('Import'), ['controller' => 'Jobmappings', 'action' => 'import', $job->id]) ?>
                    <?= $this->Html->link(__('Export'), ['controller' => 'Jobmappings', 'action' => 'export', $job->id]) ?>
                </td>
                <td>
                    <?= $this->Html->link(__('View'), ['controller' => 'Svmappings', 'action' => 'index2', $job->id]) ?><br/>
                    <?= $this->Html->link(__('Import'), ['controller' => 'Svmappings', 'action' => 'import', $job->id]) ?>
                    <?= $this->Html->link(__('Export'), ['controller' => 'Svmappings', 'action' => 'export', $job->id]) ?>
                </td>
                <td>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?><br/>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
                </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
