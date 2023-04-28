<?php
require "./db.php";
class TEST extends DB{
    
    public function __construct()
    {
        $this->setId();
    }
    public function setId(){
        $mysql="SELECT * FROM `register`";
        $result=$this->conn->query($mysql);
        for($i=1;$i<=mysqli_num_rows($result);$i++){
            $s="UPDATE `register` SET 'id'='$i'";
            $z=$this->conn->query($s);
            echo $i;
        }
    }
}
$app=new TEST();

?>
