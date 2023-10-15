<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php
    include 'config.php';

    if (isset($_POST['btn'])) {


        $search = $_POST['txt'];
        $sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
    } else {

        $sql = "SELECT * From products";
        $result = mysqli_query($conn, $sql);
    }


    ?>

    <div class="container">
      
        <form action="" method="post">
            <div class="row">
                <div class="col-md-8">'
                    <br>
                    <br>
                    <a href="viewcard.php" class="btn-primary btn">View Card</a>
                    </div>
                    <div class="col-md-3">
                    <br>
                    <br>
                    <input type="text" name="txt" class="form-control" placeholder="Search here" name="" id="">
                </div>
                <div class="col-md-1">
                    <br>
                    <br>
                    <input type="submit" name="btn" class="btn btn-primary" value="search">
                </div>

            </div>
        </form>
        <?php

        if(isset($_GET['txt'])){
         $msg=$_GET['txt'];
         ?><p class="text-danger"><?php echo $msg?></p><?php
        }
        
        
        ?>
        <div class="container">
          
            <div class="row">
                <?php

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-md-3 mr-3">
                            <br>
                            <br>
                            <br>
                            <form action="addcard.php" method="post">
                            <div class="card">
                                <img src="<?php echo $row['image_path'] ?>" class="card-img-top" alt="Image Description">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                    <input type="hidden" name="card_id" value="<?php echo $row['id']?>">
                                    <input type="hidden" name="name" value="<?php echo $row['name']?>">
                                    <input type="hidden" name="description" value="<?php echo $row['description']?>">
                                    <p class="card-text"><?php echo $row['description'] ?></p>
                                    
                                   <input name="btn_card" type="submit" class="btn btn-primary" value="Add to card">
                                </div>
                            </div>
                            </form>
                        </div>

                <?php
                    }
                }
                else{
                    echo 'No data found';
                }


                ?>




            </div>
        </div>

    </div>







    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>