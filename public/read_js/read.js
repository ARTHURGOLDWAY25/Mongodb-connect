document.getElementById('input-form').addEventListener('submit', function(event){
    event.preventDefault()

    const email = document.getElementById('email').value;

    fetch(`./read-script.php?email=${encodeURIComponent(email)}`)
        .then(response=>{
            if(response.ok){
                return response.json()
            }else{
                throw new Error('Network response was not ok')
            }
        })
        .then(data=>{
            if(data.error){
                document.getElementById('user-details').innerText = data.error;
            }else{
                document.getElementById('user-details').innerHTML = `
                <p>First Name: ${data.first_name}</p>
                <p>Last Name: ${data.last_name}</p>
                <p>Email: ${data.email}</p>
                `
            }
            document.getElementById('user-details-modal').style.display = 'block'
            
        })
        .catch(error=>{
            console.error('Error', error)
            document.getElementById('user-details').innerText = 'An error occurred.'
            document.getElementById('user-details-modal').style.display = 'block'
        })
})

