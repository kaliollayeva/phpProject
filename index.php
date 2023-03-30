<?php
    include "config/base_url.php";
    include "config/db.php";

    $sql = "SELECT b.*, u.nickname FROM blogs b
            LEFT OUTER JOIN users u ON b.author_id=u.id";

    $query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>main</title>
    <?php
        include "views/head.php";
    ?>
</head>
<body>

    <section class="section-main">

        <?php
        include "views/header.php";
        ?>

        <div class="center">
            <div> 
                <img src="images/main.jpg" alt="">
            </div>
            <div>
                <h1 class="h1">Societies of Photographers</h1>
                <h3 class="h3">are a group of organisations incorporating the interests of all aspects of photography. The membership is open to full-time professional, semi-professional and the serious enthusiast.</h3>
                <a  href="#more">
                    <button class="button">Learn More</button>
                </a>
            </div>
        </div> 

        <div class="bottom">
            <a href="https://www.instagram.com/p/CpK6s8_j8zj/?utm_source=ig_web_copy_link"><img src="images/insta.png" alt=""></a>
            <a href="https://wa.me/87478200368?text=%D0%9F%D1%80%D0%B8%D0%B2%D0%B5%D1%82!%20%F0%9F%91%8B%20%D0%9C%D0%B5%D0%BD%D1%8F%20%D0%B8%D0%BD%D1%82%D0%B5%D1%80%D0%B5%D1%81%D1%83%D0%B5%D1%82..."><img src="images/chat.png" alt=""></a>
        </div>
        
        <div class="black"></div>  
    </section>

    <section class="more" id="more">
        <div class="more-description">
            <h2 class="h2">This photo gallery serves the following purposes:</h2>
            <div>
                <p>inspire</p>
                <p>collect ideas</p>
                <p>share ar</p>
                <p>sell pictures</p>
                <p>sell your service</p>
                <p>find your like-minded people</p>                         
            </div>
        </div>
        
        <div class="counter">
                <h2> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae nostrum in consectetur exercitationem aut facilis sint nemo laudantium officiis, et pariatur voluptate vero vel cum!</h2>
            <div class="counter-div">
                <div class="counter-item">
                    <h4 class="number h1" data-num="1565555">0</h4>
                    <h3 class="h3"> blogs</h3>
                </div>
                <div class="counter-item">
                    <h4 class="number h1" data-num="100000">0</h4>
                    <h3 class="h3"> users</h3>
                </div>
                <div class="counter-item">
                    <h4 class="number h1" data-num="160">0</h4>
                    <h3 class="h3"> countries</h3>
                </div>
            </div>
        </div>

        <div class="user-blogs blog-index">
            <div class="blog-list">
                <?php
                    if(mysqli_num_rows($query)>0){
                        while($blog = mysqli_fetch_assoc($query)){
                            if($blog['nickname'] == $_SESSION['nickname']){
                ?>
                                <div class="blog-head h1">
                                    My blog 
                                    <button class="button delete">
                                        <a href="<?=$BASE_URL?>/api/blog/delete.php?id=<?=$blog['id']?>">Delete</a>
                                    </button>
                                </div>
                <?php              
                            } else{
                ?>
                                <div class="blog-head h1">Blog of <a href="<?=$BASE_URL?>/profile.php?nickname=<?=$blog['nickname']?>"><?=$blog['nickname']?></a> </div>
                <?php
                            }
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

                            <div class="blog-description padd">
                                <h2 class="h2"> <?=$blog['title']?></h2>
                                <h3 class="h3"> <?=$blog['description']?></h3>
                            </div>

                            <div class="blog-bottom"></div>
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

    <div class="modal-register" id="modal-register">
        <div class="modal-background" onclick="closeRegister()"></div>
        <div class="modal-inner">
            <h2 class="h2">Registration</h2>
            <form action="<?=$BASE_URL?>/api/user/signup.php" method="POST">
                <fieldset class="fieldset">
                    <input class="input" type="text" name="email" placeholder="write email">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" type="text" name="full_name" placeholder="write full name">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" type="text" name="nickname" placeholder="write nickname">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" type="text" name="password" placeholder="write password">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" type="text" name="password2" placeholder="repeat password">
                </fieldset>
                <fieldset class="fieldset">
                    <button class="button" type="submit">register</button>
                </fieldset>
            </form>

            <?php
                if(isset($_GET['error']) && $_GET['error'] == "notfound"){
            ?>
                <script>
                    alert("You have successfully registered")
                </script>
            <?php
                }
            ?>
        </div>
    </div>

    <div class="modal-login" id="modal-login">
        <div class="modal-background" onclick="closeLogin()"></div>
        <div class="modal-inner">
            <h2 class="h2">Sign in</h2>
            <form action="<?=$BASE_URL?>/api/user/signin.php" method="POST">
                <fieldset class="fieldset">
                    <input class="input" type="text" name="email" placeholder="write email">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" type="text" name="password" placeholder="write password">
                </fieldset>

                <fieldset class="fieldset">
                    <button class="button" type="submit">Log in</button>
                </fieldset>
            </form>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js" integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script>  
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>  
<script type="text/javascript" src="slick/slick.min.js"></script>
     
<script src="js/slider.js"></script>
<script src="js/scroll.js"></script>
<script src="js/counter.js"></script>
<script src="js/modal.js"></script>


</body>
</html>