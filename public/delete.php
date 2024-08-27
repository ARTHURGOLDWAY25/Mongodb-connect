<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./delete-style.css">
    <title>Delete user</title>
</head>
<body>
    
    <main>
        <form action="delete-script.php" method="post" id="delete-form">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" placeholder="First Name" required><br><br>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" placeholder="Last Name" required><br><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required><br><br>

            <button type="submit">Delete user</button> 
            <button type="submit" id="user-delete">Go to user create page</button>
        </form>

        <div class="user-delete-modal" style="display: none;">
            <div class="deleted-user">
                <!-- Modal content will be inserted here -->
            </div>
              <button onclick="closeModal()">Close</button>
        </div>
    </main>

    <script>
        function closeModal(){
            document.querySelector(".user-delete-modal").style.display = 'none'
        }
    </script>

    <script src="navigate-createUser.js"></script>

    <script>
        fetch('./delete_js/delete.js')
          .then(response = response.text())
          .then(javaScriptContent =>{
            const element = document.createElement('script')
            element.textContent = javaScriptContent
            document.body.appendChild('script')
          })
         .catch(error => console.error('Error loading script:', error));
        

    </script>
    
</body>
</html>

