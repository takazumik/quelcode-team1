<?php

use Cake\Routing\Router;

$url = Router::url(['controller' => 'Users', 'action' => 'verify', $user->tokenGenerate()], true);
?>
<p>メールアドレスを認証をするために以下のURLにアクセスしてください。</p>
<a><?= $url ?></a>
