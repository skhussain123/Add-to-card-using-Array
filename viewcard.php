<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">

            <br>
            <br>
            <h3 class="text-center" style="font-weight: bold;">All Card Data</h3>
            <br>
            <br>
                <?php   


                if(isset($_GET['txt'])){
                    $err=$_GET['txt'];
                    if($err="Update successful"){
                        $class="text-success";
                    }
                    else
                    if($err="Delete successful"){
                        $class="text-success";
                    }
                    else{
                        $class="text-danger";
                    }
                    ?><p class="text-center <?php echo  $class ?>"><?php echo $err?></p><?php
                }
                else{
                   
                }
            session_start();
            
            if(isset($_SESSION['card'])){
            ?>
                <tr>
                <th>id</th>
                <th>Name</th>
                <th>Descripton</th>
                <th>Action</th>
                <th>Action</th>
                
            </tr>
                <?php
                
                foreach($_SESSION['card'] as  $data ){
                    ?>
                <tr>
                    <td><?php echo $data['pro_id']?></td>
                    <td><?php echo $data['pro_name']?></td>
                    <td><?php echo $data['pro_desc']?></td>
                    <td><a href="update.php?id=<?php echo $data['pro_id']?>" class="badge badge-success">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $data['pro_id']?>" class="badge badge-danger">Delete</a></td>
                </tr>
                    <?php
                }
            }
            else{
                
            }
            
            ?>
        </div>
    </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



