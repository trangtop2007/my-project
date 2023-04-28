
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    table {
        background-color: black;
        color: white;
    }
    
    tbody,td,th{
        font-size: 20px;
        padding: 5px 20px;
       
    }
    body{
        background-color: khaki;
    }
    thead th{
        background-color: green;
    }
    img{
        height: 50px;
        width: auto;
    }
    table a{
        background-color: green;
        padding: 10px;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
    #add{
        text-decoration: none;
        font-size: 20px;
        background-color: green;
        color: white;
        padding: 10px 10px;
        display: inline-block;
        margin: 20px 0px 10px 10px;
        border-radius: 5px;
    }
</style>
</head>
<body>

<a href="add.php" id="add">Add Product</a>
<table>
    <thead>
        <th>Id</th>
        <th>ProductName</th>
        <th>Price</th>
        <th>Memory</th>
        <th>Image</th>
        <th>DayCreate</th>
    </thead>
    <tbody>
        <?php
        require "./index.php";
        $app=new App();
        $data=$app->getData();
        if (!empty($data)){
            foreach ($data as $val){
        ?>    
            <tr>
                <td><?=$val["id"]?></td>
                <td><?=$val["productName"]?></td>
                <td><?=$val["price"]?></td>
                <td><?=$val["memory"]?></td>
                <td><?= "<img src='".$val["img"]."'>"?></td>
                <td><?=$val["dayCreate"]?></td>
                <td><a href="update.php?id=<?php echo $val["id"] ?>">Sửa</a></td>
                <td><a href="delete.php?id=<?php echo $val["id"] ?>" onclick="return alert('Bạn có chắc xóa k?')">Xóa</a></td>
            </tr>
        <?php
            }
        }
        ?>
        
    </tbody>
</table>

</body>
</html>