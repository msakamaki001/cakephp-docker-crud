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
                    <div class="top-nav-links">
            <?php
            $loginUser = $this->request->getAttribute('identity');
            ?>

            <?php if ($loginUser): ?>
                <!-- ▼ 全スタッフ共通の業務メニュー ▼ -->
                <?= $this->Html->link('会計計算', ['controller' => 'Calcs', 'action' => 'index']) ?>
                <?= $this->Html->link('患者一覧', ['controller' => 'Patients', 'action' => 'index']) ?>
                <?= $this->Html->link('点数マスタ', ['controller' => 'Points', 'action' => 'index']) ?>

                <!-- ▼ 管理者（admin）だけに見えるメニュー ▼ -->
                <?php if ($loginUser->get('type') === 'admin'): ?>
                    <?= $this->Html->link('スタッフ管理', ['controller' => 'Users', 'action' => 'index']) ?>
                <?php endif; ?>

                <!-- ▼ ログイン者名とログアウト ▼ -->
                <span style="margin-left: 15px; margin-right: 10px; font-weight: bold;">
                    👤 <?= h($loginUser->get('name')) ?>
                    <?php if ($loginUser->get('type') === 'admin'): ?>
                        <span style="background: #d33c43; color: #fff; padding: 2px 6px; border-radius: 4px; font-size: 0.8em;">管理者</span>
                    <?php endif; ?>
                </span>

                <?= $this->Html->link('ログアウト', ['controller' => 'Users', 'action' => 'logout']) ?>

            <?php else: ?>
                <!-- ▼ 未ログイン時 ▼ -->
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
