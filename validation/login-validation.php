<?php

function validateName()
{
    $name = $_POST['name'];
    if (empty($name)) {

        return false;

    } else if (count(explode(' ', $name)) < 2) {


        return false;

    } else if (!preg_match("/^[a-zA-Z \.\-]*$/", $name)) {


        return false;
    } else if (!preg_match("/^[a-zA-Z]*$/", $name[0])) {


        return false;
    } else {

        return true;
    }
}

function validateEmail()
{
    $email = '';

    if (isset($_POST['email'])) {

        $email = $_POST['email'];
    }

    if (empty($email)) {

        return false;

    }
    if (count(explode('@', $email)) != 2) {

        return false;

    } else {

        $words = explode('@', $email);
        $second = $words[1];
        if (count(explode('.', $email)) != 2) {

            return false;

        }

    }
    return true;

}

?>