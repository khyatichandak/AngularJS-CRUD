<?php
include '../db/connect.php';

$data=array();
$query_selectBooks="select * from productinfo";
$result_selectBooks= mysqli_query($con, $query_selectBooks);
while($row= mysqli_fetch_assoc($result_selectBooks)){
    $data[]=$row;
}
echo json_encode($data);
?>

