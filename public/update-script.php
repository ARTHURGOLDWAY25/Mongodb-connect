<?php

use Dotenv\Dotenv;
use MongoDB\Client;

require __DIR__ . "/../vendor/autoload.php";

$mongodbUri = "mongodb+srv://galexport08:zZdWBtdOeXG6bg2M@zoo-project-cluster.qvl73.mongodb.net/test_database?retryWrites=true&w=majority";

header('Content-Type: application/json'); // Ensure the content type is JSON

try {
    $client = new Client($mongodbUri);
    $db = $client->test_database;
    $collection = $db->user_update;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if ($email === false || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(["error" => "Please enter a valid email."]);
        } else {
            $result = $collection->findOne(["email" => $email]);

            if ($result) {
                $updatedUser = $collection->updateOne(
                    ["email" => $email], // filter by email
                    ['$set' => [
                        "first_name" => $first_name,
                        "last_name" => $last_name
                    ]]
                );

                if ($updatedUser->getModifiedCount() === 1) {
                    echo json_encode([
                        "first_name" => $first_name,
                        "last_name" => $last_name,
                        "email" => $email,
                        "success" => "User modification implemented successfully."
                    ]);
                } else {
                    echo json_encode(["error" => "Could not modify user details or no changes were made."]);
                }
            } else {
                echo json_encode(["error" => "User with this email is not found in the database."]);
            }
        }
    } else {
        echo json_encode(["error" => "Invalid request method."]);
    }
} catch (Exception $e) {
    echo json_encode(["error" => "Could not connect to the server: " . $e->getMessage()]);
}

