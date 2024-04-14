document.getElementById('delete_user').onclick = function (e){
    if(!confirm('Вы действительно хотите удалить аккаунт?')) e.preventDefault();
}