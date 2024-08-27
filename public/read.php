<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update</title>
    <link rel="stylesheet" href="read-styles.css">
    
    
</head>
<body>

<main>
    <form id="input-form" action="read-script.php" method="GET">
        <label for="email">User Email</label>
        <input type="email" name="email" id="email" placeholder="User Email" required> <br><br>
        <button type="submit" id="searchUser">Search User</button>
        <button type="submit" id="update-navigate-button">Go to update user</button>
    </form>

    <!-- Modal for displaying user details -->
    <div id="user-details-modal" style="display: none;">
        <div id="user-details">
            <!-- User details will be populated here -->
        </div>
        <button onclick="closeModal()">Close</button>
    </div>
</main>

<script>
    function closeModal() {
        document.getElementById('user-details-modal').style.display = 'none';
    }
</script>

<script>
        window.onload = function() {
        const form = document.getElementById('input-form');
        form.reset();
             };

</script>

<script src="./read_js/read.js"></script>
<script src="navigate-update.js"></script>



</body>
</html>
