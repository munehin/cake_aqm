<!-- File: templates/Svmappings/index.php -->
<div class="svmappings index content">
    <?= $this->Html->link(__('Jobs'), ['controller' => 'Jobs', 'action' => 'index'], ['class' => 'button float-right']) ?>
	<h3><?= __('Svmappings') ?></h3>

    <div class="table-responsive">
		<table>
		    <tr>
		        <th><?= $this->Paginator->sort('id') ?></th>
		        <th><?= $this->Paginator->sort('agentpbxid') ?></th>
		        <th><?= $this->Paginator->sort('agentname') ?></th>
		        <th><?= $this->Paginator->sort('supervisorname') ?></th>
		        <th><?= $this->Paginator->sort('agentid') ?></th>
		        <th><?= $this->Paginator->sort('job_id') ?></th>
		        <th><?= $this->Paginator->sort('created') ?></th>
		        <th><?= $this->Paginator->sort('modified') ?></th>
		    </tr>

		    <?php foreach ($svmappings as $svmapping): ?>
		    <tr>
		        <td>
		            <?= h($svmapping->id) ?>
		        </td>
		        <td>
		            <?= h($svmapping->agentpbxid) ?>
		        </td>
		        <td>
		            <?= h($svmapping->agentname) ?>
		        </td>
		        <td>
		            <?= h($svmapping->supervisorname) ?>
		        </td>
		        <td>
		            <?= h($svmapping->agentid) ?>
		        </td>
		        <td>
		            <?= $svmapping->has('job') ? h($svmapping->job->name) : '' ?>
		        </td>
		        <td>
		            <?= h($svmapping->created) ?>
		        </td>
		        <td>
		            <?php if (isset($svmapping->modified)) { ?>
		                <?= h($svmapping->modified) ?>
		            <?php } ?>
		        </td>
	        </tr>
		    <?php endforeach; ?>
		</table>
    </div>
    <div>
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
</div>
	
	