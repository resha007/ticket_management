

$(document).ready(function() {//alert("test123");
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });


    $( "#logout" ).click(function() {
            $.ajax({
                type : "POST",
                url		: "user/logout",
                dataType : 'json',
                async : true,
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                success: function(data) {//alert(data["status"]);
                    if(data["status"]){
                        window.location.href = "login";
                    }else{
                        
                    }

                }
            });
        
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