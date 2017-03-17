<?php

include '../db/connect.php';

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->id) || $data->id == "" || !isset($data->name) || $data->name == "" || !isset($data->description) ||
        $data->description == "" || !isset($data->price) || $data->price == "" || !isset($data->author) || $data->author == "" || !isset($data->category) || $data->category == "") {
    echo "Enter all details please";
} else if (!is_numeric($data->price)) {
    echo "Enter number only in Price";
} else {
    $bookId = $data->id;
    $bookName = $data->name;
    $bookDescription = $data->description;
    $bookPrice = $data->price;
    $bookAuthor = $data->author;
    $bookCategory = $data->category;
    $bookDescription = str_replace("'", "\'", $bookDescription);
    $query_updateData = "update productinfo set book_name='$bookName', book_description='" . $bookDescription . "', book_price='$bookPrice', "
            . "book_author='$bookAuthor', category='$bookCategory' where id=$bookId";
    $result_updateData = mysqli_query($con, $query_updateData);

    if ($result_updateData) {
        echo "Data updated successfully";
    } else {
        echo "Data can not updated, try again";
    }
}
?>
