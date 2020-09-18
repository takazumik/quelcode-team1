<?php

use Cake\Routing\Router;

$url = Router::url(['controller' => 'Users', 'action' => 'verify', $user->tokenGenerate(), $user->user_id], true);
?>
<p>メールアドレスを認証をするために以下のURLにアクセスしてください。</p>
<?= $this->Html->link($url . '?user_id=' . $user->id) ?>
