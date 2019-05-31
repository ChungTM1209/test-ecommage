<?php

use Controller\UserController;

require "../model/User.php";
require "../model/UserTable.php";
require "../model/DBConnection.php";
require "../controller/UserController.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>


<script>
// $(document).ready(function(){
// 	$("#submit").click(function(){
// 		$.ajax({
// 			type: 'post',
// 			url: 'loginController.php',
// 			data: {email: $("#email").val(),
//                     password: $("#password").val()},
//             success: function (response) {
//                 var msg = "";
//                 window.location.replace("afterLogin.php") ;
//                 // if(response === 1){
//                 //     window.location.replace("afterLogin.php") ;
//                 // }else{
//                 //     msg = "Invalid username and password!";
//                 // }
//                 // $("#message").html(msg);
//             }
// 		})
//
// 	});
// });
</script>
</head>
<body>
<h1>Login</h1>
<form method="post">
	<label>email
		<input id="email" type="text" name="email">
	</label>
	<label>Password
		<input type="password" id="password" name="password">
	</label>
	<button type="submit" id="submit">login</button>
    <p id="message"></p>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $controller = new UserController();
    session_start();
    $email = $_POST['email'];
    $password = $_POST["password"];
    if ($controller->login($email, $password)) {
        $_SESSION['email'] = $_POST['email'];
        header('Location: afterLogin.php');
    } else {
        echo "Sai ten tai khoan hoac mat khau";

    }
}


?>

</body>
</html>
