<?php
    include "config/base_url.php";
    include "config/db.php";

    $nickname = $_GET['nickname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>profile</title>
    <?php
        include "views/head.php";
    ?>
</head>
<body>

<?php
    include "views/header.php";
?>

<section class="profile">

    <?php
        if($nickname == $_SESSION['nickname']){
            $id = $_SESSION['id'];
            $currentUser = mysqli_query($con,
            "SELECT * FROM users WHERE id=$id");
            $user=mysqli_fetch_assoc($currentUser);
    ?>
            <div class="user">
                <div class="user-side">
                    <?php
                        if(!$user['img']==NULL){
                    ?>
                        <div class="avatar"> <img src="<?=$user['img']?>" alt=""></div>               
                    <?php
                        }else{
                    ?>
                        <div class="avatar"> <img src="images/slider1/disco.jpg" alt=""></div>
                    <?php
                        }
                    ?>
                    <h2><?=$nickname?></h2>
                    <a href="<?=$BASE_URL?>/edit.php" ><button class="button logout">Edit</button></a>
                </div>
                <div class="info-side">
                    <div class="user-info">
                        <h3>personal info</h3>
                        <p class="h3"><?=$user['personal']?></p>
                    </div>
                    <div class="user-info">
                        <h3>professional info</h3>
                        <p class="h3"><?=$user['professional']?></p>
                    </div>
                </div>
            </div>

    <?php
        }else{
            $prep8 = mysqli_prepare($con,
            "SELECT * FROM users WHERE nickname = ?");
            mysqli_stmt_bind_param($prep8, "s", $nickname);
            mysqli_stmt_execute($prep8);
            $user = mysqli_stmt_get_result($prep8);
            $user2 = mysqli_fetch_assoc($user);
    ?>
            <div class="user">
                <div class="user-side">
                    <?php
                        if(!$user2['img']==NULL){
                    ?>
                        <div class="avatar"> <img src="<?=$user2['img']?>" alt=""></div>               
                    <?php
                        }else{
                    ?>
                        <div class="avatar"> <img src="images/slider1/disco.jpg" alt=""></div>
                    <?php
                        }
                    ?>
                    <h2><?=$nickname?></h2>
                </div>
                <div class="info-side">
                    <div class="user-info">
                        <h3>personal info</h3>
                        <p class="h3"><?=$user2['personal']?></p>
                    </div>
                    <div class="user-info">
                        <h3>professional info</h3>
                        <p class="h3"><?=$user2['professional']?></p>
                    </div>
                </div>
            </div>
    <?php
        }
    ?>



    <div class="user-blogs">
        <div class="blog-head">
            <?php
                if($nickname == $_SESSION['nickname']){
            ?>
                <h2 class="h1"> My blogs</h2>
                <a href="<?=$BASE_URL?>/newblog.php"><button class="button">New blog</button></a>
            <?php
                } else{
            ?>
                <h2 class="h1">Blogs of <?=$nickname?></h2>
            <?php
                }
            ?>
        </div>

        <div class="blog-list">

            <?php
                $prep9 = mysqli_prepare($con,
                "SELECT b.*, u.nickname FROM blogs b
                LEFT OUTER JOIN users u ON b.author_id = u.id
                WHERE u.nickname = ?");

                mysqli_stmt_bind_param($prep9, "s", $nickname);
                mysqli_execute($prep9);

                $blogs = mysqli_stmt_get_result($prep9);

                if(mysqli_num_rows($blogs)>0){
                    while($blog = mysqli_fetch_assoc($blogs)){
            ?>

            <div class="slider">
                <div class="slider-photo">
                    <img src="<?=$BASE_URL?>/<?=$blog['img1']?>" alt="">
                    <div class="slider-photo-hidden" >
                        <div class="hidden-icon"> <img src="images/slider1/like.png" alt=""></div>
                        <div class="hidden-icon"> <img src="images/slider1/add.png" alt=""></div>
                    </div>
                </div>
                <div class="slider-photo">
                    <img src="<?=$BASE_URL?>/<?=$blog['img2']?>" alt="">
                    <div class="slider-photo-hidden">
                        <div class="hidden-icon"> <img src="images/slider1/like.png" alt=""></div>
                        <div class="hidden-icon"> <img src="images/slider1/add.png" alt=""></div>
                    </div>
                </div>
                <div class="slider-photo">
                    <img src="<?=$BASE_URL?>/<?=$blog['img3']?>" alt="">
                    <div class="slider-photo-hidden">
                        <div class="hidden-icon"> <img src="images/slider1/like.png" alt=""></div>
                        <div class="hidden-icon"> <img src="images/slider1/add.png" alt=""></div>
                    </div>
                </div>
                <div class="slider-photo">
                    <img src="<?=$BASE_URL?>/<?=$blog['img4']?>" alt="">
                    <div class="slider-photo-hidden">
                        <div class="hidden-icon"> <img src="images/slider1/like.png" alt=""></div>
                        <div class="hidden-icon"> <img src="images/slider1/add.png" alt=""></div>
                    </div>
                </div>
                <div class="slider-photo">
                    <img src="<?=$BASE_URL?>/<?=$blog['img5']?>" alt="">
                    <div class="slider-photo-hidden">
                        <div class="hidden-icon"> <img src="images/slider1/like.png" alt=""></div>
                        <div class="hidden-icon"> <img src="images/slider1/add.png" alt=""></div>
                    </div>
                </div>
                <div class="slider-photo">
                    <img src="<?=$BASE_URL?>/<?=$blog['img6']?>" alt="">
                    <div class="slider-photo-hidden">
                        <div class="hidden-icon"> <img src="images/slider1/like.png" alt=""></div>
                        <div class="hidden-icon"> <img src="images/slider1/add.png" alt=""></div>
                    </div>
                </div>
            </div>

            <div class="bottom-item">
                <div class="blog-description">
                    <h2 class="h2"> <?=$blog['title']?></h2>
                    <h3 class="h3"> <?=$blog['description']?></h3>
                </div>   

            <?php
                if($nickname == $_SESSION['nickname']){
            ?>
                <div class="remove">
                    <a href="<?=$BASE_URL?>/api/blog/delete.php?id=<?=$blog['id']?>"><button class="button delete">Delete</button></a>
                </div>
            <?php
                }
            ?>
   
            </div>


            <?php
                    }
                }else{
            ?>
                <p> 0 blogs</p>
            <?php
                }
            ?>

        </div>

    </div>

</section>


<script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js" integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script>  
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>  
<script type="text/javascript" src="slick/slick.min.js"></script>
     
<script src="js/slider.js"></script>

</body>
</html>