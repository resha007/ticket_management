

$(document).ready(function() {//alert("test123");
    $("#update").prop("disabled",true);
    $("#delete").prop("disabled",true);
    var action,data = '';

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    //alert("test123");

    $( "#add" ).click(function() {
        if(validate() != '1'){
            $.ajax({
                type : "POST",
                url		: "user/save",
                dataType : 'json',
                async : true,
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                data	: $('form').serialize(),
                success: function(data) {
                    if(data){
                        Toast.fire({
                            type: 'success',
                            title: 'Successfully added'
                        });
                        $table.bootstrapTable('refresh');
                        $("#reset").click();

                        $("#update").prop("disabled",true);
                        $("#delete").prop("disabled",true);
                        $("#add").prop("disabled",false);
                    }else{
                        Toast.fire({
                            type: 'error',
                            title: 'Something went wrong. Please try again.'
                        });
                    }
                }
            });
        }
        
    });

    $( "#update" ).click(function() {//alert(getIdSelections());

        Swal.fire({
            width:'400px',
            padding:null,
            title: 'Are you sure?',
            position: 'top-end',
            text: "You won't be able to revert this!",
            allowEnterKey: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type : "POST",
                    url		: "user/update",
                    dataType : 'json',
                    async : true,
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    data	: $('form').serialize(),
                    success: function(data) {
                        if(data){
                            Toast.fire({
                                type: 'success',
                                title: 'Successfully updated'
                            });
                            $table.bootstrapTable('refresh');
                            $("#reset").click();
        
                            $("#update").prop("disabled",true);
                            $("#delete").prop("disabled",true);
                            $("#add").prop("disabled",false);
                        }else{
                            Toast.fire({
                                type: 'error',
                                title: 'Something went wrong. Please try again.'
                            });
                        }
                    }
                });
            }
                    //$("#reset").click();
        })
        
    });

    $( "#delete" ).click(function() {

        Swal.fire({
            width:'400px',
            padding:null,
            title: 'Are you sure?',
            position: 'top-end',
            text: "You won't be able to revert this!",
            allowEnterKey: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type : "POST",
                    url		: "user/delete",
                    dataType : 'json',
                    async : true,
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    data	: $('form').serialize(),
                    success: function(data) {//alert(data["status"]);
                        if(data){
                            Toast.fire({
                                type: 'success',
                                title: 'Successfully deleted'
                            });
                            $table.bootstrapTable('refresh');
                            $("#reset").click();
        
                            $("#update").prop("disabled",true);
                            $("#delete").prop("disabled",true);
                            $("#add").prop("disabled",false);
                        }else{
                            Toast.fire({
                                type: 'error',
                                title: 'Something went wrong. Please try again.'
                            });
                        }
                    }
                });
            }
                    
        })
        
    });

    $( "#dataTable" ).click(function() {
        var id = getIdSelections();

        $("#update").prop("disabled",false);
        $("#delete").prop("disabled",false);
        $("#add").prop("disabled",true);

        $.ajax({
            type : "POST",
            url		: "user/by_id",
            dataType : 'json',
            async : true,
            data	: { id: id },
            success: function(data) {//alert(data["data"]["first_name"]);
                if(data){
                    $("#id").val(data["data"]["id"]);
                    $("#first_name").val(data["data"]["first_name"]);
                    $("#last_name").val(data["data"]["last_name"]);
                    $("#dob").val(data["data"]["dob"]);
                    $("#nic").val(data["data"]["nic"]);
                    $("#gender").val(data["data"]["gender"]);
                    $("#contact_no").val(data["data"]["contact_no"]);
                    $("#email").val(data["data"]["email"]);
                    $("#username").val(data["data"]["username"]);
                    $("#status").val(data["data"]["status"]);
                }else{
                    Toast.fire({
                        type: 'error',
                        title: 'Something went wrong. Please try again.'
                    });
                }
            }
        });
        //alert(id);
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