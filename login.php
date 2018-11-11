<?php include "inc/header.php";?>
<?php
   require "inc/check-login.php";
   include "validation/login-validation.php";

   $erroremail = "";
   $erropass = "";
   $email = "";
   $password = "";
   $error = false;
   $dntfound = "";
   if (isset($_POST['login'])) {
       $email = $_POST['email'];
       $password = $_POST['password'];
       if (empty($email)) {
           $erroremail = "User Id cant be empty";
           $error = true;
       }
       if (empty($password)) {
           $erropass = "Password cant be empty";
           $error = true;
       }
       if (!empty($id) and !validateEmail()) {

           $erroremail = "Email Can't Be validated";
           $error = true;

       }

       if (!$error) {
           $xml = simplexml_load_file("xml/user.xml") or die("Not Found");
           foreach ($xml as $row) {
               if ($row->email == $email && $row->password == $password) {
                   $_SESSION["email"] = (string)$row->email;
                   $_SESSION["name"] = (string)$row->name;
                   header("Location: backend/main.php");
               }
           }
           $dntfound = "Email or Password did not matched";
           $error = true;

       }

   }

   ?>
<span style="color:red"><?php echo $erroremail; ?></span>
<div style='width:400px; margin:150px auto;'>
<form action="login.php" method="POST">
   <h1>Sign In </h1>
   <hr>
   <table>
      <tr>
         <td>Email</td>
         <td><input type="text" name="email"/>
            <span style="color:red"><?php echo $erroremail; ?></span>
         </td>
      </tr>
      <tr>
         <td>Password</td>
         <td><input type="password" name="password" />
            <span style="color:red"><?php echo $erroremail; ?></span>
         </td>
      </tr>
      <tr>
         <td><input type="submit" name="login" value="Login" /></td>
      </tr>
   </table>
</form>
<?php include "inc/footer.php";?>