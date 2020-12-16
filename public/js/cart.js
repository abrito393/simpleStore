var productId ;

$( ".addProduct" ).click(function() {
    productId = $(this).data('id');
    $.ajax({
        url: urladdProduct,
        type: 'POST',
        headers: {'X-CSRF-TOKEN': tokenCsrf},
        datatype: 'json',
        data:{
            access_token : sessionStorage.getItem("access_token"),
            product : productId
        },
        headers: {'Authorization': 'Bearer '+sessionStorage.getItem("access_token")},
        success:function( respuesta ){

        },
        statusCode: {
            200: function(response) {
                alert('!Producto agregado! para verlo click en la opcion CARRITO');
                window.location.href = "/";
            },
            400: function(response) {
                sessionStorage.clear();
                window.location.href = "/";
            },
            404: function(response) {
                sessionStorage.clear();
                window.location.href = "/";
            },
            500: function(response) {
                sessionStorage.clear();
                window.location.href = "/";
            }
        }
    });
});

$( ".btnPay" ).click(function() {
    $.ajax({
        url: urlUserShow,
        type: 'POST',
        headers: {'X-CSRF-TOKEN': tokenCsrf},
        datatype: 'json',
        data:{
        },
        headers: {'Authorization': 'Bearer '+sessionStorage.getItem("access_token")},
        success:function( respuesta ){

        },
        statusCode: {
            200: function(response) {
                window.location.href = urlcheckoutCart+"/"+response.user.id;
            },
            400: function(response) {
                sessionStorage.clear();
                window.location.href = "/";
            },
            404: function(response) {
                sessionStorage.clear();
                window.location.href = "/";
            },
            500: function(response) {
                sessionStorage.clear();
                window.location.href = "/";
            }
        }
    });
});

checkCart();
function checkCart() {
    $( ".modal-body" ).empty();
    $.ajax({
        url: urlcheckCart,
        type: 'POST',
        headers: {'X-CSRF-TOKEN': tokenCsrf},
        datatype: 'json',
        data:{
            access_token : sessionStorage.getItem("access_token"),
        },
        headers: {'Authorization': 'Bearer '+sessionStorage.getItem("access_token")},
        success:function( respuesta ){
            
        },
        statusCode: {
            200: function(response) {
                console.log(response);

                for (let index = 0; index < response.length; index++) {
                    $( ".modal-body" ).append('<div class="card bg-dark text-white"><div class="card-body">Producto: '+response[index].product.name+' - Precio: '+response[index].product.price+'$</div></div><br>');
                }

                if(response.length <= 0)
                {
                    $( ".btnPay" ).hide();
                }
            },
            400: function(response) {
                
            },
            404: function(response) {
                
            },
            500: function(response) {
                
            }
        }
    });
}
