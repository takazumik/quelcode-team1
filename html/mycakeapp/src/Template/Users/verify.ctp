<?php

use Cake\Routing\Router;

$url = Router::url(['controller' => 'Users', 'action' => 'verify', $user->tokenGenerate()], true);
?>
メールアドレスを認証をするために以下のURLにアクセスしてください。
<?= $url ?>
