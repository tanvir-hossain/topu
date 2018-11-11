<?php include "inc/header.php";?>
<?php
$xml = simplexml_load_file("xml/user.xml") or die("Not Found");

include "validation/login-validation.php";
include "inc/functions.php";
$error = false;
$erroremail = "";
$erropass = "";
$errocpass = "";
$erroremail = "";
$errorname = "";
$errorusertype = "";
$success = "";

$email = "";
$password = "";
$cpassword = "";
$name = "";
$email = "";
$usertype = "";
if (isset($_POST['register'])) {
    //validation all fields
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    if (empty($email)) {
        $erroremail = "User Id cant be empty";
        $error = true;
    }
    if (empty($password)) {
        $erropass = "Password cant be empty";
        $error = true;
    }
    if (empty($cpassword)) {
        $errocpass = "Confirm Password cant be empty";
        $error = true;
    }
    if (empty($name)) {
        $errorname = "Name cant be empty";
        $error = true;
    }
    if (empty($email)) {
        $erroremail = "Email cant be empty";
        $error = true;
    }
    if ($password != $cpassword) {
        $erropass = "Password didn't match";
        $errocpass = "Password didn't match";
        $error = true;
    }
    if (!empty($name) and !validateName()) {

        $errorname = "Name Can't Be validated";
        $error = true;

    }
    if (!empty($email) and !validateEmail()) {

        $erroremail = "Email Can't Be validated";
        $error = true;

    }
    if (!empty($email) and !validateEmail()) {

        $erroremail = "Email Can't Be validated";
        $error = true;

    }


    if (!$error) {
        addUser($name,$password,$email,'author');
        $success = "Successfully Registered";
    }


}


?>



<center>
    <form method="post" action="">
        <span style="color: blue"><?php echo $success;?></span>
        <table>
            <tr>
                <td>
                    <fieldset>
                        <legend>Registration</legend>
                        Name <br/><input type="text" value="<?php echo $name; ?>" name="name"> <font
                            color="red"><?php echo $errorname; ?></font><br/></br/>
                        Password <br/><input type="text" value="<?php echo $password; ?>" name="password"/> <span><font
                                color="red"><?php echo $erropass; ?></font></span><br/>
                        Confirm Password <br/> <input type="text" value="<?php echo $cpassword; ?>" name="cpassword"/>
                        <font color="red"><?php echo $erropass; ?></font><br/>

                        Email <br/> <input type="text" value="<?php echo $email; ?>" name="email"><font
                            color="red"><?php echo $erroremail; ?></font> <br/></br/>
			<hr/>
			<input type="submit" name="register" value="Register"/>
            <a href="index.php">BACK</a>
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>
</center>

<?php include "inc/footer.php";?>
