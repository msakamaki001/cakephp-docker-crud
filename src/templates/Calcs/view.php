<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Calc $calc
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Calc'), ['action' => 'edit', $calc->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Calc'), ['action' => 'delete', $calc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calc->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Calcs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Calc'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="calcs view content">
            <h3><?= h($calc->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Point') ?></th>
                    <td><?= $calc->hasValue('point') ? $this->Html->link($calc->point->medical_details, ['controller' => 'Points', 'action' => 'view', $calc->point->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($calc->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('One Point Yen') ?></th>
                    <td><?= $this->Number->format($calc->one_point_yen) ?></td>
                </tr>
                <tr>
                    <th><?= __('Out Of Pocket Medical Expenses') ?></th>
                    <td><?= $this->Number->format($calc->out_of_pocket_medical_expenses) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Id') ?></th>
                    <td><?= $this->Number->format($calc->updated_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($calc->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($calc->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>