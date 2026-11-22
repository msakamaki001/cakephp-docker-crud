<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Calc $calc
 * @var string[]|\Cake\Collection\CollectionInterface $points
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $calc->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $calc->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Calcs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="calcs form content">
            <?= $this->Form->create($calc) ?>
            <fieldset>
                <legend><?= __('Edit Calc') ?></legend>
                <?php
                    echo $this->Form->control('point_id', ['options' => $points]);
                    echo $this->Form->control('one_point_yen');
                    echo $this->Form->control('out_of_pocket_medical_expenses');
                    echo $this->Form->control('updated_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
