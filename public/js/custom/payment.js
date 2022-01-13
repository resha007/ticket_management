$(document).ready(function () {
  //alert("test123");
  $("#update").prop("disabled", true);
  $("#delete").prop("disabled", true);
  var action,
    data = "";

  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
  });
  //alert("test123");

  $("#paymForm").submit(function () {
    //alert("test123");
    //for (var a = 0; a < data["data"].length; a++) {
    $.ajax({
      type: "POST",
      url: "payment/save",
      dataType: "json",
      async: true,
      headers: { "X-Requested-With": "XMLHttpRequest" },
      data: $("#paymForm").serialize(),
      success: function (data) {
        alert(data);

        $("#reset").click();
      },
    });
    //alert("test123");
  });

  //load lines
  $.ajax({
    type: "POST",
    url: "line/get",
    dataType: "json",
    async: true,
    headers: { "X-Requested-With": "XMLHttpRequest" },
    data: { id: 1 },
    success: function (data) {
      //alert(data);
      if (data) {
        $("#line_number").empty();
        $("#line_number").html(
          '<option value="0" selected="selected" disabled="disabled">Select a Line</option>'
        );
        for (var a = 0; a < data.length; a++) {
          $("#line_number").append(
            $("<option></option>")
              .attr("value", data[a]["id"])
              .text(data[a]["code"] + " - " + data[a]["name"])
          );
        }
      } else {
      }
    },
  });

  //load employees as opt riders
  $("#line_number").change(function () {
    var id = $("#line_number :selected").val();
    //$("loan_number").val();
    //alert(lineid);

    $.ajax({
      type: "POST",
      url: "loan/byline",
      dataType: "json",
      async: true,
      headers: { "X-Requested-With": "XMLHttpRequest" },
      data: { line_id: id },
      success: function (data) {
        //alert(data["data"]);

        //alert(data["data"].length);
        //console.log(data['line']);
        //for (var i = 0; i < id.length; i++) {
        //if (data) {
        // This will clear table of the old data other than the header row
        //$("#table").find("tr:gt(0)").remove();
        $("#table").empty(); //alert(data["data"].length);
        //alert(length);
        $("#count").val(data["data"].length);
        //alert(data["data"].length);
        for (var a = 0; a < data["data"].length; a++) {
          //alert(data["data"].length);
          $("#table").append(
            "<tr><td>" +
              data["data"][a]["customer"] +
              "</td><td>" +
              data["data"][a]["line"] +
              ///////////////////////////////////////////////////
              "</td><td>" +
              "<input readonly class='form-control' value = " +
              data["data"][a]["loanid"] +
              "  name='ploan" +
              a +
              "' id='ploan" +
              a +
              "'></input>" +
              "</td><td> " +
              ////////////////////////////////////////////////////
              data["data"][a]["loanamount"] +
              "</td><td> " +
              "<input type= 'date' class='form-control'  name='pdate" +
              a +
              "' id='pdate" +
              a +
              "'></input>" +
              "</td><td> " +
              "<input class='form-control'  name='pamount" +
              a +
              "' id='pamount" +
              a +
              "'></input>" +
              "</td><td> " +
              "<select class='form-control' name='ptype" +
              a +
              "' id='ptype" +
              a +
              "'><option value='1'> Customer </option><option value='2'> Rider </option></select" +
              "</td></tr>"
          );
          //alert(length);
        }
        //     $('#opt_rider').html('<option value="0" selected="selected" disabled="disabled">Select a Optional Rider</option>');
        //     for(var a=0; a<data.length; a++){
        //         if($("#rider").val() == data[a]['id']){
        //             $('#opt_rider').append($("<option disabled></option>").attr("value",data[a]['id']).text(data[a]['first_name']+' '+data[a]['last_name']+"- Rider"));
        //         }else{
        //             $('#opt_rider').append($("<option></option>").attr("value",data[a]['id']).text(data[a]['first_name']+' '+data[a]['last_name']));
        //         }
        //     }
        // } else {
        //   //}
        // }
      },
    });
  });
});
