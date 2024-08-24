<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update</title>
    <link rel="stylesheet" href="update-styles.css"> 
    
</head>
<body>

<main>
    <form action="update-script.php" method="post" id="input-form">
        <label for="email">User Email</label>
        <input type="email" name="email" id="email" placeholder="User Email" required> <br><br>
        <button type="submit" id="serachUser">Search User</button>
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
    
</body>
</html>
