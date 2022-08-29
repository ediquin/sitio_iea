<?php
session_start();
include 'conexion.php';

if(isset($_POST['email'])&& isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($email)){
        header("Location: login.php?error=El correo es requerido");
    }elseif (empty($password)){
        header("Location: login.php?error=Contraseña requerida");
    }else{
        $stmt = $pdo -> prepare("SELECT * FROM admin WHERE email=?");
        $stmt->execute([$email]);
        if($stmt->rowCount() == 1){
            $user = $stmt->fetch();
            $user_id = $user['id'];
            $user_email = $user['email'];
            $user_name = $user['nombre_completo'];
            $user_password = $user['password'];

            if($email == $user_email){
                if(password_verify($password, $user_password)){
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_email'] = $user_email;
                    $_SESSION['user_password'] = $user_password;
                    $_SESSION['user_name'] = $user_name;
                    header("Location: index.php");
                }else{
                    header("Location: login.php?error=Correo electrónico o contraseña incorrectos");

                }
            }else{
                header("Location: login.php?error=Correo electrónico o contraseña incorrectos");
            }
        }else{
            header("Location: login.php?error=Correo electrónico o contraseña incorrectos");
        }
    }

}