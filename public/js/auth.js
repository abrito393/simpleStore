var tokenCsrf = $( "input[name='_token']" ).val();
$( ".spanError" ).hide();
$( ".errorText" ).hide();
$( ".btnUser" ).hide();
$( ".btnLogin" ).hide();
$( ".btnUserClient" ).hide();
$( ".btnCloseSession" ).hide();
$( ".btnCreateAddress" ).hide();
if(sessionStorage.getItem("access_token") != null){
    $( ".btnUser" ).text(sessionStorage.getItem("user"));
    $( ".btnUserClient" ).text(sessionStorage.getItem("user"));
    $( ".btnCloseSession" ).show();
    if(sessionStorage.getItem("user_type_id") == "admin"){
        $( ".btnUser" ).show();
    }
    if(sessionStorage.getItem("user_type_id") == "client"){
        $( ".btnUserClient" ).show();
        $( ".btnCreateAddress" ).show();
    }
}else{
    $( ".btnLogin" ).show();
}

$( "#btnLogin" ).click(function() {
    $( ".spanError" ).hide();
    if(!$("#email").val()){
        $("#errorEmail").show();return 1;
    }
    if(!$("#password").val()){
        $("#errorPsw").show();return 1;
    }
    sessionStorage.clear();
    $.ajax({
        url: urlx,
        type: 'POST',
        headers: {'X-CSRF-TOKEN': tokenCsrf},
        datatype: 'json',
        data:{
            email : $("#email").val(),
            password : $("#password").val()
        },
        success:function( respuesta ){

        },
        statusCode: {
            200: function(response) {
                sessionStorage.setItem("access_token", response.access_token);
                sessionStorage.setItem("user_type_id", response.user_type_id);
                sessionStorage.setItem("user", response.user.name);
                window.location.href = "/";
            },
            400: function(response) {
                $( ".errorText" ).empty();
                $( ".errorText" ).append('<h5>Email o Contraseña incorrrecto!</h5>');
                $( ".errorText" ).show();
                $( ".errorText" ).delay(3200).fadeOut(1000);
                console.log('ajax.statusCode: 400');
            },
            404: function(response) {
                $( ".errorText" ).empty();
                $( ".errorText" ).append('<h5>Email o Contraseña incorrrecto!</h5>');
                console.log('ajax.statusCode: 404');
            },
            500: function(response) {
                $( ".errorText" ).empty();
                $( ".errorText" ).append('<h5>Email o Contraseña incorrrecto!</h5>');
                console.log('ajax.statusCode: 500');
            }
        }
    });
});

$( ".btnCloseSession" ).click(function() {
    sessionStorage.clear();
    window.location.href = "/";
});




checkUser();
function checkUser() {
    if(sessionStorage.getItem("access_token") != null){
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