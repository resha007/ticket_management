

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
                url		: "employee/save",
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
        $.ajax({
            type : "POST",
            url		: "employee/update",
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
    });

    $( "#delete" ).click(function() {
        $.ajax({
            type : "POST",
            url		: "employee/delete",
            dataType : 'json',
            async : true,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data	: $('form').serialize(),
            success: function(data) {alert(data["status"]);
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
    });

    $( "#dataTable" ).click(function() {
        var id = getIdSelections();

        $("#update").prop("disabled",false);
        $("#delete").prop("disabled",false);
        $("#add").prop("disabled",true);

        $.ajax({
            type : "POST",
            url		: "employee/by_id",
            dataType : 'json',
            async : true,
            data	: { id: id },
            success: function(data) {//alert(data["data"]["first_name"]);
                if(data){
                    $("#id").val(data["data"]["id"]);
                    $("#first_name").val(data["data"]["first_name"]);
                    $("#last_name").val(data["data"]["last_name"]);
                    $("#address").val(data["data"]["address"]);
                    $("#city").val(data["data"]["city"]);
                    $("#dob").val(data["data"]["dob"]);
                    $("#nic").val(data["data"]["nic"]);
                    $("#gender").val(data["data"]["gender"]);
                    $("#contact_no").val(data["data"]["contact_no"]);
                    $("#email").val(data["data"]["email"]);
                    $("#username").val(data["data"]["username"]);
                    $("#type").val(data["data"]["type"]);
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
                        title: 'This field is required'+elem[i].id
                        });
                        $("#"+elem[i].id).focus();
                    err = 1;
                    return err;
                }
            }
        }
    }
    
    
});