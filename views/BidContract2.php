<?php if ( empty(session_id()) ) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include "CSS/BidContract.css" ?>
        <?php include "CSS/View_contract.css" ?>

    </style>
   
    <script src="https://kit.fontawesome.com/f299a8aeaa.js" crossorigin="anonymous"></script>
    <title>view_contract</title>
</head>
<body>
     <!-- header part start  -->
<div class="header_div" >
        <?php include 'Header.php'?>
</div>
      <!-- header part end  -->
      <?php if ( isset($_SESSION['User_ID']) && $_SESSION['User_type']=="Jobseeker" ): ?>
       <div class="main_container">
        <?php #include 'ApplyContracts.php'?>
        <!-- bid proposal parts start from here -->
<div class="bid_part">
            <div class="bid_row">
            <!-- load data from  database -->
            
            <?php
            $result = $data['result'];
            foreach ($result

                     as $row):
                ?>
            <div class="first">
                     <div class="name">
                     <?php echo $_SESSION['First_name']." ".$_SESSION['Last_name']  
                     ?>
                     </div>
                     <div class="rs_price">
                     <div class="rs">
                            Rs.
                        </div>
                        <div class="price">
                            <!-- 1500 -->
                            <?php echo $row['Bid_value'] ?>
                        </div>  
                     </div>
                     
                    </div>
                    <div class="second">
                    <!-- I have more experience with other university projects.I would like to
             do my work within average time and average
             hourly rate.I will do my best.I have good typing speed because of my previous projects. -->
             <?php echo $row['Bid_proposal'] ?>
                    </div>
            </div>
            <?php endforeach; ?>
            </div>
            <!-- <div class="bid_row">
                    <div class="first">
                     <div class="name">
                     Maneesha Yohani
                     </div>
                     <div class="rs_price">
                     <div class="rs">
                            Rs.
                        </div>
                        <div class="price">
                            1500
                        </div>  
                     </div>
                     
                    </div>
                    <div class="second">
                    I have more experience with other university projects.I would like to
             do my work within average time and average
             hourly rate.I will do my best.I have good typing speed because of my previous projects.
                    </div>
            </div> -->

        </div>
        <?php endif; ?>
    <?php if ( !isset($_SESSION['User_ID'])||$_SESSION['User_type']!="Jobseeker") : ?>
        <div class="login_msg"> Before Bid for a Contract you should login as Jobseeker</div>
        <a id="a_tag_login" href="<?php echo URL?>Login"><button class="submit_button"id="login_button">Login</button></a>
        <?php endif; ?>  
        <?php include 'Footer.php'?>

</div>
<script src="<?php echo URL ?>views/JS/View_contract.js"></script>

</body>
</html>
