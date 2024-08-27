document.addEventListener('DOMContentLoaded', function(event){
    event.preventDefault()


    const navigateToUserCreatePage = document.getElementById('user-delete')

    navigateToUserCreatePage.addEventListener('click', function(){
        window.location.href = './index.php'
    })
})