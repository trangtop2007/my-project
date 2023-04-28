<?php 
require "./db.php";
class App extends DB{
    public function getData(){
        $sql="SELECT * FROM `products`";
        $result=$this->conn->query($sql);
        while ($row=$result->fetch_assoc()){
            $data[]=$row;
            
        }
        return $data;
    }
    public function delete($id){
        $sql="DELETE FROM `products` WHERE `id`=$id";
        $result=$this->conn->query($sql);
        
        header("Location:home.php");

    }
    public function add($productName,$price,$memory,$image){
        $sql="INSERT INTO `products` (`productName`,`price`,`memory`,`img`) VALUES ('$productName','$price','$memory','$image')";
        $result=$this->conn->query($sql);
        header("Location:home.php");
    }
    public function edit($id){
        $sql="SELECT * FROM `products` WHERE `id`=$id";
        $result=$this->conn->query($sql);
        return $result;

    }
    public function update($productName,$price,$memory,$img,$id){
        $sql="INSERT INTO `products` (`productName`,`price`,`memory`,`img`) VALUES ('$productName','$price','$memory','$img') WHERE `id`=$id";
        $result=$this->conn->query($sql);
        header("Location:home.php");
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
?>