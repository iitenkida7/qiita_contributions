<?php
require_once('../qiita.php');

header('content-type: application/json; charset=utf-8');
if ($_GET['users']){
    $users = explode(',', htmlspecialchars($_GET['users']));
    echo (new GetQiitaLikes)->run($users);
} else {
    echo '{ "msg" : "err"}';
}
