

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

    $( "#loanForm" ).submit(function() {
        $.ajax({
            type : "POST",
            url		: "loancontroller/save",
            dataType : 'json',
            async : true,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data	: $('form').serialize(),
            success: function(data) {alert("data saving successfull!");
                
                $("#reset").click();
            }
        });
    });

//     <script type="text/javascript">
//      document.getElementById("add").onclick = function () {
//         location.href = "loan_list.php";
//      };
// </script>    
    
});

//     <script type="text/javascript">
//      document.getElementById("add").onclick = function () {
//         location.href = "loan_list.php";
//      };
// </script>                             
