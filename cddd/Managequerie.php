<?php

require("querie.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    =
    <title>Manage Service</title>

</head>
<body>

<header>
        <h1>
            City Hospital     <img src="slogen.png" alt="">
    </h1>
    </header>

    <nav></nav>

<?php

if(isset($_POST["btnEdit"]))
{

    $querie=new querie();
    $querie->setID($_POST["btnEdit"]);     
    $querie=$querie->getquerie();
}
?>

<form method="post" enctype="multipart/form-data" name="employeedata">
<table>

<h1>Write Your Querys</h1>

<tr><td>pacient ID</td>
<td><input type="number" readonly name="txtID"
value="<?php
if(isset($querie))
{
    echo $querie->getID();    
}
?>"
></td></tr>


<tr><td>pacient Name</td>
<td><input type="text" name="txtName" require
value="<?php
if(isset($querie))
{
    echo $querie->getName();
}
?>"></td></tr>

<tr><td>Telephone</td>
<td><input type="text" name="txtTelephone" require
value="<?php
if(isset($querie))
{
    echo $querie->getTelephone();
}
?>"></td></tr>

<tr><td>Doctor's Name</td>
<td>
<select name="txtDoctor" id="Doctor"   

value="<?php
if(isset($querie))
{
    echo $querie->getDoctor();
}
?>">

<optgroup label="Consultant">
      <option value="Dr. A. FOUZAN - Dental Surgeon">Dr. A. FOUZAN - Dental Surgeon</option>
      <option value="Dr. JANATH LIYANAGE - Paediatric Surgeon">Dr. JANATH LIYANAGE - Paediatric Surgeon</option>
      <option value="A.M.Alahakoon-Cardiologist ">A.M.Alahakoon-Cardiologist </option>
      <option value=" H.Stalini - Surgeon">H.Stalini - Surgeon</option>
      <option value="H.M.Aravindi - Radiologiest">H.M.Aravindi - Radiologiest</option>
      <option value="A.M.Harindu - Gynaecologist">A.M.Harindu - Gynaecologist</option>
      <option value="A.B.C.Samurdhi - Obstetricians">A.B.C.Samurdhi - Obstetricians</option>
      <option value="No consultant needed">No consultant needed</option>
    </optgroup>
    <optgroup label="Covid-19 Consultant">
      <option value="C.M.L.Nimasha - Epidemiologists">C.M.L.Nimasha - Epidemiologists</option>
      <option value="V.K.Tharindu - I.D.D">V.K.Tharindu - I.D.D</option>
      <option value="H.M.Indika - Infectiologist">H.M.Indika - Infectiologist</option>
    </optgroup>
</select>
</td></tr>



<tr><td>pacient Query</td>
<td><textarea name="txtReport" cols="30" rows="5" 
><?php
if(isset($querie))
{
    echo $querie->getReport();
}
?></textarea></td></tr>

<tr>
 

  
    </table>
 <h3>
<input type="submit" value="Add Employee" name="btnAdd">
</h3>

</table>
</form>

<h2>
<a href="http://localhost/xampp/cddd/allqueries.php"><input type="submit" value="View Request" name="btnClick"></a>
</h2>



<?php
if(isset($_POST["btnAdd"]))
{

    try {
        
        $querie=new querie();
        $querie->setName($_POST["txtName"]);
         $querie->setTelephone($_POST["txtTelephone"]);
         $querie->setDoctor($_POST["txtDoctor"]);
        $querie->setReport($_POST["txtReport"]);
       
    
        $id=$querie->Add();
        $querie->SetID($id);

      
    } catch (Exception $e) {
        echo "DB Error" .$e->getMessage();
    }
}

?>

</aside> 


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

h1{

margin-left: 190px;
}

table{

margin-left: 100px;
}
h2{
    margin-top: 3px;
    margin-left: 24%;


}

h3{

    float: left;
    margin-left: 100px;
    margin-top: 10px;
}

footer{

margin-top: 150px;
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