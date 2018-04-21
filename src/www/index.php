<?php
require_once('../qiita.php');

$users = explode(',', htmlspecialchars($_GET['users']);)    
echo (new GetQiitaLikes)->run($users);
