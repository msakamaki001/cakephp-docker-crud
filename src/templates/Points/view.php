<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Point $point
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Point'), ['action' => 'edit', $point->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Point'), ['action' => 'delete', $point->id], ['confirm' => __('Are you sure you want to delete # {0}?', $point->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Points'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Point'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="points view content">
            <h3><?= h($point->medical_details) ?></h3>
            <table>
                <tr>
                    <th><?= __('Medical Details') ?></th>
                    <td><?= h($point->medical_details) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($point->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Point') ?></th>
                    <td><?= $this->Number->format($point->point) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Id') ?></th>
                    <td><?= $this->Number->format($point->updated_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($point->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($point->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Calcs') ?></h4>
                <?php if (!empty($point->calcs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('One Point Yen') ?></th>
                            <th><?= __('Out Of Pocket Medical Expenses') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Updated Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($point->calcs as $calc) : ?>
                        <tr>
                            <td><?= h($calc->id) ?></td>
                            <td><?= h($calc->one_point_yen) ?></td>
                            <td><?= h($calc->out_of_pocket_medical_expenses) ?></td>
                            <td><?= h($calc->created) ?></td>
                            <td><?= h($calc->modified) ?></td>
                            <td><?= h($calc->updated_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Calcs', 'action' => 'view', $calc->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Calcs', 'action' => 'edit', $calc->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Calcs', 'action' => 'delete', $calc->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $calc->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>