//profile DATA 
function profileData(){
   $("p.output").show();
    $("input.inp").hide();
    $("select.inp").hide();
    $("#edit").show();
  $("#profile_data").hide();
  $('.profile_outer').addClass('show');
  $(".profile_loader").addClass('show');
  // return false;
  $.ajax({
  url: base_url+'/profileData',
  method: 'post',
  success: function(response) {
      var res = JSON.parse(response);
            $('.profile_outer').removeClass('show');
            $(".profile_loader").removeClass('show');
            if (res.st === parseInt(1)) {
               $(res.profile_data.records).each(function(key,value){
                // console.log(value);return false;
                $('#name').text(value.Name);
                $('#phone').text(value.Phone);
                $('#email').text(value.Email);
                $('#mobile').text(value.MobilePhone);
                if(value.Account != null){
                $('#account_name').text(value.Account.Name);
                }
                $('#l_url').text(value.Linkedin_URL__c);
                $('#t_url').text(value.Twitter_Name__c);
                $('#comm').text(value.Communication_Language__c);
                $('#about').text(value.Description);
                $('#company').text(value.Company__c);
                

                if(value.MailingAddress != null){
                  $('#m_address_street').text(value.MailingAddress.street);
                  $('#m_address_city').text(value.MailingAddress.city);
                  $('#m_address_state').text(value.MailingAddress.state);
                  $('#m_address_country').text(value.MailingAddress.country);
                  $('#m_address_code').text(value.MailingAddress.postalCode);
                }
                
                $('#nameE').val(value.Name);
                $('#phoneE').val(value.Phone);
                $('#mobileE').val(value.MobilePhone);
                if(value.Account != null){
                $('#account_nameE').val(value.Account.Name);
                 }
                $('#l_urlE').val(value.Linkedin_URL__c);
                $('#t_urlE').val(value.Twitter_Name__c);
                // $('#commE').val(value.Communication_Language__c);
                $('#commE option[value="'+value.Communication_Language__c+'"]').attr("selected","selected");
                $('#aboutE').val(value.Description);
                $('#companyE').val(value.Company__c);
                if(value.MailingAddress != null){
                  $('#m_addressE_street').val(value.MailingAddress.street);
                  $('#m_addressE_city').val(value.MailingAddress.city);
                  $('#m_addressE_state').val(value.MailingAddress.state);
                  $('#m_addressE_country').val(value.MailingAddress.country);
                  $('#m_addressE_code').val(value.MailingAddress.postalCode);
                 }
                 }); 
            }
            else if(res.st === parseInt(403)){
              swal({
                title: "Logged in Session Expire",
                text: "Page will redirect to login screen in 5 seconds",
                type: "warning",
                timer: 5000
            }).then(function() {
             window.location = "./login";
             });
           }
          }

        });
}

function profileEdit(){
        $("p.output").hide();
        $("#edit").hide();
        $("input.inp").show();
        $("select.inp").show();
        $("#profile_data").show();
}

function removeValidations(ids) {
    $(ids).each(function(index, key) {
        //console.log(index+'======'+key);
        $("#" + key).keyup(function() {
            $("#" + key + "error").html('');
        });
    });
}



