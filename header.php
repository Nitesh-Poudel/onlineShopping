<!DOCTYPE html>
<html lang="en">
<head>
 
</head>
<style>

/*Inside left*/


/*starts from here*/
.right{width:90%; margin-left:10px;}
.right .header{font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;line-height: 1;
    display: flex; justify-content: space-between; align-items: center;box-shadow: 5px 3px 18px 0px #888888;
    height:100px;
}


.right .header .moto h1 {
  line-height: 0;
}



.right .header .searchMenue input{
    background:transparent;
    border:1px solid gray;
    border-radius:8px;
    height:20px;
    width:30vw;
  
    
}

.right .header .searchMenue::-webkit-input-placeholder{
    font-family:cursive;
    border-bottom: #3c3d3e;
     font-size: 18px;
    
}




.right .header .extra a{
    font-family: 40px;
    color:black;

}

.list{
    display:flex;
    align-items: center;
}
.right .header .extra ul li{
   
    margin-right: 10px;
}

.right .header .extra ul li{

    margin-right: 10px;
}

.right .header .extra ul li .notification{
   
   font-size:22px;
  
   
}
.right .header .extra ul li .notification .count{
    width:20px;
    height:20px;
    background-color: red;
    border-radius:50%;
    position:relative;
    display:flex;
    justify-content: center;
    align-items: center;
    color:White;
    font-size:10px;


   
}
#notification{
   
    text-align:center;
    justify:content:center;
   
    
}



.notify{
    
    
    background:rgb(0,100,0);
    
    width:250px;
    max-height:55vh;
 opacity: 1;
   
    display:none;
    overflow:scroll;
   
   
}
.notify ul li{
    margin-top:50px;
    height:50Vh;
    border-bottom:1px dotted gray;
    text-align:left;
}

.notification:hover .notify {
   
    display:flex;
    flex-direction: column;
    margin-top:0px;
    margin-left:-10%;
    position:absolute;
    background-color: rgb(255, 252, 252);
    border-bottom-left-radius: 12px;
    border-top-left-radius: 12px;
    z-index:1;
    align-items: center;
    box-shadow: 5px 3px 18px 0px #888888;
    
  
}
.a{
    width:100%;
    border:1px solid red;
}


.nav{background-color:#1d4251; height:40px; display:flex;align-items:center;}
.nav a{color:white;margin-left:auto;margin-right:auto;text-decoration:none;background-color:#1d4251;padding:5px;border-radius:0px;}
.nav :hover,#active{background-color:#1d4251;color:gold;transition:0.5s;}



</style>
<?php 
include_once('session.php');
   
  if(isset($_SESSION['userid'])){
    $id=$_SESSION['userid'];
    $qry2=mysqli_query($con,"SELECT * FROM user WHERE uid=$id");
    $data2=mysqli_fetch_assoc($qry2);
}

?>
<body>
        <div class="outer">
                <div class="header">

                    <div class="moto">
                        </div>
                    
                    <div class="searchMenue">
                        <form method="post">
                            <input type="search" placeholder="search product..." name="search">
                            <button type="submit" name="seearch" id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    
                        <div class="extra">
                            <ul type="none">
                                <div class="list">

                                   <li >
                                            <div class="notification">

                                                        <div class="count">
                                                            <span id="notification">
                                                                <b>3</b>
                                                            </span>
                                                        </div>

                                                        <i class="fa-sharp fa-solid fa-bell"></i>


                                                    <div class="notify">
                                                        <ul type=none>
                                                            <li>Rajesh sent you proposal </li>
                                                            <li>Rajesh sent you proposal </li>
                                                            <li>Rajesh sent you proposal </li>
                                                            <li>Rajesh sent you proposal </li>

                                                            <li>Hi</li>
                                                        </ul>


                                                    </div>
                                            </div>
                                    </li>



                                    <li><a href="#"><img src="userimage/<?php echo $data2['userimg'];?>"></a><li>
                                </div>
                            </ul>

                       
                </div>
 
                        
        </div>
                   



</body>
</html>