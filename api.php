<?php
header("Content-Type:application/json");
if (isset($_GET['id']) && $_GET['id']!="") {
 include('db.php');
 $id = $_GET['id'];
 $result = mysqli_query(
 $con,
 "SELECT * FROM `transactions` WHERE id=$id");
 if(mysqli_num_rows($result)>0){
 $row = mysqli_fetch_array($result);
 $name = $row['name'];
 response($id, $name);
 mysqli_close($con);
 }else{
 response(NULL, NULL);
 }
}else{
 response(NULL, NULL);
 }
function response($id,$name,$response_code,$response_desc){
 $response['id'] = $id;
 $response['name'] = $name;
 $json_response = json_encode($response);
 echo $json_response;
}
?>

