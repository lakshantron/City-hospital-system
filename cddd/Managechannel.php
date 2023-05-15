<?php
//require("ConfigDB.php");
require("channel.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/site.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Channel</title>
   
</head>
<body>

<header>
        <h1>
            City Hospital     <img src="slogen.png" alt="">
    </h1>
    </header>

    <nav></nav>

    <h1>Doctor Channeling</h1>

    <?php
    
    if(isset($_POST["btnEdit"]))
    {

        $channel=new channel();
        $channel->SetID($_POST["btnEdit"]);           //for create a edit button
        $channel=$channel->getchannel();
    }
    ?>
    <aside>
       
       
    <form method="post" enctype="multipart/form-data" name="channeldata">
    <table>
        <tr><td> ID</td>
        <td><input type="number" readonly name="txtID" 
        value="<?php
        if(isset($channel))
        {
            echo $channel->GetID();
        }
        ?>"></td></tr>
        <tr><td>name</td>
        <td><input type="text" name="txtName" required 
        value="<?php
        if(isset($channel))
        {
            echo $channel->GetName();
        }
        ?>"></td></tr>
        <tr><td>Address</td>
        <td><input type="text" name="txtAddress" required
        value="<?php
        if(isset($channel))
        {
            echo $channel->GetAddress();
        }
        ?>"></td></tr>
        <tr><td>Telephone</td>
        <td><input type="text" name="txtTelephone" required
        value="<?php
        if(isset($channel))
        {
            echo $channel->GetTelephone();
        }
        ?>"></td></tr>
        
        <tr><td>Gender</td>
 <td>
<select name="Gender" id="Gender"

value="<?php
    if(isset($channel))
    {

        echo $channel->getGender();
    }
    
    ?>"
>
    <optgroup label="Gender">
      <option value="Male">Male</option>
      <option value="Feemale">Feemale</option>
</optgroup>
</select>
 </td></tr>

 <tr><td>Doctor's Name</td>
    <td>
    <select name="Doctor" id="Doctor"
    
    value="<?php
    if(isset($channel))
    {

        echo $channel->getDoctor();
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

        <tr><td>Description</td>
        <td><textarea name="txtDes" cols="30" rows="5"
        ><?php
        if(isset($channel))
        {
            echo $channel->GetDescription();
        }
        ?></textarea>
        </td></tr>
      

        <tr>
        <td colspan="2">

        <table>

        <tr>
        <td>ID Photo</td><td>Cover Photo</td>
        
        </tr>
        <tr>
        <td>
            <?php
            if(isset($channel))
            {

                echo'<img src="'.$channel->GetCoverFront().'"
                width="150px" heigth="100px">';
            }
            ?>
            <input type="file" name="txtCoverF" id="">
        </td>
        <td>
        <?php
            if(isset($channel))
            {

                echo'<img src="'.$channel->GetCoverBack().'"
                width="150px" heigth="100px">';
            }
            ?>
            <input type="file" name="txtCoverB" id="">
        </td>
        <td>
            
        </td>
        </tr>
        </table>
        </td>    
      
       
      
       </tr>
        <tr><td></td>
        <td>
            <div>
            <input type="submit" value="Add Patient" name="btnAdd">
            <input type="submit" value="Update Patient" name="btnUpdate">
            <input type="submit" value="Delete Patient" name="btnDelete">
            </div>
        </td></tr>
        <tr><td></td><td></td></tr>
    </table>
    </form>

    <?php
     
    if(isset($_POST["btnAdd"]))
    {
        try {
            
            $channel=new channel();
            $channel->setName($_POST["txtName"]);
            $channel->SetAddress($_POST["txtAddress"]);
            $channel->SetTelephone($_POST["txtTelephone"]);
            $channel->SetGender($_POST["Gender"]);
            $channel->SetDoctor($_POST["Doctor"]);
            $channel->SetDescription($_POST["txtDes"]);
            $channel->SetCoverFront("./New/70B.jpg");
            $channel->SetCoverBack("./New/70F.jpg");
          
            $id=$channel->Add();
            $channel->SetID($id);

            if(isset($_FILES["txtCoverF"]) )
            {
                $front=$_FILES["txtCoverF"]["name"];
                $info= new SplFileInfo($front);
                if($info->getExtension()!="")
                {
                $frontNew="./New/".$id.'F.'.$info->getExtension();
                move_uploaded_file($_FILES["txtCoverF"]["tmp_name"],$frontNew);
                $channel->SetCoverFront($frontNew);
                $channel->UpdateFrontCover();
                }
            }
            if(isset($_FILES["txtCoverB"]))
            {
                $back=$_FILES["txtCoverB"]["name"];
                $info= new SplFileInfo($back);
                if($info->getExtension()!="")
                {
                $backNew="./New/".$id.'B.'.$info->getExtension();
                move_uploaded_file($_FILES["txtCoverB"]["tmp_name"],$backNew);
               $channel->SetCoverBack($backNew);
                $channel->UpdatebackCover();
            }
        }

        } catch (Exception $e) {
            echo "DB Error"+ $e->getMessage();
        }
    }
        else if(isset($_POST["btnUpdate"]))
        {
    try
        {
            $channel=new channel();
            $channel->setName($_POST["txtName"]);
            $channel->SetAddress($_POST["txtAddress"]);
            $channel->SetTelephone($_POST["txtTelephone"]);
            $channel->SetGender($_POST["Gender"]);
            $channel->SetDoctor($_POST["Doctor"]);
            $channel->SetDescription($_POST["txtDes"]);
            $id=$channel->Update();
        
            if(isset($_FILES["txtCoverF"]) )
            {
                $front=$_FILES["txtCoverF"]["name"];
                $info= new SplFileInfo($front);
                if($info->getExtension()!="")
                {
                $frontNew="./New/".$id.'F.'.$info->getExtension();
                move_uploaded_file($_FILES["txtCoverF"]["tmp_name"],$frontNew);
                $channel->SetCoverFront($frontNew);
                $channel->UpdateFrontCover();
                }
            }
            if(isset($_FILES["txtCoverB"]))
            {
                $back=$_FILES["txtCoverB"]["name"];
                $info= new SplFileInfo($back);
                if($info->getExtension()!="")
                {
                $backNew="./New/".$id.'B.'.$info->getExtension();
                move_uploaded_file($_FILES["txtCoverB"]["tmp_name"],$backNew);
               $channel->SetCoverBack($backNew);
               $channel->UpdatebackCover();
            }
         }

        } catch (Exception $e) {
            echo "DB Error".$e->getMessage();
        }
    
    }

    else if(isset($_POST["btnDelete"]) && isset($_POST["txtID"]))
    {

        $channel= new channel();                           //create a delete process
        $channel->SetID($_POST["txtID"]);
        try {
            
$channel->Delete();

        } catch (Exception $e) {
        echo"DB error" .$e->getMessage();
        }

    }
    ?>
    </aside>
    <main>

<?php
$channels=channel::getchannels();
if(isset($_GET["btnSearch"]))
{

    $channels=channel::Searchchannels($_GET["txtSearch"]);
}
?>
    <?php
    
    if(sizeof($channels)>0)
    {

        echo '  <form method="post" enctype="multipart/form-data">';     //create a table 
        echo '<table>                        
        <tr>
            <th><br>channel</th>
             <th>Description</th>    
              <th>ID</th>
              <th>Edit</th>
             
        </tr>';        //table heading
        foreach($channels as $b)
        {
            echo '<tr>';

            echo'<td>'.$b->GetName().'<br>'
            .$b->getAddress().'<br>'
            .$b->getTelephone().'<br>
            

            </td>';
            echo '<td>'.$b->getDescription().'</td>';

            echo'<td><img src="'.$b->GetCoverFront().'"
           width="150px" heigth="150px"></td>';

           echo'<td><button name="btnEdit" type="submit" 
           value="'.$b->getID().'">Edit</button>
           </td>';

            echo '</tr>';
        }

        echo '</table>';
        echo '</form>';    
    }
 ?>
    </main>
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

div{

    position: absolute;
 
    background-color:#0a0a23;
    color: red;
 
    border-radius:10px;



}

footer{

margin-top: 25px;
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