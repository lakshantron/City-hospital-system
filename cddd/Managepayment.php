<?php
//require("ConfigDB.php");
require("payment.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/site.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Portal</title>
   
</head>
<body>

<header>
        <h1>
            City Hospital     <img src="slogen.png" alt="">
    </h1>
    </header>

    <nav></nav>

    <h1>Payment Portal</h1>

    <?php
    
    if(isset($_POST["btnEdit"]))
    {

        $payment=new payment();
        $payment->SetID($_POST["btnEdit"]);          
        $payment=$payment->getpayment();
    }
    ?>
    <aside>
       
       
    <form method="post" enctype="multipart/form-data" name="channeldata">
    <table>
        <tr><td> ID</td>
        <td><input type="number" readonly name="txtID" 
        value="<?php
        if(isset($payment))
        {
            echo $payment->GetID();
        }
        ?>"></td></tr>

        <tr><td>name</td>
        <td><input type="text" name="txtName" required 
        value="<?php
        if(isset($payment))
        {
            echo $payment->GetName();
        }
        ?>"></td></tr>
       
        <tr><td>Telephone</td>
        <td><input type="text" name="txtTelephone" required
        value="<?php
        if(isset($payment))
        {
            echo $payment->GetTelephone();
        }
        ?>"></td></tr>
        
    <tr><td>Hospital service</td>
    <td>
    <select name="service" id="service"
    
    value="<?php
    if(isset($payment))
    {

        echo $payment->getService();
    }
    
    ?>">

<optgroup label="Hospital service">
<option value="Doctor Chanelling">Doctor Chanelling</option>
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

  <tr><td>Payment Method</td>
 <td>
<select name="Method" id="Method"

value="<?php
    if(isset($payment))
    {

        echo $payment->getMethod();
    }
    
    ?>"
>
    <optgroup label="Payment Method">
      <option value="Bank transfer">Bank transfer</option>
      <option value="Online payment">Online payment</option>
      <option value="Card payment">Card payment</option>
      <option value="cash payment">cash payment</option>
</optgroup>
</select>
 </td></tr>

 <tr><td>Invoice number</td>
        <td><input type="text" name="txtNumber" required 
        value="<?php
        if(isset($payment))
        {
            echo $payment->getNumber();
        }
        ?>"></td></tr> 

 <tr><td>Amount</td>
        <td><input type="text" name="txtAmount" required 
        value="<?php
        if(isset($payment))
        {
            echo $payment->getAmount();
        }
        ?>"></td></tr> 
      
 

      </table>
        </td>    
       </tr>
        <tr><td></td>
        <td>
            <div>
            <input type="submit" value="Add Payment" name="btnAdd">
            <input type="submit" value="Update Payment" name="btnUpdate">
            <input type="submit" value="Delete Payment" name="btnDelete">
            </div>
        </td></tr>
        <tr><td></td><td></td></tr>
    </table>
    </form>

    <?php
if(isset($_POST["btnAdd"]))
{
     try {
        
        $payment=new payment();
        $payment->setName($_POST["txtName"]);
         $payment->setTelephone($_POST["txtTelephone"]);
         $payment->setservice($_POST["service"]);
        $payment->setMethod($_POST["Method"]);
        $payment->setNumber($_POST["txtNumber"]);
        $payment->setAmount($_POST["txtAmount"]);
    
        $id=$payment->Add();
        $payment->SetID($id);

       

    } catch (Exception $e) {
        echo "DB Error" .$e->getMessage();
    }
}
else if(isset($_POST["btnUpdate"]))
{

try {

  $payment=new payment();
    $payment->setName($_POST["txtName"]);
    $payment->setTelephone($_POST["txtTelephone"]);
    $payment->setService($_POST["txtConsultant"]);
    $payment->setMethod($_POST["Method"]);
    $payment->setNumber($_POST["txtNumber"]);
    $payment->setAmount($_POST["txtAmount"]);
    $id=$payment->Update();


} catch (Exception $e) {
    echo "DB Error".$e->getMessage();
    
}
}
else if(isset($_POST["btnDelete"]) && isset($_POST["txtID"]))
{

    $payment= new payment();                         
    $payment->SetID($_POST["txtID"]);
    
    try {
            
        $payment->Delete();
        
                } catch (Exception $e) {
                echo"DB error" .$e->getMessage();
                }
}
?>

</aside> 
<main>
  
<?php

$payments=payment::getpayments();

if(sizeof($payments)>0)

{

    echo'<form method="post" enctype="multipart/form-data">';
    echo'<table>
    <tr>
    
    <th>Name</th>
    <th>Telephone</th>
    <th>Description</th>
   
    <th>Edit</th>
    </tr>';
    foreach($payments as $b)
    {
        echo '<tr>';

        echo'<td>'. $b->getName().'<br>';
       
        echo'<td>'.$b->getTelephone().'<br>';

        
        echo '<td>'.$b->getService().'</td>';
        
       

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

    margin-top: 200px;
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