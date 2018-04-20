
function getData(pageName) {
  var posting = $.post("php/script.php", {
    page_name: pageName
  });

  posting.done(function(data){
    $("#content").html(data);
  });

  posting.fail(function(){
    alert("failed");
  });
}

//Make sure the document is ready, then a function
$(document).ready(function(){
  getData("home");
});
