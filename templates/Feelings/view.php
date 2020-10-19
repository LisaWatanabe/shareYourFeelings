<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Feeling $feeling
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Feeling'), ['action' => 'edit', $feeling->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Feeling'), ['action' => 'delete', $feeling->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feeling->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Feelings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Feeling'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="feelings view content">
            <h3><?= h($feeling->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $feeling->has('user') ? $this->Html->link($feeling->user->name, ['controller' => 'Users', 'action' => 'view', $feeling->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($feeling->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status Id') ?></th>
                    <td><?= $this->Number->format($feeling->status_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($feeling->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($feeling->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
