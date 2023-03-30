<?php
    include "config/base_url.php";
    include "config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>edit profile</title>

    <?php
        include "views/head.php";
    ?>
</head>
<body>

    <?php
    include "views/header.php";
    ?>

    <?php
        $id=$_SESSION['id'];
        $query = mysqli_query($con,
        "SELECT * FROM users WHERE id=$id");
        $row=mysqli_fetch_assoc($query);
    ?>

    <section class="profile">
        <div class="editing">
            <h1 class="h1">Editing users info</h1>

            <form action="<?=$BASE_URL?>/api/user/edit_profile.php" method="POST" enctype="multipart/form-data">
                <fieldset class="fieldset">
                    <input class="input" name="full_name" type="text" value="<?=$row['full_name']?>">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" name="nickname" type="text" value="<?=$row['nickname']?>">
                </fieldset>

                <fieldset class="fieldset">
                    <button class="button newImg input-file">
                        <input name="image" type="file">
                        choose image
                    </button>
                </fieldset>

                <fieldset class="fieldset">
                    <textarea name="personal"  cols="30" rows="10" placeholder="personal info"  class="input " type="text"></textarea>
                </fieldset>
                <fieldset class="fieldset">
                    <textarea name="professional" cols="30" rows="10" placeholder="professional info"  class="input input-textarea" type="text"></textarea>
                </fieldset>

                <fieldset class="fieldset">
                    <button class="button" type="submit">renew</button>
                </fieldset>
                
            </form>

        </div>

    </section>
</body>
</html>