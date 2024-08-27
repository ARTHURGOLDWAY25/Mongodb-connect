<?php

use Dotenv\Dotenv;
use MongoDB\Client;

require __DIR__ . '/vendor/autoload.php';

$mongoUri = "mongodb+srv://galexport08:zZdWBtdOeXG6bg2M@zoo-project-cluster.qvl73.mongodb.net/test_database?retryWrites=true&w=majority";

header('Content-Type: application/json');

try {
    $client = new Client($mongoUri);
    $db = $client->test_database;
    $collection = $db->user_update;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if ($email === false || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['error' => 'Please enter a valid email']);
        } else {
            $targetUser = $collection->findOne(["email" => $email]);

            if ($targetUser) {
                $deleteUser = $collection->deleteOne(["email" => $email]);

                if ($deleteUser->getDeletedCount() === 1) {
                    echo json_encode(["success" => "User successfully deleted."]);
                } else {
                    echo json_encode(["error" => "User was not deleted."]);
                }

            } else {
                echo json_encode(['error' => 'User does not exist in the database.']);
            }
        }

    } else {
        echo json_encode(['error' => 'Invalid request method.']);
    }
    
} catch (Exception $e) {
    echo json_encode(["error" => "Could not connect to the server: " . $e->getMessage()]);
}


