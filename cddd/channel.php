<?php
include("configchannel.php");

class channel
{
    private $ID;
    private $Name;
    private $Address;
    private $Telephone;
    private $Gender;
    private $Doctor;
    private $Description;
    private $CoverFront;
    private $CoverBack;
    
    
    public function GetName()
    {
        return $this->Name;
    }
    public function SetName($name)
    {
      $this->Name=$name;
    }

    public function GetAddress()
    {
       return $this->Address;
    }
    public function SetAddress($address)
    {
      $this->Address=$address;
    }

    public function SetCoverBack($cover)
    {
        $this->CoverBack=$cover;
    }

    public function GetCoverBack()
    {
      return  $this->CoverBack;
    }

    public function GetCoverFront()
    {
      return  $this->CoverFront;
    }
    public function SetCoverFront($cover)
    {
        $this->CoverFront=$cover;
    }
    
    public function GetDescription()
    {
      return  $this->Description;
    }
    public function SetDescription($description)
    {
        $this->Description=$description;
    }


    public function GetTelephone()
    {
      return  $this->Telephone;
    }
    public function SetTelephone($telephone)
    {
        $this->Telephone=$telephone;
    }
  
    public function GetGender()
    {
      return  $this->Gender;
    }
    public function SetGender($gender)
    {
        $this->Gender=$gender;
    }


