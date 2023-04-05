<?php
    include "../../config/base_url.php";
    include "../../config/db.php";

    if(isset($_POST['title'], $_POST['description']) &&
        strlen($_POST['title']) > 0 &&
        strlen($_POST['description']) > 0){
            echo "!!! 1 <br>";
            $title = $_POST['title'];
            $desc = $_POST['description'];

            session_start();
            $author_id = $_SESSION['id'];


            $prep = mysqli_prepare($con,
            "INSERT INTO blogs (title, description, author_id)
            VALUES (?, ?, ?)");

            mysqli_stmt_bind_param($prep, "ssi", $title, $desc, $author_id);
            mysqli_execute($prep);

            $newid= mysqli_stmt_insert_id($prep);


            if(isset($_FILES['image1'], $_FILES['image1']['name']) &&
                strlen($_FILES['image1']['name']) > 0){
                $ext1 = end(explode(".", $_FILES['image1']['name']));
                
                $image_name1 =time().$newid."1.".$ext1;
                
                move_uploaded_file($_FILES['image1']['tmp_name'],
                "../../images/blogs/$image_name1");
                
                $path1 = "images/blogs/$image_name1";
                
                
                $prep = mysqli_prepare($con,
                "UPDATE blogs SET img1=? WHERE id=?");
                
                mysqli_stmt_bind_param($prep, "si",$path1, $newid);
                mysqli_execute($prep);
            }
        
            if(isset($_FILES['image2'], $_FILES['image2']['name']) &&
                strlen($_FILES['image2']['name']) > 0){
                $ext2 = end(explode(".", $_FILES['image2']['name']));
                
                $image_name2 =time().$newid."2.".$ext2;
                
                move_uploaded_file($_FILES['image2']['tmp_name'],
                "../../images/blogs/$image_name2");
                
                $path2 = "images/blogs/$image_name2";
                
                $prep = mysqli_prepare($con,
                "UPDATE blogs SET img2=? WHERE id=?");
                
                mysqli_stmt_bind_param($prep, "si",$path2, $newid);
                mysqli_execute($prep);        
            }

            if(isset($_FILES['image3'], $_FILES['image3']['name']) &&
                strlen($_FILES['image3']['name']) > 0){
                $ext3 = end(explode(".", $_FILES['image3']['name']));
                
                $image_name3 =time().$newid."3.".$ext3;
                
                move_uploaded_file($_FILES['image3']['tmp_name'],
                "../../images/blogs/$image_name3");
                
                $path3 = "images/blogs/$image_name3";
                
                
                $prep = mysqli_prepare($con,
                "UPDATE blogs SET img3=? WHERE id=?");
                
                mysqli_stmt_bind_param($prep, "si",$path3, $newid);
                mysqli_execute($prep);
            }


            if(isset($_FILES['image4'], $_FILES['image4']['name']) &&
                strlen($_FILES['image4']['name']) > 0){
                $ext4 = end(explode(".", $_FILES['image4']['name']));
                
                $image_name4 =time().$newid."4.".$ext4;
                
                move_uploaded_file($_FILES['image4']['tmp_name'],
                "../../images/blogs/$image_name4");
                
                $path4 = "images/blogs/$image_name4";
                
                
                $prep = mysqli_prepare($con,
                "UPDATE blogs SET img4=? WHERE id=?");
                
                mysqli_stmt_bind_param($prep, "si",$path4, $newid);
                mysqli_execute($prep);
            }

            if(isset($_FILES['image5'], $_FILES['image5']['name']) &&
                strlen($_FILES['image5']['name']) > 0){
                $ext5 = end(explode(".", $_FILES['image5']['name']));
                
                $image_name5 =time().$newid."5.".$ext5;
                
                move_uploaded_file($_FILES['image5']['tmp_name'],
                "../../images/blogs/$image_name5");
                
                $path5 = "images/blogs/$image_name5";
                
                
                $prep = mysqli_prepare($con,
                "UPDATE blogs SET img5=? WHERE id=?");
                
                mysqli_stmt_bind_param($prep, "si",$path5, $newid);
                mysqli_execute($prep);
            }


            if(isset($_FILES['image6'], $_FILES['image6']['name']) &&
                strlen($_FILES['image6']['name']) > 0){
                $ext6 = end(explode(".", $_FILES['image6']['name']));

                $image_name6 =time().$newid."6.".$ext6;

                move_uploaded_file($_FILES['image6']['tmp_name'],
                "../../images/blogs/$image_name6");

                $path6 = "images/blogs/$image_name6";

                $prep = mysqli_prepare($con,
                "UPDATE blogs SET img6=? WHERE id=?");

                mysqli_stmt_bind_param($prep, "si",$path6, $newid);
                mysqli_execute($prep);

            }
            $nickname = $_SESSION['nickname'];

            header("Location: $BASE_URL/profile.php?nickname=$nickname");
        }else{
            echo "!!! 4 <br>";
            header("Location: $BASE_URL/newblog.php?error=1");
        }
?>