<?php
    header("content-type:text/html;charset=utf-8");

    session_start();
    
    $name=$_GET['user'];
    $pwd=$_GET['psd1'];
    $repwd=$_GET['psd2'];
    $email=$_GET['eml'];

    if(empty($name)||empty($pwd)||empty($repwd)||empty($email)){

        echo "<script>alert('Imcomplete information input.');</script>";
        echo "<script>window.location='../register.html';</script>";
    }else
    if ($pwd!=$repwd) {
        echo"<script>alert('The 2nd password isn't the same with 1st one.');</script>";
        echo"<script>location='../register.html'</script>";
    }else{  
            
            $conn=mysqli_connect("localhost","root","",'user_db');
            
            
            $sql1 = "SELECT * FROM user_info WHERE name='$name'";
			$result = mysqli_query($conn,$sql1);
			
            $rows = mysqli_num_rows($result); 
            if($rows>0) {
                echo "<script>alert('This username has been registered, please change another username.')</script>";
                echo "<script>window.location='../register.html'</script>";
            }
            else {
                echo "Useful username.<br>";
                
                mysqli_query($conn,"set names utf8");
    
                $sqlinsert="insert into user_info(name,pswd,email) values('{$name}','{$pwd}','{$email}')";

                $result=mysqli_query($conn,$sqlinsert);
                if(! $result )
                    {
                      die('Could not enter data: ' . mysql_error());
                    }
				echo "Congratulations!";
				echo "click here to<a href='login.php'>login</a>";
				#echo "<script>alert('恭喜你注册成功!');href='../login.html'</script>";  				
                //释放连接资源
                mysqli_close($conn);
                }
                            
                
            } 
    
?>
