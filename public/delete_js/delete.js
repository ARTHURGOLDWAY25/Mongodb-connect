document.getElementById('delete-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const email = document.getElementById('email').value;

    
    fetch('./delete-script.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded', // Match the data format
        },
        body: new URLSearchParams(new FormData(event.target)).toString()
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Could not read user data.');
        }
    })
    .then(data => {
        if (data.error) {
            document.querySelector('.deleted-user').innerText = data.error;
        } else {
            document.querySelector('.deleted-user').innerHTML = `
                <p>The following user has been successfully deleted:</p>
                <p>First Name: ${data.first_name}</p>
                <p>Last Name: ${data.last_name}</p>
                <p>Email: ${data.email}</p>
            `;
        }

        document.querySelector('.user-delete-modal').style.display = 'block';
    })
    .catch(error => {
        console.error('Error:', error);
        document.querySelector('.deleted-user').innerText = 'An error occurred';
        document.querySelector('.user-delete-modal').style.display = 'block';
    });
});

