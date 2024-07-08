<?php
header("Content-Type: application/json");

include 'db_conn.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $sql = "SELECT * FROM images";
        $result = mysqli_query($conn, $sql);
        $images = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $images[] = $row;
        }

        echo json_encode($images);
        break;

    case 'POST':
        $image_url = $_POST['image_url'];

        $sql = "INSERT INTO images (image_url) VALUES ('$image_url')";
        if (mysqli_query($conn, $sql)) {
            $response = array("status" => "success", "message" => "Image URL added successfully");
        } else {
            $response = array("status" => "error", "message" => "Failed to add image URL");
        }

        echo json_encode($response);
        break;

    default:
        echo json_encode(array("status" => "error", "message" => "Invalid request method"));
        break;
}

mysqli_close($conn);
