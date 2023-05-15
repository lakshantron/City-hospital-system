<?php

include("confighospital.php");

class service
{

    private $ID;
    private $Name;
    private $Telephone;
    private $Consultant;
    private $Date;
    private $Room;
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
    $this ->Name=$name;
}
public function getName()
{
    return $this->Name;
}

public function setConsultant($consultant)
{
  $this->Consultant=$consultant;
}
public function getConsultant()
{
  return $this->Consultant;
}

public function setTelephone($telephone)
{
  $this->Telephone=$telephone;
}
public function getTelephone()
{
  return $this->Telephone;
}

public function setRoom($room)
{
  $this->Room=$room;
}
public function getRoom()
{
 return $this->Room;
}
 
public function setDate($date)
{
  $this->Date=$date;
}
public function getDate()
{
 return $this->Date;
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

$conn=Configdb::GetConnection();
$query="INSERT INTO `service`( `Name`, `Telephone`, `Consultant`, `Room`, `Date`, `Description`) 
VALUES (?,?,?,?,?,?)";




     $stmt=$conn->prepare($query);
    
     $stmt->bindParam(1,$this->Name,PDO::PARAM_STR);
     $stmt->bindParam(2,$this->Telephone,PDO::PARAM_STR);
     $stmt->bindParam(3,$this->Consultant,PDO::PARAM_STR);
     $stmt->bindParam(4,$this->Room,PDO::PARAM_STR);
     $stmt->bindParam(5,$this->Date,PDO::PARAM_STR);
     $stmt->bindParam(6,$this->Description,PDO::PARAM_STR);
    
     $stmt->execute();
     return $conn->lastInsertId();

    
  } catch (Exception $e) {
    throw $e;
  }
}
public static function getservices()
{

  try {
  
 $conn=Configdb::GetConnection();
$query="SELECT `ID`, `Name`, `Telephone`, `Consultant`, `Room`, `Date`, 
`Description` FROM `service`";

  $servies=array();
    $resuilt=$conn->query($query);
    foreach($resuilt as $r)
    {
      $service=new service();
      $service->setID($r[0]);
      $service->setName($r[1]);
      $service->setTelephone($r[2]);
      $service->setConsultant($r[3]);
      $service->setRoom($r[4]);
      $service->setDate($r[5]);
      $service->setDescription($r[6]);
    

      array_push($servies,$service);
    }
    return $servies;

  } catch (Exception $e) {

      throw $e;
}

}

public function getservice()
{

  try {

$conn=Configdb::GetConnection();
$query="SELECT `ID`, `Name`, `Telephone`, `Consultant`, `Room`, `Date`, 
`Description` FROM `service` WHERE ID=?";



    $stmt=$conn->prepare($query);
    $stmt->bindParam(1,$this->ID,PDO::PARAM_INT);
    
    
    
    $stmt->execute();
    $r=$stmt->fetchAll();
    $service=new service();
    if(sizeof($r)>0)

    
    {
      $service=new service();
      $service->setID($r[0][0]);
      $service->setName($r[0][1]);
      $service->setTelephone($r[0][2]);
      $service->setConsultant($r[0][3]);
      $service->setRoom($r[0][4]);
      $service->setDate($r[0][5]);
      $service->setDescription($r[0][6]);
     

      }
    return $service;
  } catch (Exception $e) {
    throw $e;
  }
}

public function Update()
{

  try {
    
    $conn=Configdb::GetConnection();
    $query=" UPDATE `service` SET `Name`=?,`Telephone`=?
    ,`Consultant`=?,`Room`=?,`Date`=?,`Description`=? WHERE `ID`=?";


    $stmt=$conn->prepare($query);

    $stmt->bindParam(1,$this->Name,PDO::PARAM_STR);
    $stmt->bindParam(2,$this->Telephone,PDO::PARAM_STR);
    $stmt->bindParam(3,$this->Consultant,PDO::PARAM_STR);
    $stmt->bindParam(4,$this->Room,PDO::PARAM_STR);
    $stmt->bindParam(5,$this->Date,PDO::PARAM_STR);
    $stmt->bindParam(6,$this->Description,PDO::PARAM_STR);

    $stmt->bindParam(7,$this->ID,PDO::PARAM_INT);
  
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
        $query="  DELETE FROM `service` WHERE `ID`=?";
        $stmt=$conn->prepare($query);

      
       
        $stmt->bindParam(1,$this->ID,PDO::PARAM_INT);
       
        $stmt->execute();


}    catch(Exception $e){

  throw $e;
}
}
}
?>