$(document).ready(function(){
$("#profile_data").click(function(){
    
    // alert('jai');


var ids = ['commE', 'phoneE', 'mobileE', 'l_urlE', 't_urlE', 'm_addressE_street', 'm_addressE_city', 'm_addressE_state', 'm_addressE_country','m_addressE_code'];
  
   
   var commE               =  $('#commE').val();
   var phoneE              =  $('#phoneE').val();
   var mobileE             =  $('#mobileE').val();
   var l_urlE              =  $('#l_urlE').val();
   var t_urlE              =  $('#t_urlE').val();
   var m_addressE_street   =  $('#m_addressE_street').val();
   var m_addressE_city     =  $('#m_addressE_city').val();
   var m_addressE_state    =  $('#m_addressE_state').val();
   var m_addressE_country  =  $('#m_addressE_country').val();
   var m_addressE_code     =  $('#m_addressE_code').val();
   

   removeValidations(ids);


   if(commE == ""){
     $('#commEerror').html('Required field');
     $('#commE').focus();
   }
   // else if(phoneE == ""){
   //   $('#phoneEerror').html('Required field');
   //   $('#phoneE').focus();
   // }
   else if(isNaN(phoneE)){
     $('#phoneEerror').html('Required number only');
     $('#phoneE').focus();
   }
   else if(mobileE == ""){
     $('#mobileEerror').html('Required field');
     $('#mobileE').focus();
   }
   else if(isNaN(mobileE)){
     $('#mobileEerror').html('Required number only');
     $('#mobileE').focus();
   }
   // else if(l_urlE == ""){
   //   $('#l_urlEerror').html('Required field');
   //    $('#l_urlE').focus();
   // }
   // else if(t_urlE == ""){
   //   $('#t_urlEerror').html('Required field');
   //    $('#t_urlE').focus();
   // }
   else if(m_addressE_street == ""){
     $('#m_addressE_streeterror').html('Required field');
     $('#m_addressE_street').focus();
   }
   else if(m_addressE_city == ""){
     $('#m_addressE_cityerror').html('Required field');
     $('#m_addressE_city').focus();
   }
   else if(m_addressE_state == ""){
     $('#m_addressE_stateerror').html('Required field');
     $('#m_addressE_state').focus();
   }
   else if(m_addressE_country == ""){
     $('#m_addressE_countryerror').html('Required field');
     $('#m_addressE_country').focus();
   }
   else if(m_addressE_code == ""){
     $('#m_addressE_codeerror').html('Required field');
     $('#m_addressE_code').focus();
   }
   else{

      $('.profile_outer').addClass('show');
        $(".profile_loader").addClass('show');


      $.ajax({
      url: base_url+'/profileDatasubmit',
      method: 'post',
      data: $("#profileEdit").serialize(),
      success: function(response) {
          var res = JSON.parse(response);
          if (res.profile_updata === parseInt(204)) {
            $('.profile_outer').removeClass('show');
            $(".profile_loader").removeClass('show');
            $('#success_profile').html('UPDATE SUCCESSFULLY');
            $('#success_profile').addClass('alert alert-success');
            $('#success_profile').css({"width": "100%"});
          } else { 
            $('.profile_outer').removeClass('show');
            $(".profile_loader").removeClass('show');
            $('#success_profile').html('ERROR SOMETHING WENT WRONG');
            $('#success_profile').addClass('alert alert-danger');
            $('#success_profile').css({"width": "100%"});
          }
        }
      });                                                        

   }
});
});
$(document).ready(function(){
$(".close").click(function(){
    // $("#forgetPassword_form")[0].reset();
    $("#success_profile").html('');
    $('#success_profile').removeClass('alert alert-success');
    // $('#success_profile').css({"width": "100%"});
});
});

function profileImage(){
   // alert('jai');
  $.ajax({
  url: base_url+'profileImage',
  method: 'post',
  success: function(response) {
      var res = JSON.parse(response);
            if (res.st === parseInt(1)) {
              $("#imagedata").attr("src", res.image_url);
             
            }
            else if(res.st === parseInt(403)){
              swal({
                title: "Logged in Session Expire",
                text: "Page will redirect to login screen in 5 seconds",
                type: "warning",
                timer: 5000
              }).then(function() {
            window.location = "./login";
           });
           }
          }

        });
}
$(document).ready(function(){
$("#update_profile_img").click(function(){
  var fd = new FormData();
  fd.append('profile_img', $('#profile_img').get(0).files[0]);
  $('.profile_outer').addClass('show');
  $(".profile_loader").addClass('show');
  //return false;
  $.ajax({
  url: base_url+'updateProfileImg',
  method: 'post',
  data: fd,
  contentType: false,
  processData: false,
  success: function(response) {
      var res = JSON.parse(response);
            if (res.st === parseInt(1)) {
              $('.profile_outer').removeClass('show');
              $(".profile_loader").removeClass('show');
              $("#imagedata").attr("src", res.image_url);
              $('#msg_image_status').text(res.msg);
              $('#msg_image_status').removeClass('profile_image_error');
              $('#msg_image_status').addClass('profile_image_status');
              $("#msg_image_status").delay(2000).fadeOut();
            }
            else if (res.st === parseInt(0)) {
              $('.profile_outer').removeClass('show');
              $(".profile_loader").removeClass('show');
              $('#msg_image_status').text(res.msg);
               $('#msg_image_status').removeClass('profile_image_status');
              $('#msg_image_status').addClass('profile_image_error');
			  $('#msg_image_status').css("display", "block");
              $("#msg_image_status").delay(2000).fadeOut();
            }
         }
      });
});
});


