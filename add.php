<?php
require "./index.php";
$app=new App();
$error=array();

if (isset($_POST["submit"])){
  
    if (isset($_POST["productName"])&&($_POST["memory"])&&($_POST["price"])&&($_FILES["image"])){
        $productName=$_POST["productName"];
        $memory=$_POST["memory"];
        $price=$_POST["price"];
        

        $dir="./UploadImg/";
        $image=$dir.basename($_FILES["image"]["name"]);
        $fileExten=pathinfo($image,PATHINFO_EXTENSION);
        $size=$_FILES["image"]["size"];
        if (file_exists($image)){
            $error["exist"]="Image adready exist on the server";
        }
        if (!in_array($fileExten,array("img","png","svg","jpg"))){
            $error["exten"]="Image extension must be png,jpg,svg...";
        }
        if ($size>5242880){
            $error["size"]="Image is too large to upload";

        }
       

        if (empty($error)){
            move_uploaded_file($_FILES["image"]["tmp_name"],$image);
            $app->add($productName,$price,$memory,$image);
            header("Location:home.php");
        }

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link rel="stylesheet" href="./fontawesome/css/all.css">
</head>
<body>
<style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        body{
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url(https://images.pexels.com/photos/1229861/pexels-photo-1229861.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);
            background-position: center;            
            background-repeat: no-repeat;
            background-size: cover;
            backdrop-filter: blur(2px);
        }
        form{
            display: flex;
            flex-direction: column;
            width: 400px;
           
            align-items: center;
        }   
        h1{
            color: white;
            text-align: center;
        }
        form div{
            width: 90%;
        }
        .wrap-productName input ,.wrap-price input,.wrap-memory input{
            width: 100%;
            height: 50px;
            font-size: 16px;
            padding-left: 50px;
            border: none;
            outline: none;
            border-bottom: 1px solid white;
            background-color: transparent;
            caret-color: green;
            margin-top: 20px;
        }
        .wrap-img label{
            cursor: pointer;
            color: white;
            font-size: 20px;
            margin-left: 15px;
        }
        .wrap-img{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        input[type="file"]{
            display: none;
        }
        ::placeholder{
            color: white;
        }
        .wrap-submit input{
            width: 100%;
            height: 35px;
            color: white;
            border: 1px solid white;
            background-color: transparent;
            font-size: 19px;
            cursor: pointer;
        }
        .wrap-productName span ,.wrap-price span ,.wrap-memory span{
            position: absolute;
            color: white;
            font-size: 22px;
            top: 30px;
            left: 15px;
        }
        .wrap-productName,.wrap-price,.wrap-memory{
            position: relative;
        }
    </style>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
        <h1>Add Product</h1>
        <div class="wrap-productName">
            <span><i class="fa-solid fa-mobile"></i></span>
            <input type="text" name="productName" id="" placeholder="Enter Productname">
        </div>
        <div class="wrap-price">
            <span><i class="fa-solid fa-coins"></i></span>
            <input type="number" name="price" id="" placeholder="Enter Price">
        </div>
        <div class="wrap-memory">
            <span><i class="fa-solid fa-memory"></i></span>
            <input type="text" name="memory" id="" list="data"  placeholder="Enter Memory">
            <datalist id="data">
                <option value="16gb"></option>
                <option value="32gb"></option>
                <option value="64gb"></option>
                <option value="128gb"></option>
                <option value="256gb"></option>
            </datalist>
                
            </select>
        </div>
        <div class="wrap-img">
            <label for="image"><span><i class="fa-solid fa-cloud-arrow-up"></i></span> Select Image</label>
            <input type="file" name="image" id="image">
        </div>
        <div class="wrap-submit">
            <input type="submit" value="Add" name="submit">
        </div>
    </form>
</body>
</html>