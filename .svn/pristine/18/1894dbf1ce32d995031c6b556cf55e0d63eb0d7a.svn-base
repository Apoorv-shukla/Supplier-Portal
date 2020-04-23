$("#forgetPassword").click(function(){
      // $("#divLoading_outer").show();
      $("#forget_p").addClass('show');
      var ids = ['forgot_password_email'];
      var email = $('#forgot_password_email').val();
      $.ajax({
      url: './forgotPassword',
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
                  $('#forgot_err').html('Reset link  Sent to your email');
                  $('#forgot_err').addClass('alert alert-success');
                  $('#forgot_err').css({"width": "100%"});
                  setTimeout(function() {$('#forgot').modal('hide');location.reload();}, 4000);

            } else if(res.st === parseInt(0)){
                  $("#forgot_password_email_err").html('<p>'+res.msg+'</p>');
            }
            removeValidations(ids);
          }
    });
})

$("#closeForgetPassword").click(function(){
      $("#forgetPassword_form")[0].reset();
      $("#forgot_password_email_err").html('');
});

function removeValidations(ids) {
      $(ids).each(function(index, key) {
            $("#" + key).keyup(function() {
                  $("#" + key + "_err").html('');
            });
      });
}