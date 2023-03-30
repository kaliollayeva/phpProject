<?php
    include "../../config/base_url.php";
    include "../../config/db.php";

    if(isset($_POST['full_name'], 
            $_POST['nickname'],
            $_POST['personal'],
            $_POST['professional']) &&
            strlen($_POST['full_name']) > 0 &&
            strlen($_POST['nickname']) > 0 &&
            strlen($_POST['personal']) > 0 &&
            strlen($_POST['professional']) > 0 ){
                $full_name = $_POST['full_name'];
                $nickname = $_POST['nickname'];
                $personal = $_POST['personal'];
                $professional = $_POST['professional'];

                session_start();
                $id = $_SESSION['id'];

                if(isset($_FILES['image'], $_FILES['image']['name']) &&
                    strlen($_FILES['image']['name']) > 0 ){

                        $query = mysqli_query($con,
                        "SELECT img FROM users WHERE id=$id");

                        if(mysqli_num_rows($query) >0){
                            $row = mysqli_fetch_assoc($query);
                            $old_path = __DIR__."../../".$row['img'];
                            if(file_exists($old_path)){
                                unlink($old_path);
                            }

                        }

                        $ext = end(explode(".", $_FILES['image']['name']));
                        $image_name = time().".".$ext;
                        move_uploaded_file($_FILES['image']['tmp_name'],
                        "../../images/users/$image_name");
                        $path = "images/users/".$image_name;

                        $prep = mysqli_prepare($con,
                        "UPDATE users SET full_name=?, nickname=?, personal=?, professional=?, img=?
                        WHERE id=?");
                        mysqli_stmt_bind_param($prep, "sssssi", $full_name, $nickname,
                        $personal, $professional, $path, $id);
                        mysqli_execute($prep);
                } else{

                $prep = mysqli_prepare($con,
                "UPDATE users SET full_name = ?, nickname = ?, personal = ?, professional = ?
                WHERE id = ?");
                mysqli_stmt_bind_param($prep, "ssssi", $full_name, $nickname,
                $personal, $professional, $id);
                mysqli_execute($prep);
                }
                $_SESSION['nickname'] = $nickname;
                $_SESSION['full_name'] = $full_name;

                header("Location: $BASE_URL/profile.php?nickname=$nickname");
    } else{
        header("Location: $BASE_URL/edit.php?error=1");
    }
?>