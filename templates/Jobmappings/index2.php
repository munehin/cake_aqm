<!-- File: templates/Jobmappings/index.php -->
<div class="jobmappings index content">
    <?= $this->Html->link(__('Jobs'), ['controller' => 'Jobs', 'action' => 'index'], ['class' => 'button float-right']) ?>
    <h3><?= __('Jobmappings') ?></h3>

    <div class="table-responsive">
	    <table>
	        <tr>
	            <th><?= $this->Paginator->sort('id') ?></th>
	            <th><?= $this->Paginator->sort('extension') ?></th>
	            <th><?= $this->Paginator->sort('clientcode') ?></th>
	            <th><?= $this->Paginator->sort('subjob') ?></th>
	            <th><?= $this->Paginator->sort('areacode') ?></th>
	            <th><?= $this->Paginator->sort('areaname') ?></th>
	            <th><?= $this->Paginator->sort('centercode') ?></th>
	            <th><?= $this->Paginator->sort('centername') ?></th>
	            <th><?= $this->Paginator->sort('job_id') ?></th>
	            <th><?= $this->Paginator->sort('created') ?></th>
	            <th><?= $this->Paginator->sort('modified') ?></th>
	        </tr>

	        <?php foreach ($jobmappings as $jobmapping): ?>
	        <tr>
	            <td>
	                <?= h($jobmapping->id) ?>
	            </td>
	            <td>
	                <?= h($jobmapping->extension) ?>
	            </td>
	            <td>
	                <?= h($jobmapping->clientcode) ?>
	            </td>
	            <td>
	                <?= h($jobmapping->subjob) ?>
	            </td>
	            <td>
	                <?= h($jobmapping->areacode) ?>
	            </td>
	            <td>
	                <?= h($jobmapping->areaname) ?>
	            </td>
	            <td>
	                <?= h($jobmapping->centercode) ?>
	            </td>
	            <td>
	                <?= h($jobmapping->centername) ?>
	            </td>
	            <td>
	                <?= $jobmapping->has('job') ? h($jobmapping->job->name) : '' ?>
	            </td>
	            <td>
	                <?= h($jobmapping->created) ?>
	            </td>
	            <td>
	                <?php if (isset($jobmapping->modified)) { ?>
	                    <?= h($jobmapping->modified) ?>
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

