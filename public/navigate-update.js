document.addEventListener('DOMContentLoaded', function(event){
    event.preventDefault()

    const navigateToUpdatePage = document.getElementById('update-navigate-button');
    navigateToUpdatePage.addEventListener('click', function(){
        window.location.href = './update.php'
    })
})