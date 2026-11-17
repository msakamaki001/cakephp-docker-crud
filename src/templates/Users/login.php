<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>ログイン</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend>メールアドレスとパスワードを入力してください</legend>
        <?= $this->Form->control('email',['required' => true, 'label' => 'メールアドレス']) ?>
        <?= $this->Form->control('password',['required' => true, 'label' => 'パスワード']) ?>
    </fieldset>
    <?= $this->Form->submit('ログイン') ?>
    <?= $this->Form->end() ?>
</div>