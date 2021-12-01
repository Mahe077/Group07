document.getElementById('insert-btn').addEventListener('click',
    function(){
        document.querySelector('.form-container-cat').style.display = 'flex';
});

document.querySelector('.close-cat').addEventListener('click',
    function(){
        document.querySelector('.form-container-cat').style.display='none';
        //document.location.href = "../view/stock-manager.php";
});