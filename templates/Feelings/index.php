<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feeling[]|\Cake\Collection\CollectionInterface $feelings
 */
?>
<div class="feelings index content">
    <?= $this->Html->link(__('New Feeling'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Feelings') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feelings as $feeling): ?>
                <tr>
                    <td><?= $this->Number->format($feeling->id) ?></td>
                    <td><?= $feeling->has('user') ? $this->Html->link($feeling->user->name, ['controller' => 'Users', 'action' => 'view', $feeling->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($feeling->status_id) ?></td>
                    <td><?= h($feeling->created) ?></td>
                    <td><?= h($feeling->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $feeling->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $feeling->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $feeling->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feeling->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
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
