<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    
</head>
<body>

<header>
        <h1>
            City Hospital     <img src="slogen.png" alt="">
    </h1>
    </header>

    <nav></nav>

    <h1>City Hospital Log In</h1>

    <form method="post">
<table>

<tr><td>User name</td>
<td>
    <input type="text" name="txtun" >
</td>
</tr>

<tr><td>Password</td>
<td>
    <input type="password" name="txtpw" required>
</td>
</tr>

<tr><td></td>

<td>
    <input type="submit" value="Login" name="btnlogin">
</td>
</tr>

<?php

if(isset($_POST["btnlogin"]))
{

    $un=$_POST["txtun"];
    $pw=$_POST["txtpw"];
    if($un=="patient" && $pw=="123")
    {
        $_SESSION["un"]=$un;
        header("location:hospital.php");
    }
    else{

        echo "Incorrect log in";
    }

}

if(isset($_POST["btnlogin"]))
{

    $un=$_POST["txtun"];
    $pw=$_POST["txtpw"];
    if($un=="admin" && $pw=="456")
    {
        $_SESSION["un"]=$un;
        header("location:hospital.php");
    }
    else{

        echo " Chack the username and password";
    }

}

if(isset($_POST["btnlogin"]))
{

    $un=$_POST["txtun"];
    $pw=$_POST["txtpw"];
    if($un=="pacient" && $pw=="789")
    {
        $_SESSION["un"]=$un;
        header("location:hospital.php");
    }
    else{

        echo " and Try agine";
    }

}
?>

</table>
</form>

<main>
    <h3>
    
    <li><img src="email.webp" alt=""width="50px" height="40px"><a href="Cityhospitalhelth.Galle0125@gmail.com">Cityhospitalhelth.Galle0125@gmail.com"</a> </li>
    <li><img src="twitter.jpg" alt="" width="50px" height="40px"><a href="https://twitter.com/Cityhospital/Galle/538922803201">https://twitter.com/Cityhospital/Galle/538922803201</a></li>
    <li><img src="facebook.png" alt="" width="50px" height="50px"><a href=" https://www.facebook.com/Cityhospital/Galle/9529866328">https://www.facebook.com/Cityhospital/Galle/9529866328</a></li>
    </h3>
</main>
<style>


*{background-color: rgb(255, 248, 248);}

header h1{

margin-top: 15px;
margin-left: 5px;
width: 97%;
height: 80px;
color:rgb(100, 65, 226) ;
text-align: center;
}

nav{

margin-top: 5px;
margin-left: 30px;
width: 95%;
height: 30px;
background-color: rgb(110, 151, 44);

}

h2{

   
    width: 550px;
    height: 149px;
    margin-left: 100px;
}

h3{

   
  background-color: gray;
  
}

table{

    margin-top: 15px;
margin-left: 30px;
width: 35%;
height: 35px;
text-align: center;
}



main{

    
margin-top: 20px;
        width: 993px;
    height: 200px;
  background-color: gray;
    border: 3px red solid;
   
    
    
    
}
footer
{

margin-top: 25px;
margin-left: 30px;
margin-bottom: 500px;
width: 98%;
height: 28px;


border-radius: 5px;
background-color: rgb(255, 127, 127);
float: left;
text-align: center;

}

</style>
</body>

</html>