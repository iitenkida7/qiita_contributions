<?php

require_once('./qiita.php');

$users = explode(',', htmlspecialchars($argv[1]));

echo (new GetQiitaLikes)->run($users);

