<?php
use MongoDB\Client;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';  // Adjust path if needed

// Directly specify the MongoDB URI for testing
$mongoUri = 'mongodb+srv://galexport08:zZdWBtdOeXG6bg2M@zoo-project-cluster.qvl73.mongodb.net/test_database?retryWrites=true&w=majority';

try {
    $client = new MongoDB\Client($mongoUri);
    $db = $client->test_database;
    $collection = $db->user_update;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if ($email === false || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Please enter a valid email address";
        } else {
            $existingUser = $collection->findOne(['email' => $email]);

            if ($existingUser) {
                echo "User already exists";
            } else {
                $document = $collection->insertOne([
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email
                ]);

                if ($document->getInsertedCount() === 1) {
                    echo "User added successfully";
                } else {
                    echo "Server cannot process your request";
                }
            }
        }
    } else {
        echo "Invalid request method";
    }
} catch (Exception $e) {
    echo "Could not connect to Atlas database. " . $e->getMessage();
}