    public function GetDoctor()
    {
      return  $this->Doctor;
    }
    public function SetDoctor($doctor)
    {
        $this->Doctor=$doctor;
    }
   
    
    public function GetID()
    {
       return $this->ID;
    }
    public function SetID($id)
    {
        $this->ID=$id;
    }

public function Add()
{
    try
    {
        $conn=ConfigDB::GetConnection();
        $query="INSERT INTO `channel`(`Name`, `Address`, `Telephone`, `Gender`, `Doctor`, `Description`, `CoverFront`, `CoverBack`) 
        VALUES (?,?,?,?,?,?,?,?)";



        $stmt=$conn->prepare($query);
        $stmt->bindParam(1,$this->Name,PDO::PARAM_STR);
        $stmt->bindParam(2,$this->Address,PDO::PARAM_STR);
        $stmt->bindParam(3,$this->Telephone,PDO::PARAM_STR);
        $stmt->bindParam(4,$this->Gender,PDO::PARAM_INT);
        $stmt->bindParam(5,$this->Doctor,PDO::PARAM_STR);
        $stmt->bindParam(6,$this->Description,PDO::PARAM_STR);
        $stmt->bindParam(7,$this->CoverFront,PDO::PARAM_STR);
        $stmt->bindParam(8,$this->CoverBack,PDO::PARAM_STR);
       
        $stmt->execute();
            return $conn->lastInsertId();
        


    }catch(Exception $e){

        throw $e;
    }
}
public function UpdateCover()
    {
    try

    {
        $conn=ConfigDB::GetConnection();
        $query="Update channel Set CoverFront=? , CoverBack=?
            where ID=?"; 
        $stmt=$conn->prepare($query);
        $stmt->bindParam(1,$this->CoverFront,PDO::PARAM_STR);
        $stmt->bindParam(2,$this->CoverBack,PDO::PARAM_STR);
        $stmt->bindParam(3,$this->ID,PDO::PARAM_INT);
        $stmt->execute();

}catch(Exception $e){

    throw $e;

}
}

public function UpdatefrontCover()
{
try

{
$conn=ConfigDB::GetConnection();
$query="Update channel Set CoverFront=?
    where ID=?"; 
$stmt=$conn->prepare($query);
$stmt->bindParam(1,$this->CoverFront,PDO::PARAM_STR);
$stmt->bindParam(2,$this->ID,PDO::PARAM_INT);
$stmt->execute();

}catch(Exception $e){

    throw $e;

}
}
public function UpdatebackCover()
{
try

{
$conn=ConfigDB::GetConnection();
$query="Update channel Set CoverBack=?
    where ID=?"; 
$stmt=$conn->prepare($query);

$stmt->bindParam(1,$this->CoverBack,PDO::PARAM_STR);
$stmt->bindParam(2,$this->ID,PDO::PARAM_INT);
$stmt->execute();

}catch(Exception $e){

    throw $e;

}
}
public static function getchannels()
{
    try {
        
        $conn=ConfigDB::GetConnection();
        $query="SELECT `ID`, `Name`, `Address`, `Telephone`, `Gender`, `Doctor`, `Description`,
        `CoverFront`, `CoverBack` FROM `channel` ";



        $channels=array();
        $resuilt=$conn->query($query);
        foreach($resuilt as $r)
        {

            $channel=new channel();
            $channel->setID($r[0]);
            $channel->setName($r[1]);
            $channel->SetAddress($r[2]);
            $channel->SetTelephone($r[3]);
            $channel->SetGender($r[4]);
            $channel->SetDoctor($r[5]);
            $channel->SetDescription($r[6]);
            $channel->SetCoverFront($r[7]);
            $channel->SetCoverBack($r[8]);
         
            array_push($channels,$channel);   
        }
        return $channels;
        
    } catch (Exception $e) {
    
        throw $e;
    }
}

public function getchannel()
{
    try {
        
        $conn=ConfigDB::GetConnection();
        $query="SELECT `ID`, `Name`, `Address`, `Telephone`, `Gender`, `Doctor`, `Description`,
        `CoverFront`, `CoverBack` FROM `channel` where ID=?";



        $stmt=$conn->prepare($query);
        $stmt->bindParam(1,$this->ID,PDO::PARAM_INT);
        $stmt->execute();
        $r=$stmt->fetchAll();
        $channel=new channel();
        if(sizeof($r)>0)
        
        {

       
            $channel=new channel();
            $channel->setID($r[0][0]);
            $channel->setName($r[0][1]);
            $channel->SetAddress($r[0][2]);
            $channel->SetTelephone($r[0][3]);
            $channel->SetGender($r[0][4]);
            $channel->SetDoctor($r[0][5]);
            $channel->SetDescription($r[0][6]);
            $channel->SetCoverFront($r[0][7]);
            $channel->SetCoverBack($r[0][8]);
         
           
        }
        return $channel;
        
    } catch (Exception $e) {
    
        throw $e;
    }

}
public function Update()
{
    try
    {
        $conn=ConfigDB::GetConnection();
        $query="UPDATE `channel` SET ,`Name`=?,`Address`=?,`Telephone`=?,
        `Gender`=?,`Doctor`=?,`Description`=?,`CoverFront`=?,`CoverBack`=? WHERE `ID`=?";


      
$stmt=$conn->prepare($query);
   
         
        $stmt=$conn->prepare($query);
        $stmt->bindParam(1,$this->Name,PDO::PARAM_STR);
        $stmt->bindParam(2,$this->Address,PDO::PARAM_STR);
        $stmt->bindParam(3,$this->Telephone,PDO::PARAM_STR);
        $stmt->bindParam(4,$this->Gender,PDO::PARAM_INT);
        $stmt->bindParam(5,$this->Doctor,PDO::PARAM_STR);
        $stmt->bindParam(6,$this->Description,PDO::PARAM_STR);


        $stmt->bindParam(7,$this->ID,PDO::PARAM_INT);
       


    }catch(Exception $e){

        throw $e;
    }
}
public function Delete()
{
    try
    {
        $conn=ConfigDB::GetConnection();
        $query="Delete  from `channel`  WHERE `ID`=?";
        $stmt=$conn->prepare($query);
       
        $stmt->bindParam(1,$this->ID,PDO::PARAM_INT);
       
        $stmt->execute();
         
        


    }catch(Exception $e){

        throw $e;
    }
}
public static function Searchchannels($text)
{
    try {
        
        $conn=ConfigDB::GetConnection();
        $query="SELECT `ID`, `Name`, `Address`, `Telephone`, `Gender`, `Doctor`, 
        `Coverfront`, `Coverback`, `ISBN` FROM `channel` where Name like '%" . $text . "%' or 
                                    Address like '%" . $text . "%' or
                                    Telephone like '%" . $text . "%' ";

        $channels=array();
        $resuilt=$conn->query($query);
        foreach($resuilt as $r)
        {

           $channel=new channel();
            $channel->setID($r[0]);
            $channel->setName($r[1]);
            $channel->SetAddress($r[2]);
            $channel->SetTelephone($r[3]);
            $channel->SetGender($r[4]);
            $channel->SetDoctor($r[5]);
            $channel->SetDescription($r[6]);
            $channel->SetCoverFront($r[7]);
            $channel->SetCoverBack($r[8]);

            array_push($channels,$channel);  
        }
        return $channels;
        
    } catch (Exception $e) {
    
        throw $e;
    }
}
}
?>