<?php
use PSpell\Config;
include("configpayment.php");

class payment
{

    private $ID;
    private $Name;
    private $Telephone;
    private $Service;
    private $Method;
    private $Number;
    private $Amount;

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

public function setService($service)
{
  $this->Service=$service;
}
public function getService()
{
 return $this->Service;
}
 
public function setMethod($Method)
{
  $this->Method=$Method;
}
public function getMethod()
{
 return $this->Method;
}

public function setNumber($number)
{
  $this->Number=$number;
}
public function getNumber()
{
return $this->Number;
}

public function setAmount($amount)
{
  $this->Amount=$amount;
}
public function getAmount()
{
return $this->Amount;
}


public function Add()
{

  try {

$conn=Configdb::GetConnection();
$query="INSERT INTO `payment`(`Name`, `Telephone`, `Service`, `Method`, `Number`, `Amount`)
VALUES (?,?,?,?,?,?)";

     $stmt=$conn->prepare($query);
    
     $stmt->bindParam(1,$this->Name,PDO::PARAM_STR);
     $stmt->bindParam(2,$this->Telephone,PDO::PARAM_STR);
     $stmt->bindParam(3,$this->Service,PDO::PARAM_STR);
     $stmt->bindParam(4,$this->Method,PDO::PARAM_STR);
     $stmt->bindParam(5,$this->Number,PDO::PARAM_STR);
     $stmt->bindParam(6,$this->Amount,PDO::PARAM_STR);
    
     $stmt->execute();
     return $conn->lastInsertId();

    
  } catch (Exception $e) {
    throw $e;
  }
}

public static function getpayments()
{

  try {
  
 $conn=Configdb::GetConnection();
$query="SELECT `ID`, `Name`, `Telephone`, `Service`, `Method`, `Number`, `Amount` FROM `payment`";

    $payments=array();
    $resuilt=$conn->query($query);
    foreach($resuilt as $r)
    {
      $payment=new payment();
      $payment->setID($r[0]);
      $payment->setName($r[1]);
      $payment->setTelephone($r[2]);
      $payment->setService($r[3]);
      $payment->setMethod($r[4]);
      $payment->setNumber($r[5]);
      $payment->setAmount($r[6]);

       array_push($payments,$payment);
    }
    return $payments;

  } catch (Exception $e) {

      throw $e;
}

}

public function getpayment()
{

  try {

$conn=Configdb::GetConnection();
$query="SELECT `ID`, `Name`, `Telephone`, `Service`, `Method`, `Number`, `Amount` FROM `payment` WHERE ID=?";

    $stmt=$conn->prepare($query);
    $stmt->bindParam(1,$this->ID,PDO::PARAM_INT);
    
     $stmt->execute();
    $r=$stmt->fetchAll();
    $payment=new payment();
    if(sizeof($r)>0)
    
    {
      $payment=new payment();
      $payment->setID($r[0][0]);
      $payment->setName($r[0][1]);
      $payment->setTelephone($r[0][2]);
      $payment->setService($r[0][3]);
      $payment->setMethod($r[0][4]);
      $payment->setNumber($r[0][5]);
      $payment->setAmount($r[0][6]);
    
      }

    return $payment;
  } catch (Exception $e) {
    throw $e;
  }
}

public function Update()
{

  try {
    
    $conn=Configdb::GetConnection();
    $query=" UPDATE `payment` SET `Name`=?,`Telephone`=?,`Service`=?,`Method`=?,`Number`=?,`Amount`=? WHERE `ID`=? ";

     $stmt=$conn->prepare($query);

    $stmt->bindParam(1,$this->Name,PDO::PARAM_STR);
    $stmt->bindParam(2,$this->Telephone,PDO::PARAM_STR);
    $stmt->bindParam(3,$this->Service,PDO::PARAM_STR);
    $stmt->bindParam(4,$this->Method,PDO::PARAM_STR);
    $stmt->bindParam(5,$this->Number,PDO::PARAM_STR);
    $stmt->bindParam(6,$this->Amount,PDO::PARAM_STR);

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
        $query="  DELETE FROM `payment` WHERE `ID`=?";
        $stmt=$conn->prepare($query);

        $stmt->bindParam(1,$this->ID,PDO::PARAM_INT);
       
        $stmt->execute();


}    catch(Exception $e){

  throw $e;
}
}
}
?>