<?php
header("content-type:text/html;charset=utf-8");

$username = $_GET['name'];
$pwd = $_GET['pswd'];

if((!empty($username))&&(!empty($pwd))){

	$conn=@mysqli_connect("localhost",'root','','user_db') or die("Can't connect to database!");
	$sql="SELECT name,pswd FROM user_info WHERE name='$username' AND pswd='$pwd'";
	
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($query);
	
	if(($username==$row['name'])&&($pwd==$row['pswd'])) {
		session_start();
		$_SESSION['user']=$username;

		$time=date("Y-m-d H:i:s");
		$ip=$_SERVER["REMOTE_ADDR"];
		//echo "username,$username\n";
		//echo "login_ip,$IP\n";
		//echo "login_data,$time\n";	
		
		mysqli_query($conn,"set names utf8");
		//$sql_log="insert into log_info(name,ip_addr,login_time) values('{$username}','{$ip}','now()')";

                //$result=mysqli_query($conn,$sql_log);
                //if(!$result){
		//	die('Could not updte log_info data: ' . mysql_error());
		//}
		echo $username," welcome!\n";
		echo "uesrname,$username\n";
		echo "login_ip,$ip\n";
		echo "login_date,$time\n";
		echo "Click here to <a href='logout.php'>logout</a>\n";
		exit;
	}else{
		
		header("Location:../login.html?err=1");
		echo "Wrong username or password!\n";
	}
}else {
	header("Location:../login.html?err=2");
	echo "Empty username or password!\n";
}
?>
