<?php
    include_once('session.php');
    include_once('databaseconnection.php');
$qry='';$data='';

if($_SESSION['role']=='admin'){
    $userid=$_GET['userid'];
    $id=$userid;
    $qry=mysqli_query($con,"SELECT *
    FROM user WHERE uid = $userid ");

  }


if($_SESSION['role']=='buyer'){
    header('Location:proposalview.php');
}
if (isset($_SESSION['userid']) || isset($_SESSION['role'])) {
  

        if(isset($_GET['id'])){//ID of the user
            $id=$_GET['id'];


        $uid=$_SESSION['userid'];

    
     
        //fetching the data
        $data=mysqli_fetch_assoc($qry);


        
       





    }
    }
    else{
        header('location:login.php');
    }

    $link='';
   // ($data['role']=='seller')?
     //   $link='<a href="productupload.php">Upload Product</a>':$link='<a href="#">About us</a>';
   
?>


<?php 
   
?>
   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status_<?php echo $data['name']?></title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    
    <style>
        .searchMenue{display:none;}
      
        .introduction{display:flex;background-color:gray;color:white;display:flex;align-items:center}
        #person{color:gold}
        
        .description{;width:100%;margin-left:50px;}
        .image img{width:300px;border-radius:8px}
        tr,table{border:1px solid gray;border-collapse:collapse;width:80%;font-size:22px;}
        .right a{color:white}

        tr{height:36px}
        tr{border:1px solid white;}
        th,td{text-align: left;margin:16px}
       
       .nav a{border-radius:0px}
       
        
    </style>

</head>
<body>

    <div class="container">
        <div class="innercontainer">
        <?php include_once('left.php')?>


            
            <div class="right">
                <?php include_once('header.php');echo '</div>'?>
                <?php include_once('nav.php');?>
    
                   
           
                <div class="contents">
                    <div class="introduction">
                        <div class="image">
                            <img src=<?php echo '"userimage/'.$data['userimg'].'"'?>>
        
                        </div>
                        <div class="description">
                            
                           
                            <h1 id="person"><?php echo $data['name'];?></h1>
                           
                            
                            <h3>Detail as <?php echo $data['role'];?></h3>
                            <table>
                                <tr>
                                    <th><a href="home.php?id=<?php echo$id."&&tosee=Item_uploaded";?>">Item Uploaded</a></th>
                                    <td><?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM clothes WHERE retailer_id='$id' ");
                                        $row = mysqli_fetch_assoc($qry);
                                        $totalClothesCount = $row['total_count'];echo $totalClothesCount?>
                                    </td>
                                </tr>
                                
                                 <a href="seerequest.php?id=<?php echo$id;?>"><tr>
                                    <th><a href="requestview.php?id=<?php echo$id."&&todo=Item_upload";?>">Pending Request</a></th>
                                    <td><?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM orderproposal op 
                                                INNER JOIN clothes c ON op.forcloth = c.cid 
                                                WHERE c.retailer_id = '$id' and accept=0");
                                        $row = mysqli_fetch_assoc($qry);
                                        echo  $row['total_count']; ?>
                                    </td>
                                </tr></a>

                                <tr>
                                    <th><a href="acceptedrequest.php?userid=<?php echo $uid?>">Accepted Request</a></th>
                                    <td><?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM orderproposal op 
                                                INNER JOIN clothes c ON op.forcloth = c.cid 
                                                WHERE c.retailer_id = '$id' and accept=1");
                                        $row = mysqli_fetch_assoc($qry);
                                        echo  $row['total_count']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th><a href="acceptedrequest.php?userid=<?php echo $uid."&&todo=pandingOrder";?>">Pending Order</th>
                                    <td>
                                    <?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM `orders` o
                                            INNER JOIN orderproposal op ON o.pid = op.poid 
                                            INNER JOIN clothes c ON op.forcloth = c.cid 
                                            WHERE c.retailer_id = '$id' AND o.complete = 0");
                                        $row = mysqli_fetch_assoc($qry);
                                        echo  $row['total_count']; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th><a href="acceptedrequest.php?userid=<?php echo$id."&&todo=completeOrder";?>">Completed Order</th>
                                    <td>
                                    <?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count FROM `orders` o
                                            INNER JOIN orderproposal op ON o.pid = op.poid 
                                            INNER JOIN clothes c ON op.forcloth = c.cid 
                                            WHERE c.retailer_id = '$id' AND o.complete = 1");
                                        $row = mysqli_fetch_assoc($qry);
                                        echo  $row['total_count']; ?>
                                    </td>
                                </tr>

                                <tr>
                                <th><a href="home.php?id=<?php echo$id."&&tosee=Item_onsell";?>">Item On Sale</a></th>
                                    <td>
                                    <?Php  $qry=mysqli_query($con,"SELECT COUNT(*) AS total_count
                                            FROM clothes c
                                            LEFT JOIN orderproposal op ON c.cid = op.forcloth
                                            WHERE op.forcloth IS NULL and retailer_id='$id';"
                                            );
                                        $row = mysqli_fetch_assoc($qry);
                                        echo $totalClothesCount = $row['total_count']; ?>
                                   
                                    </td>
                                </tr>

                                <tr>
                                    <th>Total sales Amount</th>
                                    <td><?php 
                                            $qry=mysqli_query($con,"SELECT sum(proposalprice) AS sum FROM orderproposal op left join clothes c ON op.forcloth=c.cid  where accept=1 AND retailer_id=$uid");
                                            $row = mysqli_fetch_assoc($qry);
                                            echo $totalClothesCount = $row['sum'].'rs'; 
                                        ?>
                                     </td>
                                </tr>
                            </table>

                        
                        </div>
                    </div>

                </div>
        </div>
    </div>
             
                 
                    
                
         
</body>
</html>
