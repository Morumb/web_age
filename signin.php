<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>log</title>
    <link rel="stylesheet" href="styley.css">
</head>
<body>
    <h1>Авторизация</h1>
    <?php
    $data=$_POST;
    $mysqli = new mysqli('localhost','root','','test');
    
    if(isset($data["vhod"]))
    {
        if(trim($data['login']==''))
        {
            $errors[]="<p>Введите логин!</p>";
        }
        if(trim($data['password']==''))
        {
            $errors[]="<p>Введите пароль!</p>";
        }
        if(empty($errors))
        {
            
            $login = $data['login'];
            $password = $data['password'];
            //$password = md5($password);
            $log = $mysqli->query("SELECT * FROM users WHERE Login='".$login."' and Password='".$password."'") ;
        
            $s=0;
            
            while($row = mysqli_fetch_assoc($log))
            {
                        $s=1;
                        $age = $row["Age"];
            }
            if($s==1)
            {
            echo $age;
            setcookie("T",$age);
            
            header('Location:age.php');
            }
            else
            {
            echo "<p>пользователь не найден</p>";
            }
            
        }
        else
        {
            echo "<p>".array_shift($errors)."</p>";
        }
    }
    ?>
    <form action="signin.php" method="post">
        <p>
            <input type="text" name="login" placeholder = "Ваш логин" value="<?php echo @$data['login']?>">
        </p>
        <p>
            <input type="password" name="password" placeholder="Ваш пароль">
        </p>
        <p>
            <button type="submit" name="vhod">войти</button>
        </p>
    </form>
</body>
</html>