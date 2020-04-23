    
$(document).ready(function(){
  $("#term_checkbox").click(function(){
     $('#term_checkboxerror').html("");
  })
  
});


$("#register_edu_user").click(function(){

 var ids = ['firstName', 'lastName', 'userName', 'phoneNumber', 'password', 'confirmPassword'];
  
   
   var firstName          =  $('#firstName').val().trim();
   var lastName           =  $('#lastName').val().trim();
   var userName           =  $('#userName').val().trim();
   var company            =  $('#company').val().trim();
   var phoneNumber        =  $('#phoneNumber').val().trim();
   var password           =  $('#password').val().trim();
   var confirmPassword    =  $('#confirmPassword').val().trim();
   var term_checkbox      =  $('#term_checkbox:checked').val();
   

   removeValidations(ids);


if (firstName == "" || lastName == "" || userName == "" || phoneNumber == "" || password == "" || confirmPassword == "" || term_checkbox != 1  ){
    
    if(firstName == ""){
     $('#firstNameerror').html('Required field');
     $('#firstName').focus();
   }

   if(lastName == ""){
     $('#lastNameerror').html('Required field');
     $('#lastName').focus();
   }

   if(userName == ""){
     $('#userNameerror').html('Required field');
     $('#userName').focus();
     
   }

   if(phoneNumber == ""){
     $('#phoneNumbererror').html('Required field');
     $('#phoneNumber').focus();
    
   }
   if(password == ""){
     $('#passworderror').html('Required field');
     $('#password').focus();
     
   }
   if(confirmPassword == ""){
     $('#confirmPassworderror').html('Required field');
     $('#confirmPassword').focus();
     
   }
   if(term_checkbox != 1){
     $('#term_checkboxerror').html("You have to accept the Terms and Conditions");
    
     
   }

   return false;

}

   else if(userName.indexOf("@", 0) < 0){
     $('#userNameerror').html('Invalid Email Id');
     $('#userName').focus();
     return false;
   }
   else if(userName.indexOf(".", 0) < 0){
     $('#userNameerror').html('Invalid Email Id');
     $('#userName').focus();
     return false;
   }
  
   else if(isNaN(phoneNumber)){
     $('#phoneNumbererror').html('Required number only');
     $('#phoneNumber').focus();
     return false;
   }
   else if(phoneNumber.length >15){
     $('#phoneNumbererror').html('Phone number must be in between 15 Digit');
     $('#phoneNumber').focus();
     return false;
   }
   else if(password != confirmPassword){
     $('#confirmPassworderror').html("Password and Confirm Password are not matched");
     $('#confirmPassword').focus();
     return false;
   }
   else{

     $('.register_outer').addClass('show');
        $(".register_loader").addClass('show');


      $.ajax({

      url: baseURL+'/registerEduUser',
      method: 'post',
      data: $("#register_form").serialize(),
      success: function(response) {
       
       // console.log(response);
       
            var res = JSON.parse(response);

           // console.log(res.st);
           // return false;

          if (res.st === parseInt(200)) {

            $('.register_outer').removeClass('show');
            $(".register_loader").removeClass('show');

             swal({
                title: "You have Register Successfully",
                text: "Page will redirect to login screen in 5 seconds",
                type: "warning",
                timer: 5000
              }).then(function() {
            window.location = "./login";
           });
             
          }
          else if (res.st === parseInt(409)) {

            $('.register_outer').removeClass('show');
            $(".register_loader").removeClass('show');
             $('#userNameerror').html('User Name already Exist Try with another User Name');
              $('#userName').focus();
              return false;

             
          }

           else { 
            $('.register_outer').removeClass('show');
            $(".register_loader").removeClass('show');
             $('#main_error').html('Something Went Wrong Please try again later');
              $('#userName').focus();
              return false;
          }
        }
      });                                                        

   }

})

function removeValidations(ids) {
    $(ids).each(function(index, key) {
        //console.log(index+'======'+key); 
        $("#" + key).keyup(function() {
            $("#" + key + "error").html('');
        });
    });
}
function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}
