<?php include "inc/header.php"; ?>
<hr>
<h1 style="text-align: center">Blog Posts</h1>
<hr>
<?php
$posts = simplexml_load_file("xml/blog.xml") or die("Not Found");
foreach ($posts as $post) :
    ?>
    <h3> <?php echo $post->title; ?> </h3>
    <div>
        <div>
            <img width="200" height="200" src="<?php echo SCRIPT_ROOT; ?>/backend/images/<?php echo $post->image; ?>"
                 alt="">
        </div>
        <div>
            <p> <?php echo $post->body; ?></p>
        </div>
    </div>
    <hr>


<?php endforeach; ?>

<hr>
<h1 style="text-align: center">Image Posts</h1>
<hr>
<div style="margin-bottom: 30px ">
<?php
$images = simplexml_load_file("xml/image.xml") or die("Not Found");
foreach ($images as $image) :
    ?>

        <div style="margin-left: 5px ;float: left;">

            <img width="200" height="200" src="<?php echo SCRIPT_ROOT; ?>/backend/images/<?php echo $image->image; ?>"
                 alt="">
            <h3> <?php echo $image->title; ?> </h3>
        </div>



<?php endforeach; ?>
</div>
<?php include "inc/footer.php"; ?>

