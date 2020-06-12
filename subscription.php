<?php
header("Content-Type:application/json");
if (isset($_GET['user_id']) && $_GET['user_id']!="") {
 include('db.php');
 $user_id = $_GET['user_id'];
 $company_id = $_GET['company_id'];
 $subscription_plan = $_GET['subscription_plan'];
 $subscription_name = $_GET['subscription_name']; 
 $cost = $_GET['cost']; 
 $starting_time = $_GET['starting_time']; 
 $expiry_time = $_GET['expiry_time']; 
 $result = mysqli_query(
 $con,
 "SELECT * FROM `transactions` WHERE user_id=$user_id");
 if(mysqli_num_rows($result)>0){
 $row = mysqli_fetch_array($result);
 $company_id = $_row['company_id'];
 $subscription_plan = $_row['subscription_plan'];
 $subscription_name = $_row['subscription_name']; 
 $cost = $_row['cost']; 
 $starting_time = $_row['starting_time']; 
 $expiry_time = $_row['expiry_time']; 

 $response_code = $row['response_code'];
 $response_desc = $row['response_desc'];
 response($user_id, $company_id, $subscription_plan, $subscription_name, $cost, $starting_time, $expiry_time);
 mysqli_close($con);
 }else{
 response(NULL, NULL, NULL, NULL, NULL, NULL, "08:00","No Record Found");
 }
}else{
 response(NULL, NULL, NULL, NULL, NULL, NULL, "06:00","Invalid Request");
 }
 
function response($user_id,$name,$response_code,$response_desc){
 $response['user_id'] = $user_id;
 $response['company_id'] = $company_id;
 $response['subscription_plan'] = $subscription_plan;
 $response['subscription_name'] = $subscription_name;
 $response['cost'] = $cost;
 $response['starting_time'] = $starting_time;
 $response['expiry_time'] = $expiry_time;
  $json_response = json_encode($response);
 echo $json_response;
}
?>