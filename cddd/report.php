<?php

use PSpell\Config;

include("configreport.php");
class report
{

    private $ID;
    private $Name;
    private $Telephone;
    private $Location;
    private $Title;
    private $Email;
    private $Data;
    private $Description;
   
    public function setID($id)
    {
      $this->ID=$id;
    }
  public function getID()
  {
    return $this->ID;
  }
    
    public function setName($name)
    {
      $this->Name=$name;
    }
  public function getName()
  {
    return $this->Name;
  }

  public function setTelephone($telephone)
  {
    $this->Telephone=$telephone;
  }
  public function getTelephone()
  {
    return $this->Telephone;
  }

  public function setLocation($location)
  {
    $this->Location=$location;
  }
public function getLocation()
{
  return $this->Location;
}

  public function setTitle($title)
  {
    $this->Title=$title;
  }
  public function getTitle()
  {
    return $this->Title;
  }


  public function setEmail($email)
  {
    $this->Email=$email;
  }
public function getEmail()
{
  return $this->Email;
}

    
public function setData($data)
{
  $this->Data=$data;
}
public function getData()
{
  return $this->Data;
}

  public function setDescription($description)
  {
    $this->Description=$description;
  }
  public function getDescription()
  {
    return $this->Description;
  }

  public function Add()
  {

    try {

        $conn=configDB::GetConnection();
        $query=" INSERT INTO `report`(`Name`, `Telephone`, `Location`, `Title`, `Email`, `Reports`, `Description`)
         VALUES (?,?,?,?,?,?,?)";

$stmt=$conn->prepare($query);
$stmt->bindParam(1,$this->Name,PDO::PARAM_STR); 
$stmt->bindParam(2,$this->Telephone,PDO::PARAM_STR); 
$stmt->bindParam(3,$this->Location,PDO::PARAM_STR); 
$stmt->bindParam(4,$this-> Title,PDO::PARAM_STR); 
$stmt->bindParam(5,$this->Email,PDO::PARAM_STR); 
$stmt->bindParam(6,$this-> Data,PDO::PARAM_STR); 
$stmt->bindParam(7,$this-> Description,PDO::PARAM_STR); 

$stmt->execute();
return $conn->lastInsertId();

        
    } catch (Exception $e) {
        throw $e;
    }
  }

public static function getreports()
{
  try {
   
    $conn=configDB::GetConnection();
    $query=" SELECT `ID`, `Name`, `Telephone`, `Location`,
     `Title`, `Email`, `Reports`, `Description` FROM `report`";

$report=array();
$resuilt=$conn->query($query);
foreach($resuilt as $r)
{

  $report=new report();
  $report->setID($r[0]);
  $report->setName($r[1]);
  $report->setTelephone($r[2]);
  $report->setLocation($r[3]);
  $report->setTitle($r[4]);
  $report->setEmail($r[5]);
  $report->setData($r[6]);
  $report->setDescription($r[7]);

  array_push($reports,$report);

}
return $reports;

  } catch (Exception $e) {
    throw $e;
  }
}

public function getreport()
{
  try {
    
    $conn=configDB::GetConnection();
    $query=" SELECT `ID`, `Name`, `Telephone`, `Location`, `Title`, `Email`,
     `Reports`, `Description` FROM `report` WHERE ID=?";

     
$stmt=$conn->prepare($query);
$stmt->bindParam(1,$this->ID,PDO::PARAM_INT);  
$stmt->execute();
$r=$stmt->fetchAll();
if(sizeof($r)>0)

{

  $report=new report();
  $report->setID($r[0][0]);
  $report->setName($r[0][1]);
  $report->setTelephone($r[0][2]);
  $report->setLocation($r[0][3]);
  $report->setTitle($r[0][4]);
  $report->setEmail($r[0][5]);
  $report->setData($r[0][6]);
  $report->setDescription($r[0][7]);

}
return $report;
  } catch (Exception $e) {
    throw $e;
  }
}


  public function update()
  {
    try {
      $conn=configDB::GetConnection();
      $query=" UPDATE `report` SET `Name`=?,`Telephone`=?,
      `Location`=?,`Title`=?,`Email`=?,`Reports`=?,`Description`=? WHERE  `ID`=?";

$stmt=$conn->prepare($query);
$stmt->bindParam(1,$this->Name,PDO::PARAM_STR); 
$stmt->bindParam(2,$this->Telephone,PDO::PARAM_STR); 
$stmt->bindParam(3,$this->Location,PDO::PARAM_STR); 
$stmt->bindParam(4,$this-> Title,PDO::PARAM_STR); 
$stmt->bindParam(5,$this->Email,PDO::PARAM_STR); 
$stmt->bindParam(6,$this-> Data,PDO::PARAM_STR); 
$stmt->bindParam(7,$this-> Description,PDO::PARAM_STR); 

$stmt->bindParam(8,$this->ID,PDO::PARAM_INT);

$stmt->execute();

    } catch (Exception $e) {
      throw $e;
    }
  }

  public function Delete()
  {

    try {
      
      $conn=configDB::GetConnection();
      $query="Delete from `report` WHERE `ID`=?";
      $stmt=$conn->prepare($query);
      $stmt->bindParam(1,$this->ID,PDO::PARAM_INT);
      $stmt->execute();

    } catch (Exception $e) {
      throw $e;
    }
    
}
}

?>
