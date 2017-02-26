$(document).ready(function () {

    $('.cart_add').click(function () {
        var id = $(this).data('id');
        var token = $(this).data('token');
        var title = $(this).data('title');
        $.ajax({
            url: '/cart_add',
            type:'POST',
            data:{'id':id,'_token':token, 'title':title},
            success: function (msg) {
                alert(title+' добавлен в корзину.');
                console.log(msg);
            }
        });
    });
});
