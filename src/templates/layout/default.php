<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>">アプリ</a>
        </div>
        <div class="top-nav-links">
            <?php
            $loginUser = $this->request->getAttribute('identity');
            ?>

            <?php if ($loginUser): ?>
                <!-- ▼ ここは「ログイン中（$loginUser が null ではない時）」だけ動く！ ▼ -->
                <span style="margin-right: 15px; font-weight: bold;">
                    👤 <?= h($loginUser->get('name')) ?> さん
                    <?php if ($loginUser->get('type') === 'admin'): ?>
                        <span style="background: #d33c43; color: #fff; padding: 2px 6px; border-radius: 4px; font-size: 0.8em;">管理者</span>
                    <?php endif; ?>
                </span>

                <?php if ($loginUser->get('type') === 'admin'): ?>
                    <?= $this->Html->link('ユーザー一覧', ['controller' => 'Users', 'action' => 'index']) ?>
                <?php endif; ?>

                <?= $this->Html->link('ログアウト', ['controller' => 'Users', 'action' => 'logout']) ?>

            <?php else: ?>
                <!-- ▼ ログアウト後・未ログイン時はこっちだけが動く！ ▼ -->
                <?= $this->Html->link('ログイン', ['controller' => 'Users', 'action' => 'login']) ?>
                <?= $this->Html->link('新規登録', ['controller' => 'Users', 'action' => 'add']) ?>
            <?php endif; ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
