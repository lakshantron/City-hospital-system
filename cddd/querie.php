<?php
use PSpell\Config;
include("configrep.php");

class querie
{

    private $ID;
    private $Name;
    private $Telephone;
    private $Doctor;
    private $Report;
 
 

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
    $this ->Name=$name;
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

public function setDoctor($doctor)
{
  $this->Doctor=$doctor;
}
public function getDoctor()
{
 return $this->Doctor;
}
 
public function setReport($report)
{
  $this->Report=$report;
}
public function getReport()
{
 return $this->Report;
}


public function Add()
{

  try {

$conn=Configdb::GetConnection();
$query="INSERT INTO `querie`(`Name`, `Telephone`, `Doctor`, `Report`) 
VALUES (?,?,?,?)";




     $stmt=$conn->prepare($query);
    
     $stmt->bindParam(1,$this->Name,PDO::PARAM_STR);
     $stmt->bindParam(2,$this->Telephone,PDO::PARAM_STR);
     $stmt->bindParam(3,$this->Doctor,PDO::PARAM_STR);
     $stmt->bindParam(4,$this->Report,PDO::PARAM_STR);
    
     $stmt->execute();
     return $conn->lastInsertId();

    
  } catch (Exception $e) {
    throw $e;
  }
}
public static function getqueries()
{

  try {
  
 $conn=Configdb::GetConnection();
$query="SELECT `ID`, `Name`, `Telephone`, `Doctor`, `Report` FROM `querie`";

$queries=array();
    $resuilt=$conn->query($query);
    foreach($resuilt as $r)
    {
      $querie=new querie();
      $querie->setID($r[0]);
      $querie->setName($r[1]);
      $querie->setTelephone($r[2]);
      $querie->setDoctor($r[3]);
      $querie->setReport($r[4]);
      
    

      array_push($queries,$querie);
    }
    return $queries;

  } catch (Exception $e) {

      throw $e;
}

}

public function getquerie()
{

  try {

$conn=Configdb::GetConnection();
$query="SELECT `ID`, `Name`, `Telephone`, `Doctor`, `Report` FROM `querie` WHERE ID=?";



    $stmt=$conn->prepare($query);
    $stmt->bindParam(1,$this->ID,PDO::PARAM_INT);
    
    
    
    $stmt->execute();
    $r=$stmt->fetchAll();
    $querie=new querie();
    if(sizeof($r)>0)

    
    {
      $querie=new querie();
      $querie->setID($r[0][0]);
      $querie->setName($r[0][1]);
      $querie->setTelephone($r[0][2]);
      $querie->setDoctor($r[0][3]);
      $querie->setReport($r[0][4]);
    
      }

    return $querie;
  } catch (Exception $e) {
    throw $e;
  }
}

public function Update()
{

  try {
    
    $conn=Configdb::GetConnection();
    $query=" UPDATE `querie` SET `Name`=?,`Telephone`=?,
    `Doctor`=?,`Report`=? WHERE `ID`=?";



    $stmt=$conn->prepare($query);

    $stmt->bindParam(1,$this->Name,PDO::PARAM_STR);
    $stmt->bindParam(2,$this->Telephone,PDO::PARAM_STR);
    $stmt->bindParam(3,$this->Doctor,PDO::PARAM_STR);
    $stmt->bindParam(4,$this->Report,PDO::PARAM_STR);
  
  
    $stmt->execute();
    

  } catch (Exception $e) {
    
    throw $e;
  }


}

public function Delete()
{
    try
    {
        $conn=Configdb::GetConnection();
        $query="  DELETE FROM `querie` WHERE `ID`=?";
        $stmt=$conn->prepare($query);

      
       
        $stmt->bindParam(1,$this->ID,PDO::PARAM_INT);
       
        $stmt->execute();


}    catch(Exception $e){

  throw $e;
}
}
}
?>