// search API

function search_input_data(){
   var input_data = $('#search_input_data').val();
   var html="";

   $.ajax({
  url: base_url+'search_data',
  method: 'post',
  data: "input_data="+input_data,
  success: function(response) {
      var res = JSON.parse(response);
      // console.log(res); return false;
            if (res.st === parseInt(1)) {
              if(res.search.response.total != 0){
                 html = '<table class="table"><thead><tr><th class="normal_width">Task Name</th><th class="abnormal_width">Name</th><th class="normal_width">Status</th></tr></thead><tbody>';
                $(res.search.response.data).each(function(key,value){
                    html += '<tr><td><a href="'+base_url+'task/'+value.Id+'" onclick="update_recent_search(this.id);" id="'+value.Id+'">'+ value.Name + '</a></td><td>'+ value.Name__c+'</td><td>'+ value.PO_Status__c+'</td></tr>';
                });
               if (input_data != "") {  
                 $("#search").show();
               } else {
                 $("#search").hide();
               } 
              html += '</tbody></table>';
               $("#search").html(html);
              }
              else{
                $("#search").html('No Data Available');
                $('#search').css("background", "#b9b3b3");
                
                if (input_data != "") {  
                 $("#search").show();
                  } else {
                 $("#search").hide();
               } 
              }
              
            }
          }
        });

}


