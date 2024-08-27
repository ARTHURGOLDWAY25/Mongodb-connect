<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./update-style.css">
    <title>Update user</title>
</head>
<body>
    
    <main>
        <form action="update-script.php" method="post" id="update-form">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" placeholder="First Name" required><br><br>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" placeholder="Last Name" required><br><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required><br><br>

            <button type="submit">Update</button> 
            <button type="submit" id="user-delete">Go to user delete page</button>
        </form>

        <div class="user-modification-modal" style="display: none;">
            <div class="modified-user-display">
                <!-- Modal content will be inserted here -->
            </div>
              <button onclick="closeModal()">Close</button>
        </div>
    </main>

<script>
    function closeModal() {
    document.querySelector('.user-modification-modal').style.display = 'none';
}
</script>


<script src="./update_js/update.js"></script>
<script src="./navigate-delete.js"></script>
</body>
</html>