<?php
    include "config/base_url.php";
    include "config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>new blog</title>
    <?php
        include "views/head.php";
    ?>
</head>
<body>
    <?php
        include "views/header.php";
    ?>
    
    <section class="profile">
        <div class="editing">
            <h1 class="h1">Adding new blog</h1>

            <form action="<?=$BASE_URL?>/api/blog/add.php" method="POST" enctype="multipart/form-data">
                <fieldset class="fieldset">
                    <input class="input" name="title" type="text" placeholder="title">
                </fieldset>

                <fieldset class="fieldset">
                    <button class="button newImg input-file">
                        <input name="image1" type="file">
                        choose image
                    </button>
                </fieldset>
                <fieldset class="fieldset">
                    <button class="button newImg input-file">
                        <input name="image2" type="file">
                        choose image
                    </button>
                </fieldset>
                <fieldset class="fieldset">
                    <button class="button newImg input-file">
                        <input name="image3" type="file">
                        choose image
                    </button>
                </fieldset>
                <fieldset class="fieldset">
                    <button class="button newImg input-file">
                        <input name="image4" type="file">
                        choose image
                    </button>
                </fieldset>
                <fieldset class="fieldset">
                    <button class="button newImg input-file">
                        <input name="image5" type="file">
                        choose image
                    </button>
                </fieldset>
                <fieldset class="fieldset">
                    <button class="button newImg input-file">
                        <input name="image6" type="file">
                        choose image
                    </button>
                </fieldset>

                <fieldset class="fieldset">
                    <textarea name="description"  cols="30" rows="10" placeholder="description"  class="input " type="text"></textarea>
                </fieldset>

                <fieldset class="fieldset">
                    <button class="button" type="submit">ready</button>
                </fieldset>
                
            </form>

        </div>

    </section>

</body>
</html>