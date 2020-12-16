var tokenCsrf = $( "input[name='_token']" ).val();
$( ".btnData" ).click(function() {
    $.ajax({
        url: urlUserShow,
        type: 'POST',
        headers: {'X-CSRF-TOKEN': tokenCsrf},
        datatype: 'json',
        data:{
            access_token : sessionStorage.getItem("access_token")
        },
        headers: {'Authorization': 'Bearer '+sessionStorage.getItem("access_token")},
        success:function( respuesta ){

        },
        statusCode: {
            200: function(response) {
                sessionStorage.setItem("access_token", response.access_token);
                sessionStorage.setItem("user_type_id", response.user_type_id);
                sessionStorage.setItem("user", response.user.name);
                window.location.href = urlUserData+"/"+response.user.id;
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

$( ".btnAddress" ).click(function() {
    $.ajax({
        url: urlUserShow,
        type: 'POST',
        headers: {'X-CSRF-TOKEN': tokenCsrf},
        datatype: 'json',
        data:{
            access_token : sessionStorage.getItem("access_token")
        },
        headers: {'Authorization': 'Bearer '+sessionStorage.getItem("access_token")},
        success:function( respuesta ){

        },
        statusCode: {
            200: function(response) {
                sessionStorage.setItem("access_token", response.access_token);
                sessionStorage.setItem("user_type_id", response.user_type_id);
                sessionStorage.setItem("user", response.user.name);
                window.location.href = urlUserAddress+"/"+response.user.id;
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

$( ".btnOrders" ).click(function() {
    $.ajax({
        url: urlUserShow,
        type: 'POST',
        headers: {'X-CSRF-TOKEN': tokenCsrf},
        datatype: 'json',
        data:{
            access_token : sessionStorage.getItem("access_token")
        },
        headers: {'Authorization': 'Bearer '+sessionStorage.getItem("access_token")},
        success:function( respuesta ){

        },
        statusCode: {
            200: function(response) {
                sessionStorage.setItem("access_token", response.access_token);
                sessionStorage.setItem("user_type_id", response.user_type_id);
                sessionStorage.setItem("user", response.user.name);
                window.location.href = urlUserOrders+"/"+response.user.id;
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
var res = window.location.pathname.split("/");

var IDuser =  parseInt(res[3]);
checkUser();
function checkUser() {
    if(sessionStorage.getItem("access_token") != null && !Number.isNaN(IDuser) ){
        $.ajax({
            url: urlUserShow,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': tokenCsrf},
            datatype: 'json',
            data:{
                access_token : sessionStorage.getItem("access_token")
            },
            headers: {'Authorization': 'Bearer '+sessionStorage.getItem("access_token")},
            success:function( respuesta ){

            },
            statusCode: {
                200: function(response) {
                    sessionStorage.setItem("access_token", response.access_token);
                    sessionStorage.setItem("user_type_id", response.user_type_id);
                    sessionStorage.setItem("user", response.user.name);
                    if(IDuser != response.user.id){
                        window.location.href = '/';
                    }
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
    }
}


$( ".createDireccion" ).click(function() {
    console.log(tokenCsrf);
    $.ajax({
        url: urlUserAddressSave,
        type: 'POST',
        headers: {'X-CSRF-TOKEN': tokenCsrf},
        datatype: 'json',
        data:{
            address : $("#address").val(),
            access_token : sessionStorage.getItem("access_token")
        },
        headers: {'Authorization': 'Bearer '+sessionStorage.getItem("access_token")},
        success:function( respuesta ){

        },
        statusCode: {
            200: function(response) {
                sessionStorage.setItem("access_token", response.access_token);
                sessionStorage.setItem("user_type_id", response.user_type_id);
                sessionStorage.setItem("user", response.user.name);
                window.location.href = urlUserAddress+"/"+response.user.id;
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
