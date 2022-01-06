

$(document).ready(function() {//alert("test123");
    $("#update").prop("disabled",true);
    $("#delete").prop("disabled",true);
    $("#opt_rider").prop("disabled",true);
    var action,data = '';

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    //alert("test123");

    //load employees as riders
    $.ajax({
        type : "POST",
        url		: "employee/get_by_type",
        dataType : 'json',
        async : true,
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data	: { type: 2 },
        success: function(data) {//alert(data);
            if(data){
                $('#rider').empty();
                $('#rider').html('<option value="0" selected="selected" disabled="disabled">Select a Rider</option>');
                for(var a=0; a<data.length; a++){
                    $('#rider').append($("<option></option>").attr("value",data[a]['id']).text(data[a]['first_name']+' '+data[a]['last_name']));
                }
            }else{
                
            }
        }
    });

    //load employees as opt riders
    $( "#rider" ).change(function() {
        $("#opt_rider").prop("disabled",false);

        $.ajax({
            type : "POST",
            url		: "employee/get_by_type",
            dataType : 'json',
            async : true,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data	: { type: 2 },
            success: function(data) {//alert(data);
                if(data){
                    $('#opt_rider').empty();
                    $('#opt_rider').html('<option value="0" selected="selected" disabled="disabled">Select a Optional Rider</option>');
                    for(var a=0; a<data.length; a++){
                        if($("#rider").val() == data[a]['id']){
                            $('#opt_rider').append($("<option disabled></option>").attr("value",data[a]['id']).text(data[a]['first_name']+' '+data[a]['last_name']+"- Rider"));
                        }else{
                            $('#opt_rider').append($("<option></option>").attr("value",data[a]['id']).text(data[a]['first_name']+' '+data[a]['last_name']));
                        }
                        
                    }
                }else{
                    
                }
            }
        });
    });


    $( "#add" ).click(function() {
        if(validate() != '1'){
            $.ajax({
                type : "POST",
                url		: "line/save",
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
                        $("#opt_rider").prop("disabled",true);
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
                    url		: "line/update",
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
                            $("#opt_rider").prop("disabled",true);
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
                    url		: "line/delete",
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
        
                            $("#elete").prop("disabled",true);
                            $("#delete").prop("disabled",true);
                            $("#add").prop("disabled",false);
                            $("#opt_rider").prop("disabled",true);
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
        $("#opt_rider").prop("disabled",false);

        $.ajax({
            type : "POST",
            url		: "employee/get_by_type",
            dataType : 'json',
            async : true,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data	: { type: 2 },
            success: function(data) {//alert(data);
                if(data){
                    $('#opt_rider').empty();
                    $('#opt_rider').html('<option value="0" selected="selected" disabled="disabled">Select a Optional Rider</option>');
                    for(var a=0; a<data.length; a++){$('#opt_rider').append($("<option></option>").attr("value",data[a]['id']).text(data[a]['first_name']+' '+data[a]['last_name']));
                        // if($("#rider").val() == data[a]['id']){
                        //     $('#opt_rider').append($("<option disabled></option>").attr("value",data[a]['id']).text(data[a]['first_name']+' '+data[a]['last_name']+"- Rider"));
                        // }else{
                        //     $('#opt_rider').append($("<option></option>").attr("value",data[a]['id']).text(data[a]['first_name']+' '+data[a]['last_name']));
                        // }
                        
                    }
                }else{
                    
                }
            }
        });

        $.ajax({
            type : "POST",
            url		: "line/by_id",
            dataType : 'json',
            async : true,
            data	: { id: id },
            success: function(data) {//alert(data["data"]["first_name"]);
                if(data){
                    $("#id").val(data["data"]["id"]);
                    $("#code").val(data["data"]["code"]);
                    $("#name").val(data["data"]["name"]);
                    $("#rider").val(data["data"]["rider_id"]);
                    $("#opt_rider").val(data["data"]["opt_rider_id"]);
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