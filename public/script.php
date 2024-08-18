<?php
use MongoDB\Client;
use Dotenv\Dotenv;

require "vendor/autoload.php";

// Load environment variables from the .env file
$dotenv = Dotenv::createImmutable(__DIR__ ); // Adjust path if needed
;
$dotenv->load();

try {
    // Connect to MongoDB using the URI from the environment variables
    $client = new MongoDB\Client(getenv('MONGODB_URI'));
    $db = $client->test_database;
    $collection = $db->users;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if ($email === false || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Please enter a valid email address";
        } else {
            // Check if the user already exists
            $existingUser = $collection->findOne(['email' => $email]);

            if ($existingUser) {
                echo "User already exists";
            } else {
                // Insert user data
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
