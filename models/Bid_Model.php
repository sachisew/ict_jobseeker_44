<?php

class Bid_Model extends Model{
    function __construct()
    {
       parent :: __construct(); 
    }

    function run_insert_bid($data)
   {
      $contract_ID=$data['contract_ID'];
      $bid=$data['bid'];
      $proposal=$data['proposal'];
      $jobseeker_ID=$_SESSION['User_ID'];

      //query for get contract provider id of relevent contract
      $query1="SELECT Contract_provider_ID FROM contract WHERE Contract_ID=$contract_ID";
      $stmt1=$this->db->prepare($query1);   
      $stmt1->execute();
      $contractprovider_ID=$stmt1->fetch();

      $query2="INSERT INTO dobid (Bid_value ,Bid_proposal,Jobseeker_ID,Contract_provider_ID,Contract_ID )
      VALUES (?,?,?,?,?)";
      $stmt2=$this->db->prepare($query2);   
      $stmt2->execute([$bid,$proposal,$jobseeker_ID,$contractprovider_ID, $contract_ID]);
      
   
   }
   function select_data_table()
   {
    //    $sql = "SELECT user.User_ID, Email, First_name, Last_name, Counsellor_provide_mock_interviews, Phone_number\n"

    //        . "                FROM user\n"

    //        . "                JOIN counsellor ON user.User_ID = counsellor.User_ID\n"

    //        . "                ORDER BY user.User_ID;";;

        //    $stmt1="SELECT  `Bid_value`, `Bid_proposal`,
        //    `Jobseeker_ID`
        //     FROM `dobid`";

$stmt1 = "SELECT  `Bid_value`, `Bid_proposal`,\n"

. "               `Jobseeker_ID`\n"

. "                FROM `dobid`;";

// $stmt1->execute();
// $s=$stmt1->fetchAll();

// return $s;
       $x = $this->db->runQuery($stmt1);
    //    print_r($x);
      // echo "query executed $x";

       return $x;
       

   }

   
}



?>