// update_recent_search

   function update_recent_search(id){
   $.ajax({
      url: base_url+'update_recent_search_data',
      method: 'post',
      data: "task_id="+id,
      success: function(response) {
      var res = JSON.parse(response);
      // console.log(res.update_recent_data.success); return false;
            // if (res.update_recent_data.success == ) {
            //   alert('jai');
            // }
          }
        });
   }
   
   // update Password

   function removeValidations_password(index) {
    $(index).each(function(index, key) {
        //console.log(index+'======'+key);
        $("#" + key).keyup(function() {
            $("#" + key + "Error").html('');
        });
    });
   }

   $(document).on('keydown', '#password_one', function(e) {
    
    if (e.keyCode === 32) {
     $('#password_oneError').html('Space not Allowed');
     $('#password_one').focus();
     return false;
   }
   else {
     $('#password_oneError').html('');
     $('#password_one').focus();
   }
});

   $(document).on('keydown', '#password_two', function(e) {
    
    if (e.keyCode === 32) {
     $('#password_twoError').html('Space not Allowed');
     $('#password_two').focus();
     return false;
   }
   else {
     $('#password_twoError').html('');
     $('#password_two').focus();
   }
});

   $(document).ready(function(){
   $("#update_pass").click(function(){

   var index = ['password_one', 'password_two'];
  
   
   var password_one               =  $('#password_one').val().trim();
   var password_two              =  $('#password_two').val().trim();


   removeValidations_password(index);


   if(password_one == ""){
     $('#password_oneError').html('Required field');
     $('#password_one').focus();
     return false;
   }

   if($('#password_one').val().length < 6){
     $('#password_oneError').html('Minimum length of password is 6');
     $('#password_one').focus();
     return false;
   }
   
   else if(password_two == ""){
     $('#password_twoError').html('Required field');
     $('#password_two').focus();
     return false;
   }

   else if(password_two != password_one){
     $('#password_twoError').html('New Password and Confirm Password are not same');
     $('#password_two').focus();
     return false;
   }
   // else if(e.keyCode == 32){
   //   $('#password_twoError').html('not allow space as key');
   //   $('#password_two').focus();
   // }
   else{

      $.ajax({
      url: base_url+'/updatePassword',
      method: 'post',
      data: "password_one=" + password_one,
      success: function(response) {
          var res = JSON.parse(response);
          if (res.password_updata === parseInt(204)) {
           $('#updatePassword_MESS').removeClass('alert alert-success');
           $("#updatePassword_MESS").html('<p>UPDATED SUCCESSFULLY</p>');
           $('#updatePassword_MESS').addClass('alert alert-success');
           $('#updatePassword_MESS').css({"width": "100%"});
           $("#updatePassword_MESS").delay(2000).fadeOut();
           $('#updatePassword_MESS').css({
             "width": "100%",
             "display": "block"
           });
           $('#change_passd')[0].reset();
		   
		    setTimeout(function() {$('#changePasswordModal').modal('hide');}, 3000);
          }
          else if(res.st === parseInt(403)){
              swal({
                title: "Logged in Session Expire",
                text: "Page will redirect to login screen in 5 seconds",
                type: "warning",
                timer: 5000
              }).then(function() {
            window.location = "./login";
           });
           } else {
           $('#updatePassword_MESS').removeClass('alert alert-danger');
           $("#updatePassword_MESS").html('<p>SOMETHING WENT WRONG</p>');
           $('#updatePassword_MESS').addClass('alert alert-danger');
           $('#updatePassword_MESS').css({"width": "100%"});
           $("#updatePassword_MESS").delay(2000).fadeOut();
           $('#updatePassword_MESS').css({
             "width": "100%",
             "display": "block"
           }); 
            $('#change_passd')[0].reset();
			setTimeout(function() {$('#changePasswordModal').modal('hide');}, 3000);

          }
        }
      });                                                        

   }

})
});

  $('#changePasswordModal').on('hidden.bs.modal', function(){
    //$(this).removeData('bs.modal');
    $(':input','#change_passd').val("");
    $('#password_oneError').html('');
     $('#password_twoError').html('');
});


  // Invoice Detail 

  function invoiceDetail(){

 $('.profile_outer').addClass('show');
  $(".profile_loader").addClass('show');
  var html="";
  $.ajax({
  url: base_url+'/invoiceDetail',
  method: 'post',
  success: function(response) {
     $('.profile_outer').removeClass('show');
            $(".profile_loader").removeClass('show');
   
      var res = JSON.parse(response);
      //console.log(res.result.invoices);
            if (res.st === parseInt(1)) {

              html+=`<table class="table invoice_table">
                                        <thead>
                                            <tr>
                                                <th scope="col "><span>S.NO</span></th>
                                                <th scope="col "><span>Course Name</span></th>
                                                <th scope="col "><span>Invoice Number</span></th>
                                                <th scope="col "><span>Invoice Date</span></th>
                                                <th scope="col "><span>Download Invoice</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>`;
              var count=""; 
              $(res.result.invoices).each(function(key,value){

                var count = key +1;
                // console.log(value.subscribedcoursename);
                // console.log(value.invoiceName); return false;
                //  //html = '<a href="./task/'+value.Purchase_Order__c+'" style="color:#fff;"><li>'+ value.Purchase_Order__r.Name + '</li></a>';
                if(value.invoiceName == null){
                    var invoice_number = 'N/A';
                   
                }
                else{
                   var invoice_number = value.invoiceName;   
                }
                  html +="<tr>"+
                   "<td>"+count+ "</td>"+
                  "<td>"+value.subscribedcoursename+ "</td>"+
                  "<td>"+invoice_number+ "</td>"+
                  "<td>"+value.invoiceDate+ "</td>"+
                  "<td> <a href='"+value.link+"' target='_blank' >Download</a></td></tr>";
                 
                 });

               html+=`</tbody></table>`;
              
            
               $("#invoiceData").html(html);

              
            }
            else if(res.st === parseInt(404)){
                html+=`<table class="table invoice_table">
                                        <thead>
                                            <tr>
                                                <th scope="col "><span>S.NO</span></th>
                                                <th scope="col "><span>Course Name</span></th>
                                                <th scope="col "><span>Invoice Number</span></th>
                                                <th scope="col "><span>Invoice Date</span></th>
                                                <th scope="col "><span>Download Invoice</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr><td>No Data Available</td></tr>
                                        </tbody></table>`;
             $("#invoiceData").html(html);
            }


            else{
                html+=`<table class="table invoice_table">
                                        <thead>
                                            <tr>
                                                <th scope="col "><span>S.NO</span></th>
                                                <th scope="col "><span>Course Name</span></th>
                                                <th scope="col "><span>Invoice Number</span></th>
                                                <th scope="col "><span>Invoice Date</span></th>
                                                <th scope="col "><span>Download Invoice</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr><td>No Data Available</td></tr>
                                        </tbody></table>`;
             $("#invoiceData").html(html);
            }


          }
        });
}



