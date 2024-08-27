document.addEventListener('DOMContentLoaded', function(event){
    const navigateToDeleteUserPage = document.getElementById('user-delete');

    navigateToDeleteUserPage.addEventListener('click', function(){
        window.location.href = './delete.php'
    })
})