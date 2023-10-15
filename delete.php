<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php

    session_start();

    if (isset($_GET['id'])) {

         $id = $_GET['id'];}

        if(isset($_SESSION['card'])){

            $check_pro = array_column($_SESSION['card'], 'pro_id');

            if (in_array($id, $check_pro)) {
                
               $product_index = array_search($id, $check_pro);
               
               unset($_SESSION['card'][$product_index]);
               $_SESSION['card'] = array_values($_SESSION['card']);
            
               header("location: viewcard.php?txt=Delete successful");
            
            }
            else{
                echo'no';
            }
        }
    


    ?>

</body>

</html>