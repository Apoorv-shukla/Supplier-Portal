function removeValidations(ids) {
            $(ids).each(function(index, key) {
                $("#" + key).keyup(function() {
                    $("#" + key + "_error").html('');
                });
            });
        }

function validuser(authenicate, courseid) {

            var ids = ['currency_amount'];
            var id = ['term_condition'];
            var currency_amount = $('#currency_amount').val();
            if(currency_amount==''){
                $('#currency_amount_error').html("Please Select Currency");
                $('#currency_amount').focus();
                return false;
            }
            else if(!$('#term_condition').is(':checked')){
                $('#term_condition_error').html("Please accept the terms & Conditions and privacy policy");
                return false;
            }
            else if(authenicate==''){
                $('#term_condition_error').html("You haven't log In");
                return false;
            }
            else if (currency_amount != '') {
                location.href = "https://manrasdev-ita-bv.cs109.force.com/processPayment?courseid=" + courseid + "&contactid=" + authenicate + "&" + currency_amount + "";
            } 

    }
    
    
    
    function removeValidations(ids) {
            $(ids).each(function(index, key) {
                $("#" + key).keyup(function() {
                    $("#" + key + "_error").html('');
                });
            });
        }
        
        function removeMessage(val){
            if(val!=''){
                $('#currency_amount_error').html("");
                return false;
            }
        }
     function removeValdMessge(){
            if($('#term_condition').is(':checked')){
                $('#term_condition_error').html("");
                return false;
            }
        }
        


function Validation() {
            var ids = ['email', 'pass'];
            var username = $('#email').val().trim();
            var pass = $('#pass').val().trim();
                if (username == '') {
                $('#email_error').html("Username is Required");
                $('#email').focus();

            }

            if (pass == '') {
                $('#pass_error').html("Password is Required");
                $('#pass').focus();

            } else {
                $('.register_outer').addClass('show');
                $(".register_loader").addClass('show');
                $('#pass_error').html("");
                var email = $('#email').val();
                var pass = $('#pass').val();
                $.ajax({
                    url: base_url + 'courselogin',
                    method: 'post',
                    data: "email="+email+'&pass='+pass,
                    success: function(response) {
                         var res = JSON.parse(response);
                         
                         if (res.st === parseInt(1)) {
                             $('.register_outer').removeClass('show');
                                $(".register_loader").removeClass('show');
                             $("#custom_login_buy").hide();
                            //  swal(res.msg, "", "success").then(function() {
                            //     location.reload();
                            // });
                             swal({
                                    title: "You Have Successfully Login",
                                    type: "success",
                                    timer: 3000
                                  }).then(function() {
                                location.reload();
                               });
                            return false;
                         }
                         else if (res.st === parseInt(0)) {
                             $('.register_outer').removeClass('show');
                                $(".register_loader").removeClass('show');
                             $('#pass_error').html("Invalid Email and Password ! Try Again");
                            return false;
                         }
                    }
                });
            }
            removeValidations(ids);
        }
        
        function AvoidSpace(event) {
         var k = event ? event.which : window.event.keyCode;
            if (k == 32) return false;
        }
        
        
        $(document).ready(function(){
$("#forgetPassword").click(function(){
    //   alert('jai');
      // $("#divLoading_outer").show();
      $("#forget_p").addClass('show');
      var ids = ['forgot_password_email'];
      var email = $('#forgot_password_email').val();
      $.ajax({
      url: base_url + 'forgotPassword',
      method: 'post',
      data: "email=" + email,
      success: function(response) {
            $("#forget_p").removeClass('show');
            var res = JSON.parse(response);
            if(res.st === parseInt(403)){
                  $("#forgot_password_email_err").html(res.validation_error);
                  // $("#forgot_password_email").css({'border' : '3px solid red'});
                  $("#forgot_password_email").focus();
            }
            if (res.st === parseInt(1)) {
                  $('#forgot_err').html(res.msg);
                  $('#forgot_err').addClass('alert alert-success');
                  $('#forgot_err').css({"width": "100%"});
                   $("#forgot_err").delay(2000).fadeOut();
                  setTimeout(function() {$('#forgot').modal('hide');}, 4000);

            } else if(res.st === parseInt(0)){
                  $("#forgot_password_email_err").html('<p>'+res.msg+'</p>');
            }
            removeValidations(ids);
          }
    });
})
});
 $(document).ready(function(){
$("#closeForgetPassword").click(function(){
      $("#forgetPassword_form")[0].reset();
      $("#forgot_password_email_err").html('');
});
});

function removeValidations(ids) {
      $(ids).each(function(index, key) {
            $("#" + key).keyup(function() {
                  $("#" + key + "_err").html('');
            });
      });
}

