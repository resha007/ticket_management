

$(document).ready(function() {//alert("test123");
    $("#update").prop("disabled",true);
    $("#delete").prop("disabled",true);
    $("#serial_no").focus();
    var action,data = '';


    // $(".search").select2({
        
    // });


    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)  
        }
    });
    //alert("test123");

    //load categories
    $.ajax({
        type : "POST",
        url		: "category/get",
        dataType : 'json',
        async : true,
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data	: { id: 1 },
        success: function(data) {//alert(data);
            if(data){
                $('#category').empty();
                $('#category').html('<option value="0" selected="selected" disabled="disabled">Select a Category</option>');
                for(var a=0; a<data.length; a++){
                    $('#category').append($("<option></option>").attr("value",data[a]['id']).text(data[a]['description']));
                }
            }else{
                
            }
        }
    });

    //load branches
    $.ajax({
        type : "POST",
        url		: "branch/get",
        dataType : 'json',
        async : true,
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data	: { id: 1 },
        success: function(data) {//alert(data);
            if(data){
                $('#branch').empty();
                $('#branch').html('<option value="0" selected="selected" disabled="disabled">Select a branch</option>');
                for(var a=0; a<data.length; a++){
                    $('#branch').append($("<option></option>").attr("value",data[a]['id']).text(data[a]['description']));
                }
            }else{
                
            }
        }
    });

    //load models
    $.ajax({
        type : "POST",
        url		: "model/get",
        dataType : 'json',
        async : true,
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data	: { id: 1 },
        success: function(data) {//alert(data);
            if(data){
                $('#model').empty();
                $('#model').html('<option value="0" selected="selected" disabled="disabled">Select a model</option>');
                for(var a=0; a<data.length; a++){
                    $('#model').append($("<option></option>").attr("value",data[a]['id']).text(data[a]['name']));
                }
            }else{
                
            }
        }
    });

    //load assignees
    $.ajax({
        type : "POST",
        url		: "user/get",
        dataType : 'json',
        async : true,
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data	: { id: 1 },
        success: function(data) {//alert(data);
            if(data){
                $('#assignee').empty();
                $('#assignee').html('<option value="0" selected="selected" disabled="disabled">Select a officer</option>');
                for(var a=0; a<data.length; a++){
                    $('#assignee').append($("<option></option>").attr("value",data[a]['id']).text(data[a]['first_name']));
                }
            }else{
                
            }
        }
    });

    $( "#add" ).click(function() {
        if(validate() != '1'){
            $.ajax({
                type : "POST",
                url		: "ticket/save",
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

    //check serial no exist
    $("#serial_no").change(function(){
        $.ajax({
            type : "POST",
            url		: "ticket/serial_check",
            dataType : 'json',
            async : true,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data	: $('form').serialize(),
            success: function(data) {//alert(data["status"]);
                if(data){
                    if(data["status"]){
                        Toast.fire({
                            type: 'error',
                            title: 'This device already exist on IN status'
                        });
                        $("#serial_no").val("");
                        $("#serial_no").focus();
                    }
                    
                }else{
                    
                }
            }
        });
    });

    $( "#update" ).click(function() {//alert(getIdSelections());
        Swal.fire({
            width:'400px',
            padding:null,
            title: 'Are you sure?',
            position: 'bottom',
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
                    url		: "ticket/update",
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
                    
        })
        
    });

    
    $( "#delete" ).click(function() {
        Swal.fire({
            width:'400px',
            padding:null,
            title: 'Are you sure?',
            position: 'bottom',
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
                    url		: "ticket/delete",
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
                    //$("#reset").click();
        })
        
    });

    // $( "#dataTable" ).click(function() {
    //     var id = getIdSelections();

    //     $("#update").prop("disabled",false);
    //     $("#delete").prop("disabled",false);
    //     $("#add").prop("disabled",true);

    //     $.ajax({
    //         type : "POST",
    //         url		: "profile/by_id", 
    //         dataType : 'json',
    //         async : true,
    //         data	: { id: id },
    //         success: function(data) {//alert(data["data"]["first_name"]);
    //             if(data){
    //                 $("#id").val(data["data"]["id"]);
    //                 $("#first_name").val(data["data"]["first_name"]);
    //                 $("#last_name").val(data["data"]["last_name"]);
    //                 $("#address").val(data["data"]["address"]);
    //                 $("#city").val(data["data"]["city"]);
    //                 $("#dob").val(data["data"]["dob"]);
    //                 $("#nic").val(data["data"]["nic"]);
    //                 $("#gender").val(data["data"]["gender"]);
    //                 $("#contact_no").val(data["data"]["contact_no"]);
    //                 $("#email").val(data["data"]["email"]);
    //                 $("#line").val(data["data"]["line_id"]);
    //                 $("#status").val(data["data"]["status"]);
    //             }else{
    //                 Toast.fire({
    //                     type: 'error',
    //                     title: 'Something went wrong. Please try again.'
    //                 });
    //             }
    //         }
    //     });
    //     //alert(id);
    // });

    // $('#dataTable').DataTable({
    //     columnDefs: [
    //         {
    //             target: 0,
    //             visible: false,
    //             searchable: false,
    //         }
    //     ],
    // });

    $( "#dataTable" ).click(function() {
        
        var id = getIdSelections();

        $("#update").prop("disabled",false);
        $("#delete").prop("disabled",false);
        $("#add").prop("disabled",true);
        
        $.ajax({
            type : "POST",
            url		: "ticket/by_id",
            dataType : 'json',
            async : true,
            data	: { id: id },
            success: function(data) {//alert(data["data"]["status_id"]);
                if(data){
                    $("#id").val(data["data"]["id"]);
                    $("#serial_no").val(data["data"]["serial_no"]);
                    $("#model").val(data["data"]["model_id"]);
                    $("#branch").val(data["data"]["branch_id"]);
                    $("#category").val(data["data"]["category_id"]);
                    $("#date_time").val(data["data"]["date_time"]);
                    $("#comment").val(data["data"]["comment"]);
                    $("#status").val(data["data"]["status_id"]);
                }else{
                    Toast.fire({
                        type: 'error',
                        title: 'Something went wrong. Please try again.'
                    });
                }
            }
        });
    });

    // //validations
    function validate(){
        var err = 0;

        var elem = document.getElementById('dataForm').elements;
        for(var i = 0; i < elem.length; i++){
            if(elem[i].type != "button" && elem[i].type != "reset" && elem[i].id != "id" && elem[i].id != "comment" && elem[i].id != "assignee"){
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