
<div class="header">
        <div> 
            <a href="<?=$BASE_URL?>/index.php">Home</a>
        </div>
    <?php
        if(isset($_SESSION['nickname'])){
            $id = $_SESSION['id'];
            $full_name = $_SESSION['full_name'];
    ?>
    
        <div>      
            <a href="<?=$BASE_URL?>/profile.php?nickname=<?=$_SESSION['nickname']?>">
                <?=$_SESSION['nickname']?>
            </a>
            <a href="<?=$BASE_URL?>/api/user/signout.php">
                Sign out
            </a>
        </div>

    <?php
        }else{
    ?>
        <div>
            <a onclick="openLogin()">
                Sign in
            </a>
            <a onclick="openRegister()">
                Sign up
            </a>
        </div>

    <?php
        }
    ?>
</div>    
