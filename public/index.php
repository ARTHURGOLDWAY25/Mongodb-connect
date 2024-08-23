<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>CRUD method</title>
</head>
<body>
 

<!-- header -->
 <header>

 </header>

 <!-- main -->

 <main>
    <form action="script.php" method="post">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" placeholder="First Name" required><br><br>

        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required><br><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" required><br><br>

        <button type="submit">Submit</button> 
        <button type="submit" id="update-user">Click to update user</button>
        <a href="update.php" id="update-user">Click to update user</a>
    </form>
</main>


 <!-- footer -->
  <footer>

  </footer>

    
</body>
</html>