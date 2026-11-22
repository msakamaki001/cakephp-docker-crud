<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient $patient
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Patient'), ['action' => 'edit', $patient->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Patient'), ['action' => 'delete', $patient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patient->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Patients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Patient'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="patients view content">
            <h3><?= h($patient->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Patient Number') ?></th>
                    <td><?= h($patient->patient_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($patient->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kana') ?></th>
                    <td><?= h($patient->kana) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($patient->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Insurance Rate') ?></th>
                    <td><?= $this->Number->format($patient->insurance_rate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Id') ?></th>
                    <td><?= $patient->updated_id === null ? '' : $this->Number->format($patient->updated_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Birth Date') ?></th>
                    <td><?= h($patient->birth_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($patient->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($patient->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Calcs') ?></h4>
                <?php if (!empty($patient->calcs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Point Id') ?></th>
                            <th><?= __('One Point Yen') ?></th>
                            <th><?= __('Out Of Pocket Medical Expenses') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Updated Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($patient->calcs as $calc) : ?>
                        <tr>
                            <td><?= h($calc->id) ?></td>
                            <td><?= h($calc->point_id) ?></td>
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