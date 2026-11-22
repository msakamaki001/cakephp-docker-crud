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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $point->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $point->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Points'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="points form content">
            <?= $this->Form->create($point) ?>
            <fieldset>
                <legend><?= __('Edit Point') ?></legend>
                <?php
                    echo $this->Form->control('medical_details');
                    echo $this->Form->control('point');
                    echo $this->Form->control('updated_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
