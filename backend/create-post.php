<?php require "../inc/header.php";?>
<?php require "../inc/functions.php";?>
<?php

$errorbody = "";
$errorimage = "";
$success = "";
    if(isset($_POST['blog-create'])){

        $error = false;
        if($_POST['body'] == ""){
            $errorbody = "Body Cant Be Empty";
            $error = true;
        }
        if(!$error){
            createBlogPost();
        }
    }
?>



<center>
    <?php
        if(!$error){
            echo $success;
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <h1>Create Post </h1>
        <hr>
        <table>
            <tr>
                <td>Body</td>
                <td><textarea name="body" cols="30" rows="10"></textarea>
                    <span style="color:red"><?php echo $errorbody; ?></span>
                </td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file"  name="image" accept="image/*" />
                    <span style="color:red"><?php echo $errorimage; ?></span>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="blog-create" value="Submit" /></td>
            </tr>
        </table>
    </form>
</center>

<?php require "../inc/footer.php";?>
