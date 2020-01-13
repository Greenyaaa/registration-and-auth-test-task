<?php

/*
Форма регистрации
*/



$errors = array();

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$pass_confirm = filter_var(trim($_POST['pass_confirm']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$username = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$xml = simplexml_load_file("users.xml");

// if (file_exists($xml)) {
//     echo "Файл $xml существует";
// } else {
//     echo "Файл $xml не существует";
// }

    
    if(mb_strlen($login) < 3 || $login == '') {
        $errors[] = 'Недопустимая длина логина';
    } else if (file_exists('users/' . $username . '.xml')) {
        $errors[] = 'Такой пользователь уже существует';
    } else if (mb_strlen($pass) < 5 || $pass !== $pass_confirm) {
        $errors[] = 'Неправильно введён пароль';
    } else if (mb_strlen($email) < 5 || $email == '') {
        $errors[] = 'Недопустимый адресс почты';
    } else if(mb_strlen($username) < 1) {
        $errors[] = 'Недопустимое имя';
    } else if(count($errors) == 0) {
        // print_r($_POST); // проверка данных
        
        echo 'Добро пожаловать, ';
        echo $username; 
        $xml = new SimpleXMLElement('<user></user>');
        $xml->addChild('login', $login);
        $xml->addChild('password', md5($pass."3ifjh9fj9a"));
        $xml->addChild('email', $email);
        $xml->asXML('users/' . $username . 'xml');
        exit();
    }
    
    if(count ($errors) > 0) {
        echo '<ul>';
            foreach($errors as $e) {
                echo '<li>' . $e . '</li>';
            }
        echo '</ul>';
    }


// $newUser = $xml->addChild("User");
// $newUser->addChild("login", $_POST['login']);
// $xml->asXML('users.xml');
    
    
?>