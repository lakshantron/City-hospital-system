<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedicalTest</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<header>
        <h1>
            City Hospital     <img src="slogen.png" alt="">
    </h1>
    </header>

    <nav></nav>

    
<table class="table">
    <thead>
<tr>
<td>ID</td>
<td>Name</td>
<td>Telephone</td>
<td>Doctor's Name</td>
<td>Pacient Querie</td>

</tr>
</thead>
<tbody>

<?php

$servername="localhost";
$user="root";
$pw="";
$database="pacient";
$connection= new mysqli($servername,$user,$pw,$database);

if($connection->connect_error){
    die("connection_faild: " .$connection->connect_error);

}

$sql="SELECT * FROM `querie`";
$resuilt=$connection->query($sql);

if(!$resuilt){

    die("Invalide query: ".$connection_error);
}

while($row=$resuilt->fetch_assoc()){
    echo" <tr>
    <td> ". $row["ID"]."</td>
    <td>". $row["Name"]."</td>
    <td>". $row["Telephone"]."</td>
    <td>". $row["Doctor"]."</td>
    <td>". $row["Report"]."</td>
    

   <td>
  

 </tr>";

}
?>

    </tbody>

</table>

<a class='btn btn-primary btn-sm' href='http://localhost/xampp/cddd/Managequerie.php'>Back to the table</a>

<footer>
© 2023-Privacy Policy | City Hospital
</footer>

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

footer{

margin-top: 340px;
margin-left: 15px;
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