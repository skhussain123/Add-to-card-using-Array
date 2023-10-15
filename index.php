<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body>

<?php

include 'config.php';

if(isset($_POST['btn'])){

 $search= $_POST['txt'];

  $sql="SELECT * From user Where name LIKE '%$search%'";
  $result=mysqli_query($conn,$sql);
}
else{

    $sql="SELECT * From user";
    $result=mysqli_query($conn,$sql);
}



?>

   

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <br>
                    <div class="row">
                        <div class="col-md-9">
                            
                            <a class="btn btn-primary" href="addproduct.php">Add products</a>
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="txt" placeholder="Search Here">
                        </div>
                        <div class="col-md-1">
                            <input type="submit" value="Search" name="btn">
                        </div>
                    </div>
                </form>
                <br>
                <div class="card">
                    <div class="card-title">
                        <h5 class="text-center text-white bg-black">User data</h5>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            if(mysqli_num_rows($result)>0){

                                while($row=mysqli_fetch_assoc($result)){

                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['Email']?></td>
                                        <td><?php echo $row['password']?></td>
                                    </tr>
                                    
                                    <?php
                                }
                            }
                            else{

                                ?><h5 class="text-center text-black">Data Not Found</h5><?php
                            }
                            
                            ?>
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>