<?php

use Dotenv\Dotenv;
use MongoDB\Client;

require __DIR__ . '/../vendor/autoload.php';

$mongoUri = "mongodb+srv://galexport08:zZdWBtdOeXG6bg2M@zoo-project-cluster.qvl73.mongodb.net/test_database?retryWrites=true&w=majority";
header('Content-Type: application/json');


try {
    $client = new Client($mongoUri);
    $db = $client->test_database;
    $collection = $db->user_update;

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);

        if ($email === false || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(["error" => "Please enter a valid email address."]);
        } else {
            $result = $collection->findOne(["email" => $email]);

            if ($result) {
                echo json_encode([
                    "first_name" => $result->first_name,
                    "last_name" => $result->last_name,
                    "email" => $result->email
                ]);
            } else {
                echo json_encode(["error" => "User not found."]);
            }
        }
    } else {
        echo json_encode(["error" => "Invalid request method."]);
    }
} catch (Exception $e) {
    echo json_encode(["error" => "Could not connect to Atlas database. " . $e->getMessage()]);
}
?>


 