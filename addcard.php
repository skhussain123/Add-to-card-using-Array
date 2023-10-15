<?php
    session_start();
   // session_destroy();
if (isset($_SESSION['card'])) {

    $a = $_SESSION['card'];
    echo $total = count($a);
} else {
    echo $total = 0;
}


if(isset($_POST['btn_card'])){
 


     $id =$_POST['card_id'];
     $name =$_POST['name'];
     $desc =$_POST['description'];
    
    if($_SESSION['card']){

      $check_pro=array_column($_SESSION['card'],'pro_id');
      if(in_array($id,$check_pro)){
     header("location:showproduct.php?txt=Already Added Cart ");
      echo 'Already Added';
     }
     else{
      $_SESSION['card'][]=array('pro_id'=> $id,'pro_name'=>$name,'pro_desc'=>$desc);
      header("location:showproduct.php?txt=Add Cart success");

     }
      

    }
    else{
        $_SESSION['card'][]=array('pro_id'=> $id,'pro_name'=>$name,'pro_desc'=>$desc);
        header("location:showproduct.php?txt=Add Cart success");
      
      header("location:showproduct.php?txt=Add Cart success");
    }

      
       
}

