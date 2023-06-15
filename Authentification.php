<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		html { height: 100% }
::-moz-selection { background: #fe57a1; color: #fff; text-shadow: none; }
::selection { background: #fe57a1; color: #fff; text-shadow: none; }

.login {
  background: #eceeee;
  border: 1px solid #42464b;
  border-radius: 6px;
  height: 380px;

  margin-top: 10%;
  margin-bottom: 15%;
  width: 380px;

}
.login h1 {
  background-image: linear-gradient(top, #f1f3f3, #d4dae0);
  border-bottom: 1px solid #a6abaf;
  border-radius: 6px 6px 0 0;
  box-sizing: border-box;
  color: #727678;
  display: block;
  height: 43px;
  font: 600 14px/1 'Open Sans', sans-serif;
  padding-top: 14px;
  margin: 0;
  text-align: center;
  text-shadow: 0 -1px 0 rgba(0,0,0,0.2), 0 1px 0 #fff;
}
input[type="password"], input[type="text"] {
  background: url('http://i.minus.com/ibhqW9Buanohx2.png') center left no-repeat, linear-gradient(top, #d6d7d7, #dee0e0);
  border: 1px solid #a1a3a3;
  border-radius: 4px;
  box-shadow: 0 1px #fff;
  box-sizing: border-box;
  color: #696969;
  height: 39px;
  margin: 31px 0 0 29px;
  padding-left: 37px;
  transition: box-shadow 0.3s;
  width: 240px;
}
input[type="password"]:focus, input[type="text"]:focus {
  box-shadow: 0 0 4px 1px rgba(55, 166, 155, 0.3);
  outline: 0;
}
.show-password {
  display: block;
  height: 16px;
  margin: 26px 0 0 28px;
  width: 87px;
}
input[type="checkbox"] {
  cursor: pointer;
  height: 16px;
  opacity: 0;
  position: relative;
  width: 64px;
}
input[type="checkbox"]:checked {
  left: 29px;
  width: 58px;
}
.toggle {

  display: block;
  height: 16px;
  margin-top: -20px;
  width: 87px;
  z-index: -1;
}
input[type="checkbox"]:checked + .toggle { background-position: 0 -16px }
.forgot {
  color: #7f7f7f;
  display: inline-block;
  font: 12px/1 sans-serif;
  left: -19px;
  position: relative;
  text-decoration: none;
  top: 5px;
  transition: color .4s;
}
.forgot:hover { color: #3b3b3b }
input[type="submit"] {
  width:240px;
  height:35px;
  display:block;
  font-family:Arial, "Helvetica", sans-serif;
  font-size:16px;
  font-weight:bold;
  color:#fff;
  text-decoration:none;
  text-transform:uppercase;
  text-align:center;
  text-shadow:1px 1px 0px #37a69b;
  padding-top:6px;
  margin: 29px 0 0 29px;
  position:relative;
  cursor:pointer;
  border: none;  
  background-color: #37a69b;
  background-image: linear-gradient(top,#3db0a6,#3111);
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
  border-bottom-left-radius:5px;
  box-shadow: inset 0px 1px 0px #2ab7ec, 0px 5px 0px 0px #497a78, 0px 10px 5px #999;
}

.shadow {
  background: #000;
  border-radius: 12px 12px 4px 4px;
  box-shadow: 0 0 20px 10px #000;
  height: 12px;
  margin: 30px auto;
  opacity: 0.2;
  width: 270px;
}


input[type="submit"]:active {
  top:3px;
  box-shadow: inset 0px 1px 0px #2ab7ec, 0px 2px 0px 0px #31524d, 0px 5px 3px #999;
}
	</style>
</head>



<?php 
$message= "";

if(isset($_POST['password']) and isset($_POST['username']))
{
include "connexion.php";
$queryAuth=" SELECT `Id_user`,`UserName`,`Password`,`Specialite`,`FonctionL` FROM `users`

 where UserName='".htmlspecialchars(str_replace("'", "`", $_POST['username']))."' 
and Password ='".htmlspecialchars(str_replace("'", "`", $_POST['password']))."' 
 ";


$resultAth=mysqli_query($con,$queryAuth);
$rowAuh = $resultAth->fetch_assoc();
$_SESSION['id_user']=$rowAuh['Id_user'];
$_SESSION['Username']=$rowAuh['UserName'];
$_SESSION['Specialite']=$rowAuh['Specialite'];
$_SESSION['FonctionL']=$rowAuh['FonctionL'];
if($_SESSION['id_user'])
{
header('Location: /Cabinet/'); 
}
else {
$message= "nom d'utilisateur ou mot de passe incorrect";
}
}
?>

<body style="background-image: url('images/imgs.jpg');background-color: gray;">
<center>

<form method="POST" action="#">
<div class="login">
	<b><h3> Dr Santé </h3></b>
    <input type="text" placeholder="Utilisateur" id="username" name="username" required="required">  
  <input type="password" placeholder="mot de passe" id="password" name="password" required="required">  <b><h3 style="color: red"><?php echo $message;?> </h3></b> 
  <input type="submit" value="se connecter">
</div>

</form>
</center>
</body>
</html>