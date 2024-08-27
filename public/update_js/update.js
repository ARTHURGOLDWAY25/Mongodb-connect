document.getElementById('update-form').addEventListener('submit', function(event){
    event.preventDefault();

    const email = document.getElementById('email').value;

    fetch('./update-script.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams(new FormData(event.target)).toString()
    })
    .then(response => {
        if(response.ok) {
            return response.json();
        } else {
            throw new Error('Could not read data.');
        }
    })
    .then(data => {
        if(data.error) {
            document.querySelector('.modified-user-display').innerText = data.error;
        } else {
            document.querySelector('.modified-user-display').innerHTML = `
                <p>User data modified successfully to:</p>
                <p>First Name: ${data.first_name}</p>
                <p>Last Name: ${data.last_name}</p>
                <p>Email: ${data.email}</p>
            `;
        }
        document.querySelector('.user-modification-modal').style.display = 'block';
    })
    .catch(error => {
        console.error('Error:', error);
        document.querySelector('.modified-user-display').innerText = 'An error occurred';
        document.querySelector('.user-modification-modal').style.display = 'block';
    });
});
