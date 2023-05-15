<?php
require("report.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managereport</title>


</head>
<body>

<header>
        <h1>
            City Hospital     <img src="slogen.png" alt="">
    </h1>
    </header>

<nav>
<ul>
       <li><a href="http://localhost/xampp/EPR/homepage.php">HOME</a></li>
   
    </ul>
</nav>

<?php
        if(isset($_POST["btnEdit"]))
        {
        $report=new report();
        $report->setID($_POST["btnEdit"]);
        $report=$report->getreport();
        }
 ?>


<form method="post" enctype="multipart/form-data" name="reportdata">

<table>

<h1>Request The Medical Report</h1>

<tr><td>Patient ID</td>
    <td><input type="number" readonly name="txtID" require
    value="<?php
    if(isset($report))
    {

        echo $report->getID();
    }
 ?>"></td></tr>

<tr><td>Name</td>
<td><input type="text" name="txtName" require
value="<?php
if(isset($report))
{

    echo $report->getName();
}
?>"></td></tr>

<tr><td>Telephone Number</td>
<td><input type="text" name="txtTelephone" require
value="<?php
if(isset($report))
{

    echo $report->getTelephone();
}
?>" ></td></tr>

<tr><td>Hospital Location</td>
    <td>
    <select name="location" id="location"
    value="<?php
    if(isset($report))
    {

        echo $report->getLocation();
    }
    ?>">
    <optgroup label="Doctors">
      <option value="City Hospital-Jaffna">City Hospital-Jaffna</option>
      <option value="City Hospital-Galle ">City Hospital-Galle</option>
      <option value="City Hospital-Kurunegala  ">City Hospital-Kurunegala </option>
    </optgroup>
</select>
</td></tr>

<tr><td>Doctor's Title</td>
    <td>
    <select name="title" id="title"
    value="<?php
    if(isset($report))
    {

        echo $report->getTitle();
    }
    ?>">
    <optgroup label="Doctors">
      <option value="Dr. A. FOUZAN - Dental Surgeon">Dr. A. FOUZAN - Dental Surgeon</option>
      <option value="Dr. JANATH LIYANAGE - Paediatric Surgeon">Dr. JANATH LIYANAGE - Paediatric Surgeon</option>
      <option value="A.M.Alahakoon-Cardiologist ">A.M.Alahakoon-Cardiologist </option>
      <option value=" H.Stalini - Surgeon">H.Stalini - Surgeon</option>
      <option value="H.M.Aravindi - Radiologiest">H.M.Aravindi - Radiologiest</option>
      <option value="A.M.Harindu - Gynaecologist">A.M.Harindu - Gynaecologist</option>
      <option value="A.B.C.Samurdhi - Obstetricians">A.B.C.Samurdhi - Obstetricians</option>
    </optgroup>
    <optgroup label="Covid-19 specialist">
      <option value="C.M.L.Nimasha - Epidemiologists">C.M.L.Nimasha - Epidemiologists</option>
      <option value="V.K.Tharindu - I.D.D">V.K.Tharindu - I.D.D</option>
      <option value="H.M.Indika - Infectiologist">H.M.Indika - Infectiologist</option>
    </optgroup>
</select>
</td></tr>

<tr><td>Email</td>
    <td><input type="text" name="txtEmail" require
    value="<?php
    if(isset($report))
    {

        echo $report->getEmail();
    }
    ?>" ></td></tr>

<tr><td>Medical Report Data</td>
 <td>
<select name="data" id="data"
value="<?php
    if(isset($report))
    {

        echo $report->getRata();
    }
    ?>">
<optgroup label="Medical Report">
      <option value="gastric fluid analysis">gastric fluid analysis</option>
      <option value="kidney function test">kidney function test</option>
      <option value="pregnancy test">pregnancy test</option>
      <option value="syphilis test">syphilis test</option>
      <option value="toxicology test">toxicology test</option>
      <option value="brain scanning">brain scanning</option>
      <option value="ultrasound">ultrasound</option>
    </optgroup>
    <optgroup label="Covid-19 Test"> 
    <option value="Molecular (RT-PCR) Tests">Molecular (RT-PCR) Tests</option>
    <option value="COVID-19 Antigen Tests">COVID-19 Antigen Tests</option>
    <option value="COVID-19 Antibody Tests">COVID-19 Antibody Tests.</option>
</optgroup>
</select>
 </td></tr>

 <tr><td>Report Description</td>
    <td><textarea name="txtDes" cols="30" rows="5"
    value="<?php
    if(isset($report))
    {

        echo $report->getDescription();
    }
    ?>" ></textarea></td></tr>

<tr><td></td>
            <td>
        <input type="submit" value="Add Request" name="btnAdd">
      
    </td></tr>
        <tr><td></td><td></td></tr>

</table>
</form>

<h2>
<a href="http://localhost/xampp/cddd/all.php"><input type="submit" value="View Request" name="btnClick"></a>
</h2>

<?php
    if(isset($_POST["btnAdd"]))
    {
        try {

            $report=new report();
            $report->setName($_POST["txtName"]);
            $report->setTelephone($_POST["txtTelephone"]);
            $report->setLocation($_POST["location"]);
            $report->setTitle($_POST["title"]);
            $report->setEmail($_POST["txtEmail"]);
            $report->setData($_POST["data"]);
            $report->setDescription($_POST["txtDes"]);
           
            $id=$report->Add();
            $report->setID($id);

        } catch (Exception $e) {
          echo "DB Error".$e->getMessage();
        }
    }

 
    
   
    ?>
   
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

footer{

margin-top: 100px;
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