<?php

/*
    Форма авторизации
*/

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 3) {
    echo "Недопустимая длина логина";
    exit();
} else if (mb_strlen($pass) < 5) {
    echo "Неверно введён пароль";
    exit();
} 

//     session_start([
//         'cookie_lifetime' => 86400,
//     ]);

if(null !== ($_POST('auth-btn'))){
    $username = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING, $_POST[username]);
    $pass = md5($_POST['password']);
    if(file_exists('users/' . $username . 'xml')){
        $xml = SimpleXMLElement('users/' . $username . 'xml', 0 , true);
        print_r($xml);
    }
}



?>