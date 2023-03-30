<?php
    include "../../config/base_url.php";
    include "../../config/db.php";

    if(isset($_POST['email'], $_POST['password']) &&
            strlen($_POST['email']) > 0 &&
            strlen($_POST['password']) > 0){
                
                $email = $_POST['email'];
                $password = $_POST['password'];
                $hash = sha1($password);

                $prep = mysqli_prepare($con,
                        "SELECT id, nickname, full_name FROM users WHERE email = ? AND password = ?");
                mysqli_stmt_bind_param($prep, "ss", $email, $hash);
                mysqli_execute($prep);

                $user = mysqli_stmt_get_result($prep);

                $row = mysqli_fetch_assoc($user);

                if(mysqli_num_rows($user) == 0){
                    header("Location: $BASE_URL/index.php?error=4");
                    exit();
                }

                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['nickname'] = $row['nickname'];
                $_SESSION['full_name'] = $row['full_name'];
                
                $nickname = $row['nickname'];

                header("Location: $BASE_URL/profile.php?nickname=$nickname");
            }else{
                header("Location: $BASE_URL/index.php?error=4");
            }

?>