<?php
header("Access-Control-Allow-Origin: *");

//Connect & Select Database
mysql_connect("localhost","root","root") or die("could not connect server");
mysql_select_db("phonegap_demo") or die("could not connect database");

//Create New Account
if(isset($_POST['signup']))
{
	$fullname=mysql_real_escape_string(htmlspecialchars(trim($_POST['fullname'])));
	$email=mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
	$password=mysql_real_escape_string(htmlspecialchars(trim($_POST['password'])));
	$login=mysql_num_rows(mysql_query("select * from `phonegap_login` where `email`='$email'"));
	if($login!=0)
	{
		echo "exist";
	}
	else
	{
		$date=date("d-m-y h:i:s");
		$q=mysql_query("insert into `phonegap_login` (`reg_date`,`fullname`,`email`,`password`) values ('$date','$fullname','$email','$password')");
		if($q)
		{
			echo "success";
		}
		else
		{
			echo "failed";
		}
	}
	echo mysql_error();
}

//Login
if(isset($_POST['login']))
{
	$email=mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
	$password=mysql_real_escape_string(htmlspecialchars(trim($_POST['password'])));
	$login=mysql_num_rows(mysql_query("select * from `phonegap_login` where `email`='$email' and `password`='$password'"));
	if($login!=0)
	{
		echo "success";
	}
	else
	{
		echo "failed";
	}
}

//Change Password
if(isset($_POST['change_password']))
{
	$email=mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
	$old_password=mysql_real_escape_string(htmlspecialchars(trim($_POST['old_password'])));
	$new_password=mysql_real_escape_string(htmlspecialchars(trim($_POST['new_password'])));
	$check=mysql_num_rows(mysql_query("select * from `phonegap_login` where `email`='$email' and `password`='$old_password'"));
	if($check!=0)
	{
		mysql_query("update `phonegap_login` set `password`='$new_password' where `email`='$email'");
		echo "success";
	}
	else
	{
		echo "incorrect";
	}
}

// Forget Password
if(isset($_POST['forget_password']))
{
	$email=mysql_real_escape_string(htmlspecialchars(trim($_POST['email'])));
	$q=mysql_query("select * from `phonegap_login` where `email`='$email'");
	$check=mysql_num_rows($q);
	if($check!=0)
	{
		echo "success";
		$data=mysql_fetch_array($q);
		$string="Hey,".$data['fullname'].", Your password is".$data['password'];
		mail($email, "Your Password", $string);
	}
	else
	{
		echo "invalid";
	}
}

?>