
$(document).ready(function(){

  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
    }
  });
  $("#BuddyName").change(function(){
    let suID = $("#BuddyName").val();
    console.log(suID);
    var data = new FormData();
    data.append("id",suID);
    
    $.ajax(
        {
            url: '/getBuddyDetails',
            method: 'post',
            data: data,
            processData: false,
            contentType: false,
            success: function(result){
                console.log("success called");
                // let parsedResult = JSON.stringify(result);
                console.log(result);
                $("#BuddyID").html(result);
            },
            error: function(result){
                console.log("error called");
                console.log("success called");
                let parsedResult = JSON.stringify(result);
                console.log("Result: "+result);
            }
        }
      );
  });
});