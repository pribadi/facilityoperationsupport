$(document).ready(function(){

  $("#submit").click(function(){

    var username = $("#newuser").val();
    var password = $("#password1").val();
    var password2 = $("#password2").val();

    if((username == "") || (password == "")) {
      $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter a username and a password</div>");
    }
    else {
      $.ajax({
        type: "POST",
        url: "http://10.47.150.143/facilityoperationsupport_tso/main/createuser",
        data: "newuser="+username+"&password1="+password+"&password2="+password2,
        success: function(html){

			var text = $(html).text();
			//Pulls hidden div that includes "true" in the success response
			var response = text.substr(text.length - 4);

          if(response == "true"){
      			$("#message").html(html);
      					$('#submit').hide();
      			}
      		else {
      			$("#message").html(html);
      			$('#submit').show();
    			}
        },
        beforeSend: function()
        {
          $("#message").html("<p class='text-center'><img src='http://10.47.150.143/facilityoperationsupport_tso/assets/images/ajax-loader.gif'></p>")
        }
      });
    }
    return false;
  });
});
