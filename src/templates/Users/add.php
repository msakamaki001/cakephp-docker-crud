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
                <legend><?= __('ユーザー新規登録') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => '名前']);
                    echo $this->Form->control('email', ['label' => 'メールアドレス']);
                    echo $this->Form->control('password', ['label' => 'パスワード']);
                    // type はテキスト入力でもプルダウンでもOK（プルダウンにすると打ち間違いが防げます！）
                    echo $this->Form->control('type', [
                        'label' => '権限（タイプ）',
                        'options' => ['admin' => '管理者 (admin)', 'user' => '利用者 (user)']
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('登録する')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>