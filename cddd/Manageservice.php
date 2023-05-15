<?php

require("service.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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

    $service=new service();
    $service->setID($_POST["btnEdit"]);     
    $service=$service->getservice();
}
?>

<form method="post" enctype="multipart/form-data" name="employeedata">
<table>

<h1>Request Medical Services</h1>

<tr><td>pacient ID</td>
<td><input type="number" readonly name="txtID"
value="<?php
if(isset($service))
{
    echo $service->getID();    
}
?>"
></td></tr>


<tr><td>Name</td>
<td><input type="text" name="txtName" require
value="<?php
if(isset($service))
{
    echo $service->getName();
}
?>"></td></tr>

<tr><td>Telephone</td>
<td><input type="text" name="txtTelephone" require
value="<?php
if(isset($service))
{
    echo $service->getTelephone();
}
?>"></td></tr>

<tr><td>Consultant</td>
<td>
<select name="txtConsultant" id="Consultant"   

value="<?php
if(isset($service))
{
    echo $service->GetConsultant();
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

<tr><td>Date</td>
<td><input type="text"name="txtDate"
value="<?php
if(isset($service))
{
    echo $service->getDate();    
}
?>"
></td></tr>

<tr><td>Hospital Units</td>
<td>
<select name="txtRoom" id="Room"   

value="<?php
if(isset($service))
{
    echo $service->getRoom();
}
?>">

<optgroup label="Unit Name">
      <option value="Dental unit">Dental unit</option>
      <option value="Eye Centre">Eye Centre</option>
      <option value="Genaral Wards">Genaral Wards</option>
      <option value="Surgery Unit">Surgery Unit</option>
      <option value="Covid-19 Treatment">Covid-19 Treatment</option>
      <option value="Cancer unit">Cancer unit</option>
      <option value="Manterntity Unit">Manterntity Unit</option>
      <option value="Hospital Transport">Hospital Transport</option>
    </optgroup>
</select>
</td></tr>

<tr><td>Description</td>
<td><textarea name="txtDes" cols="30" rows="5" 
><?php
if(isset($service))
{
    echo $service->GetDescription();
}
?></textarea></td></tr>

<tr>
 </table>
     </td>
    </tr>
<tr><td></td>
<td>
<input type="submit" value="Add Service" name="btnAdd">
<input type="submit" value="Update Service" name="btnUpdate">
<input type="submit" value="Delete Service" name="btnDelete">
</td></tr>
<tr><td></td><td></td></tr>
</table>
</form>

<?php
if(isset($_POST["btnAdd"]))
{

    try {
        
        $service=new service();
        $service->setName($_POST["txtName"]);
         $service->setTelephone($_POST["txtTelephone"]);
         $service->setConsultant($_POST["txtConsultant"]);
        $service->setDate($_POST["txtDate"]);
        $service->setRoom($_POST["txtRoom"]);
        $service->setDescription($_POST["txtDes"]);
    
        $id=$service->Add();
        $service->SetID($id);

     

    } catch (Exception $e) {
        echo "DB Error" .$e->getMessage();
    }
}
else if(isset($_POST["btnUpdate"]))
{

try {
    
    $service=new service();
    $service->setName($_POST["txtName"]);
    $service->setTelephone($_POST["txtTelephone"]);
    $service->setConsultant($_POST["txtConsultant"]);
    $service->setDate($_POST["txtDate"]);
    $service->setRoom($_POST["txtRoom"]);
    $service->setDescription($_POST["txtDes"]);
    $id=$service->Update();

   

} catch (Exception $e) {
    echo "DB Error".$e->getMessage();
    
}
}
else if(isset($_POST["btnDelete"]) && isset($_POST["txtID"]))
{

    $service= new service();                           //create a delete process
    $service->SetID($_POST["txtID"]);
    
    try {
            
        $service->Delete();
        
                } catch (Exception $e) {
                echo"DB error" .$e->getMessage();
                }
}
?>

</aside> 
<main>
  
<?php

$services=service::getservices();

if(sizeof($services)>0)

{

    echo'<form method="post" enctype="multipart/form-data">';
    echo'<table>
    <tr>
    
    <th>Name</th>
    <th>Telephone</th>
    <th>Description</th>
   
    <th>Edit</th>
    </tr>';
    foreach($services as $b)
    {
        echo '<tr>';

        echo'<td>'. $b->getName().'<br>';
       
        echo'<td>'.$b->getTelephone().'<br>';

        
        echo '<td>'.$b->getDescription().'</td>';
        
       

        echo '<td><button name="btnEdit" type="submit"
        value="'.$b->getID().'">Edit</button>
        </td>';

        echo'</tr>';
       
    }
    
    
    echo '</table>';
    echo '</form>';

    
}
?>


</main>

<footer>
© 2023-Privacy Policy | City Hospital
</footer>

    <style>

*{background-color: rgb(255, 248, 248);}

header h1{

margin-top: 10px;
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
height: 20px;
background-color: rgb(110, 151, 44);

}
main{

    margin-left: 100px;
}

h1{

    margin-left: 250px;
}
table{

    margin-left: 100px;
}

footer{

    margin-top: 100px;
  margin-left: 10px;
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