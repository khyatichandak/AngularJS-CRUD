<?php

include '../db/connect.php';
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;

$query_deleteData = "delete from productinfo where id=$id";
$result_deleteData = mysqli_query($con, $query_deleteData);

if ($result_deleteData) {
    echo "Data deleted successfully.";
} else {
    echo "Data deletion failed.";
}
?>