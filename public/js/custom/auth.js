

$(document).ready(function() {//alert("test123");
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });


    $( "#login" ).click(function() {
        if(validate() != '1'){
            $.ajax({
                type : "POST",
                url		: "user/auth",
                dataType : 'json',
                async : true,
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                data	: $('form').serialize(),
                success: function(data) {//alert(data);//alert(data["status"]);
                    if(data["status"]){
                        window.location.href = "home";
                    }else{
                        Toast.fire({
                            type: 'error',
                            title: 'Username or password is incorrect. Please try again.'
                        });
                        $("#reset").click();
                        $("#username").focus();
                    }

                }
            });
        }
        
    });

    $("#password").on('keypress',function(e) {
        if(e.which == 13) {
            if(validate() != '1'){
                $.ajax({
                    type : "POST",
                    url		: "user/login",
                    dataType : 'json',
                    async : true,
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    data	: $('form').serialize(),
                    success: function(data) {//alert(data["status"]);
                        if(data["status"]){
                            window.location.href = "home";
                        }else{
                            Toast.fire({
                                type: 'error',
                                title: 'Username or password is incorrect. Please try again.'
                            });
                            $("#reset").click();
                            $("#username").focus();
                        }
    
                    }
                });
            }
        }
    });

    // //validations
    function validate(){
        var err = 0;

        var elem = document.getElementById('dataForm').elements;
        for(var i = 0; i < elem.length; i++){
            if(elem[i].type != "button" && elem[i].type != "reset" && elem[i].id != "id"){
                if(elem[i].value == '' || elem[i].value == '0'){
                    Toast.fire({
                        type: 'warning',
                        title: 'This field is required'
                        });
                        $("#"+elem[i].id).focus();
                    err = 1;
                    return err;
                }
            }
        }
    }
    
});