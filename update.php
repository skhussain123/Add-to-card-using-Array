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
                <?php
                session_start();

                if ($_GET['id']) {
                   $id = $_GET['id'];
                   

                   $check_pro = array_column($_SESSION['card'], 'pro_id');

                  
                   
                   

                    if (in_array($id, $check_pro)) {
                          $product_index = array_search($id, $check_pro);
                         
                         
                        

                        $name = $_SESSION['card'][$product_index]['pro_name'];
                        $desc = $_SESSION['card'][$product_index]['pro_desc'];
                ?>
                        <br>
                        <br>
                        <h3 class=" text-primary">Update data</h3>

                        <form action="" method="post">

                            <input type="text" value="<?php echo $name ?>" name="name" id="" placeholder="products name">
                            <input type="text" value="<?php echo $desc ?>" name="desc" id="" placeholder="products Desc">
                            <input type="submit" value="update" name="btnupdate">
                        </form><?php
                            } else {
                                echo "Product not found for this ID.";
                            }
                        }
                        else{

                            'no products';
                        }
                                ?>




                <?php

                if (isset($_POST['btnupdate'])) {

                    echo $name = $_POST['name'];
                    echo  $desc = $_POST['desc'];

                    $check_pro = array_column($_SESSION['card'], 'pro_id');

                    if (in_array($id, $check_pro)) {
                        
                        $product_index = array_search($id, $check_pro);
                        

                       $_SESSION['card'][$product_index]['pro_name'] = $name;
                       $_SESSION['card'][$product_index]['pro_desc'] = $desc;

                       header("location: viewcard.php?txt=Update successful");
                    }
                    else{
                        
                    }
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