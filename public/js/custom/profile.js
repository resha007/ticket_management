

$(document).ready(function() {//alert("test123");
    // $("#update").prop("disabled",true);
    // $("#delete").prop("disabled",true);
    var action,data = '';

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    //alert("test123");

    //load lines
    $.ajax({
        type : "POST",
        url		: "line/get",
        dataType : 'json',
        async : false,
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data	: { id: 1 },
        success: function(data) {//alert(data);
            if(data){
                $('#line').empty();
                $('#line').html('<option value="0" selected="selected" disabled="disabled">Select a Line</option>');
                for(var a=0; a<data.length; a++){
                    $('#line').append($("<option></option>").attr("value",data[a]['id']).text(data[a]['code']+' - '+data[a]['name']));
                }
            }else{
                
            }
        }
    });

    $( "#add" ).click(function() {
        if(validate() != '1'){
            $.ajax({
                type : "POST",
                url		: "customer/save",
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

    $( "#update" ).click(function() {
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
                    url		: "customer/update",
                    dataType : 'json',
                    async : true,
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    data	: $('#dataForm').serialize(),
                    success: function(data) {//alert(data["status"]);
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
                    url		: "customer/delete",
                    dataType : 'json',
                    async : true,
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    data	: $('#dataForm').serialize(),
                    success: function(data) {//alert(data);
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
                    //$("#reset").click();
        })
        
    });

    $( "#dataTable" ).click(function() {
        var id = getIdSelections();

        $("#update").prop("disabled",false);
        $("#delete").prop("disabled",false);
        $("#add").prop("disabled",true);

      
        //alert(id);
    });

    //var id = getIdSelections();

    $.ajax({
        type : "POST",
        url		: "profile/by_id", 
        dataType : 'json',
        async : true,
        //data	: { id: id },
        success: function(data) {//alert(data["data"]["id"]);
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
                $("#line").val(data["data"]["line_id"]);
                $("#status").val(data["data"]["status"]);
            }else{
                Toast.fire({
                    type: 'error',
                    title: 'Something went wrong. Please try again.'
                });
            }
        }
    });

    $.ajax({
        type : "POST",
        url		: "profile/loan_data_by_customer_id", 
        dataType : 'json',
        async : true,
        success: function(data) {//alert(data["data"][0]["status"]);
            if(data){
                $("#loan_amount").val(data["data"][0]["loan_amount"]);
                $("#guarantor_1").val(data["data"][0]["name"]);
                $("#guarantor_2").val(data["data"][0]["name2"]);
                $("#reason").val(data["data"][0]["reason"]);
                $("#created_by").val(data["data"][0]["created_by"]);
                $("#lstatus").val(data["data"][0]["status"]);
                
            }else{
                Toast.fire({
                    type: 'error',
                    title: 'Something went wrong. Please try again.'
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