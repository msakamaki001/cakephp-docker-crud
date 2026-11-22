<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Point> $points
 */
?>
<div class="points index content">
    <?= $this->Html->link(__('New Point'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Points') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('medical_details') ?></th>
                    <th><?= $this->Paginator->sort('point') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('updated_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($points as $point): ?>
                <tr>
                    <td><?= $this->Number->format($point->id) ?></td>
                    <td><?= h($point->medical_details) ?></td>
                    <td><?= $this->Number->format($point->point) ?></td>
                    <td><?= h($point->created) ?></td>
                    <td><?= h($point->modified) ?></td>
                    <td><?= $this->Number->format($point->updated_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $point->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $point->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $point->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $point->id),
                            ]
                        ) ?>
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