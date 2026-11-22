<!-- Delete User Form -->
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('ユーザー削除') ?></legend>
                <p><?= __('本当にこのユーザーを削除してもよろしいですか？') ?></p>
            </fieldset>
            <?= $this->Form->button(__('削除する')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>