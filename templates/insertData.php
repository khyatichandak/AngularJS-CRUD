<?php

include '../db/connect.php';

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->name) || $data->name == "" || !isset($data->description) || $data->description == "" || !isset($data->price) ||
        $data->price == "" || !isset($data->author) || $data->author == "" || !isset($data->category) || $data->category == "") {
    echo "Enter all details please";
}
else if(!is_numeric($data->price)){
    echo "Enter number only in Price";
}else {
    $bookName = $data->name;
    $bookDescription = $data->description;
    $bookPrice = $data->price;
    $bookAuthor = $data->author;
    $bookCategory = $data->category;
    $query_insertData = "insert into productinfo(book_name,book_description,book_price, book_author, category) "
            . "values('$bookName','$bookDescription','$bookPrice','$bookAuthor','$bookCategory')";
    $result_insertData = mysqli_query($con, $query_insertData);

    if ($result_insertData) {
        echo "Data Inserted successfully";
    } else {
        echo "Data insertion failed, try again";
    }
}
?>
