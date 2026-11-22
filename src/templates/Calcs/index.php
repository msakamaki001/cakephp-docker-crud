<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Calc> $calcs
 */
?>
<div class="calcs index content">
    <?= $this->Html->link(__('New Calc'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Calcs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('point_id') ?></th>
                    <th><?= $this->Paginator->sort('one_point_yen') ?></th>
                    <th><?= $this->Paginator->sort('out_of_pocket_medical_expenses') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('updated_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($calcs as $calc): ?>
                <tr>
                    <td><?= $this->Number->format($calc->id) ?></td>
                    <td><?= $calc->hasValue('point') ? $this->Html->link($calc->point->medical_details, ['controller' => 'Points', 'action' => 'view', $calc->point->id]) : '' ?></td>
                    <td><?= $this->Number->format($calc->one_point_yen) ?></td>
                    <td><?= $this->Number->format($calc->out_of_pocket_medical_expenses) ?></td>
                    <td><?= h($calc->created) ?></td>
                    <td><?= h($calc->modified) ?></td>
                    <td><?= $this->Number->format($calc->updated_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $calc->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $calc->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $calc->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $calc->id),
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