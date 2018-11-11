<?php
//adding user
function addUser($name, $password, $email, $usertype)
{
    $xml = simplexml_load_file("./xml/user.xml") or die("Not Found");
    $user = $xml->addChild("user");
    $user->addChild('name', $name);
    $user->addChild('password', $password);
    $user->addChild('email', $email);
    $user->addChild('usertype', $usertype);
    $xml->saveXML("./xml/user.xml");
}

function createBlogPost()
{
    $title = $_POST['title'];
    $body = $_POST['body'];
    fileUpload();
    $xml = simplexml_load_file(SCRIPT_ROOT."/xml/blog.xml") or die("Not Found");
    $user = $xml->addChild("blog");
    $user->addChild('id', rand(1,2000000));
    $user->addChild('title', $title);
    $user->addChild('body', $body);
    if($_FILES['image']){
        $user->addChild('image', $_FILES["image"]["name"]);
    }
    else{
        $user->addChild('image','');
    }

    $user->addChild('user-email', $_SESSION['email']);
    $xml->saveXML("./../xml/blog.xml");

}

function createImagePost()
{
    $title = $_POST['title'];
    fileUpload();
    $xml = simplexml_load_file(SCRIPT_ROOT."/xml/image.xml") or die("Not Found");
    $user = $xml->addChild("blog");
    $user->addChild('id', rand(1,2000000));
    $user->addChild('title', $title);
    if($_FILES['image']){
        $user->addChild('image', $_FILES["image"]["name"]);
    }
    else{
        $user->addChild('image','');
    }

    $user->addChild('user-email', $_SESSION['email']);
    $xml->saveXML("./../xml/image.xml");

}


function fileUpload()
{
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (isset($_FILES["image"])) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        } else {
            echo "Error";
        }
    }
}

?>