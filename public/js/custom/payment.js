

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


    $( "#paymForm" ).submit(function() {//alert("test123");
        $.ajax({
            type : "POST",
            url		: "payment/save",
            dataType : 'json',
            async : true,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data	: $('form').serialize(),
            success: function(data) {alert("data");
                
                $("#reset").click();
            }
        });
        //alert("test123");
    });

    //load lines
    $.ajax({
        type : "POST",
        url		: "line/get",
        dataType : 'json',
        async : true,
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data	: { id: 1 },
        success: function(data) {//alert(data);
            if(data){
                $('#line_number').empty();
                $('#line_number').html('<option value="0" selected="selected" disabled="disabled">Select a Line</option>');
                for(var a=0; a<data.length; a++){
                    $('#line_number').append($("<option></option>").attr("value",data[a]['id']).text(data[a]['code']+' - '+data[a]['name']));
                }
            }else{
                
            }
        }
    });


    //load employees as opt riders
    $( "#line_number" ).change(function() {
        var lineid = $("#line_number :selected").val();
        $("loan_number").val(); 
        //alert(lineid); 

        $.ajax({
            type : "POST",
            url		: "loan/byline",
            dataType : 'json',
            async : true,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data	: { lineid: lineid },
            success: function(data) {alert(data["customer"]);
                // if(data){
                //     $('#opt_rider').empty();
                //     $('#opt_rider').html('<option value="0" selected="selected" disabled="disabled">Select a Optional Rider</option>');
                //     for(var a=0; a<data.length; a++){
                //         if($("#rider").val() == data[a]['id']){
                //             $('#opt_rider').append($("<option disabled></option>").attr("value",data[a]['id']).text(data[a]['first_name']+' '+data[a]['last_name']+"- Rider"));
                //         }else{
                //             $('#opt_rider').append($("<option></option>").attr("value",data[a]['id']).text(data[a]['first_name']+' '+data[a]['last_name']));
                //         }
                        
                //     }
                // }else{
                    
                //}
            }
        });
    });

});
