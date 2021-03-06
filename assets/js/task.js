
function showPaymentData(){
  $("#paymentloading").addClass('show');
  $.ajax({
  url: './paymentDetail/' + task_id,
  method: 'post',
  success: function(response) {
   var res = JSON.parse(response);
   $("#paymentloading").hide();
   if (res.st === parseInt(1)) {
    $(res.payment_data.records).each(function(key, value) {

     $('#payname').text(value.Name);
     $('#amount').text(' $ '+ value.Amount__c);
     $('#status').text(value.Status__c);
     $('#total').text(' $ '+ value.GrandTotal__c);

    });
   } else if (res.st === parseInt(0)) {
    $('#no_data_available').text(res.msg);
    $('#no_data_available').css("text-align", "center");
    $('#no_data_available').css("display", "block"); 
    $('#no_data_available').css("font-weight", "bolder");
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

function showSubmitTaskDeliverableData(){
  $("#submitaskloading").addClass('show');
  var html = "";
  $.ajax({
    url: base_url + 'submitTaskDeliverable',
    method: 'post',
    data: {task_id: task_id},
    success: function(response) {
      var res = JSON.parse(response);
      // console.log(res);return false;
      $("#submitaskloading").hide();
      if (res.st === parseInt(1)) {
        if(res.submitTaskDeliverable.records[0].TASKRAY__TaskRay_Checklist_Items__r!=null){
        $('#task_del_checkbox').css("display", "block");

        $(res.submitTaskDeliverable.records[0].TASKRAY__TaskRay_Checklist_Items__r.records).each(function(key, value) {
        // console.log(value); return false;
        if (value.TASKRAY__Completed__c == true) {
        var status = 'checked disabled';
        var cla_ad = ''
        } else {
        var status = '';
        var cla_ad = 'jai';
        }
        html += '<div class="col-12 col-sm-12 col-md-6 col-lg-3"><ul><li style="list-style-type: disc;">'+ value.Name + '</li></ul></div>';
        // html += '<div class="col-12 col-sm-12 col-md-6 col-lg-3"><div class="form-group form-check"><label><input type="checkbox" class="form-check-input count_checkbox ' + cla_ad + '" name="myCheckboxes[]" id="' + value.Id + '" ' + status + '  value="' + value.Id + '" style="margin-right:10px;"/>' + value.Name + '</label></div></div>';

        });
        $("#submit-task").html(html);
          
        if(res.submitTaskDeliverable.records[0].Purchase_Order__r.Content_URL__c==null){ var link ="";} else{ var link =res.submitTaskDeliverable.records[0].Purchase_Order__r.Content_URL__c; }
        $("#sheet_link").html('<label class="light mr-3 d-inline-block" id ="content_id">Submit Content Here</label><b><a href="'+link+'" target="_blank" class="work-break">' + link + '</a></b>')
      } else { 
        $('#submit_for_task_status').attr("disabled", true);
        $("#submit-task").html('<div class="col-12 col-sm-12" style="text-align:center;"><p id="show_null_data_task"><strong> No Data Available</strong></p></div>');
        }  }  
      else if (res.st === parseInt(0)) {
        $('#submit_for_task_status').attr("disabled", true);
        $("#submit-task").html('<div class="col-12 col-sm-12" style="text-align:center;"><p id="show_null_data_task"><strong>' + res.msg + '</strong></p></div>');
      } else if(res.st === parseInt(403)){
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

// function UpdateSubmitTaskDel() {
//  //$("#submitaskloading").addClass('show');

//  // alert($('input:checkbox[class*=count_checkbox]').length);
//  // alert($('input:checkbox[class*=count_checkbox]:checked').length);

//  if ($('input:checkbox[class*=count_checkbox]').length == $('input:checkbox[class*=count_checkbox]:checked').length) {


//   if ($('#mandatory_checkbox').is(':checked')) {
//    $("#tasksubmitloading").addClass('show'); 
//    var check_id = $("input:checkbox[class*=jai]:checked").map(function() {
//     return $(this).val();
//    }).get();

//    $.ajax({
//     url: base_url + '/updateSubmitTaskDeliverable',
//     method: 'post',
//     data: "check_id=" + check_id,
//     success: function(response) {
//      var res = JSON.parse(response);

//      // $("#submitaskloading").hide();
//      $('#submit_for_task_status').prop('disabled', false);
//      if(res.st === parseInt(403)){
//               swal({
//                 title: "Logged in Session Expire",
//                 text: "Page will redirect to login screen in 5 seconds",
//                 type: "warning",
//                 timer: 5000
//        }).then(function() {
//       window.location = "./login";
//      });
//    }
//     else if (res.submitTaskDeliverable.results[0]['statusCode'] === parseInt(204)) {
//       $("#tasksubmitloading").removeClass('show');
//       $('#up_sub_t').html('Task submit successfully');
//       $('#up_sub_t').addClass('alert alert-success');
//       $('#up_sub_t').css({
//        "width": "100%",
//        "display": "block"
//       });
//       $('.count_checkbox').attr("disabled", true);
//       $('.count_checkbox').addClass('disabled');
//       setTimeout(SuccessClass, 2000);
//       return false;
//      }   else {
//       $("#tasksubmitloading").removeClass('show');
//       $('#up_sub_t').html('There is no task Left at your end.');
//       $('#up_sub_t').addClass('alert alert-primary');
//       $('#up_sub_t').css({
//        "width": "100%",
//        "display": "block"
//       });
//       setTimeout(RemoveClass, 2000);
//       return false;
//      }
//     }
//    });
//   } else {

//    $('#up_sub_t').html('Please checked checkbox I have checked all feedback  & uploaded the  updated deliverable for review');
//    $('#up_sub_t').addClass('alert alert-primary');
//    $('#up_sub_t').css({
//     "width": "100%",
//     "display": "block"
//    });
//    setTimeout(RemoveClass, 2000);
//    return false;
//   }

//  } else {

//   $('#up_sub_t').html('Please select all check list');
//   $('#up_sub_t').addClass('alert alert-primary');
//   $('#up_sub_t').css({
//    "width": "100%",
//    "display": "block"
//   });
//   $('#up_sub_t').css({
//    "width": "100%",
//    "display": "block"
//   });
//   setTimeout(RemoveClass, 2000);
//   return false;
//  }



//  function RemoveClass() {
//   $('#up_sub_t').removeClass("alert alert-primary");
//   $('#up_sub_t').css({
//    "width": "100%",
//    "display": "none"
//   });
//  }
//  function SuccessClass() {
//   $('#up_sub_t').removeClass("alert alert-success");
//   $('#up_sub_t').css({
//    "width": "100%",
//    "display": "none"
//   });
//  }
// }


$("#submit_for_task_status").click(function() {
var task_status = $('#statusdetail').val();
if(task_status=='Started'){
if ($('#mandatory_checkbox').is(':checked')) {
 $("#status_change_outer").addClass('show');
 $("#status_change").addClass('show');
 $.ajax({
  url: base_url + 'submitTaskStatus',
  method: 'post',
  data: "task_id=" + task_id,
  success: function(response) {
   var res = JSON.parse(response);
   $("#status_change_outer").removeClass('show');
   $("#status_change").removeClass('show');
   location.reload();
   if (res.st === parseInt(1)) {
    $('.submit-res').html(res.submitTaskStatus);
    $('.submit-res').removeClass('output task inprogress');
    $('.submit-res').removeClass('output task reject');
    $('.submit-res').addClass('output task review');
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
} else {
    swal({
          //title: "Logged in Session Expire",
                text: "Kindly assure that Submit Deliverable is checked",
                type: "warning",
                timer: 5000
        }); return false;
  /* $('#up_sub_t').html('Please checked checkbox I have checked all feedback  & uploaded the  updated deliverable for review');
   $('#up_sub_t').addClass('alert alert-primary');
   $('#up_sub_t').css({
    "width": "100%",
    "display": "block"
   });
   setTimeout(RemoveClass, 2000);
   return false;*/
  } }
else if(task_status=='Change Request'){
  if($('input:checkbox[class*=need_to_check]').length == $('input:checkbox[class*=need_to_check]:checked').length) {
 $("#status_change_outer").addClass('show');
 $("#status_change").addClass('show');
 $.ajax({
  url: base_url + 'submitTaskStatus',
  method: 'post',
  data: "task_id=" + task_id,
  success: function(response) {
   var res = JSON.parse(response);
   $("#status_change_outer").removeClass('show');
   $("#status_change").removeClass('show');
   location.reload();
   if (res.st === parseInt(1)) {
    $('.submit-res').html(res.submitTaskStatus);
    $('.submit-res').removeClass('output task inprogress');
    $('.submit-res').removeClass('output task reject');
    $('.submit-res').addClass('output task review');
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
} else {
    swal({
                //title: "Change Request",
                text: "Kindly assure that Change Request are checked",
                type: "warning",
                timer: 5000
       });
}}

});

$("#accept_task_status").click(function() {
 $("#status_change_outer").addClass('show');
 $("#status_change").addClass('show');

 $.ajax({
  url: base_url + 'acceptTaskStatus',
  method: 'post',
  data: "task_id=" + task_id,
  success: function(response) {
   var res = JSON.parse(response);
   $("#status_change_outer").removeClass('show');
   $("#status_change").removeClass('show');
   location.reload();
   if (res.st === parseInt(1)) {
    $('.submit-res').html(res.acceptTaskStatus);
    $('.submit-res').removeClass('output task review');
    $('.submit-res').removeClass('output task reject');
    $('.submit-res').addClass('output task inprogress');

   } else if(res.st === parseInt(403)){
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
});


$("#reject_task_status").click(function() {
 $("#status_change_outer").addClass('show');
 $("#status_change").addClass('show');
 $.ajax({
  url: base_url + 'rejectTaskStatus',
  method: 'post',
  data: "task_id=" + task_id,
  success: function(response) {
   var res = JSON.parse(response);
   $("#status_change_outer").removeClass('show');
   $("#status_change").removeClass('show');
   window.location = base_url +"dashboard";
   if (res.st === parseInt(1)) {
    $('.submit-res').html(res.rejectTaskStatus);
    $('.submit-res').removeClass('output task review');
    $('.submit-res').removeClass('output task inprogress');
    $('.submit-res').addClass('output task reject');
   } else if(res.st === parseInt(403)){
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
});

function showQuestionAnswerData(){
  $("#QA_loading").addClass('show');
  var html = '';
  var label = '';
  var answers = '';
  var one ='';
  var two ='';
  var three ='';
  var actual_questions = [];
  var multiselect_ids = [];
  $.ajax({
    url: base_url + 'getQuestionAnswers/' + task_id,
    method: 'GET',
    success: function(response) {
      $("#QA_loading").removeClass('show');
      var res = JSON.parse(response);

      // console.log(res.is_editable);return false;
      if (res.st === parseInt(1)) {
         // console.log(res.IsEditable);return false;
        // console.log(res.data[0].isEditable);
        //if(res.data[0].isEditable == false){ Now coming in main object instead of data[0]
        if(res.is_editable == false){
          $("#saveQuestionData").hide();
          $("#saveNotifyQuestionData").hide();
        }
 
        $(res.data).each(function(k, va) {
          // console.log(res.data);return false;
          var i= 1;
          
          for (var property in va) {
           
          one = "";
          two = "";

          //console.log(i);

            if (va.hasOwnProperty(property)) {

 
              one = '<div class="card-header" id="headingTwo">' +
              '<h5 class="mb-0">' +'<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#ins_' + i + '" aria-expanded="false" aria-controls="collapseTwo">' +
              (property != null ? property : '') +
              '</button>' +
              '</h5>' +
              '</div>'+
              '<div id="ins_' + i + '" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">'+
              '<div class="card-body">'+
              '<div class="row">' +
              '<div class="col-12 col-sm-12 col-md-12 col-lg-12">';

              $(va[property]).each(function(key,value){
                // console.log(value);return false;
                multiselect_ids.push(value.quesID);
                // console.log(multiselect_ids);
                label ="";
                three = key +1;
                //console.log(va[property] +"--"+three);
                var question_label = (value.quesChoices != null ? value.quesChoices.split('\n') : ['Data not available']);
                var answers_value = (value.answers != null ? value.answers.split('\n') : ['Data not available']);

                if (value.quesType == 'Picklist') {
                  if (value.accessType == 'Read/Write') {
                    label += '<div class="form-group" style="margin-left : 25px !important"><select class="form-control ' + value.quesID + '">'
                    $(question_label).each(function(ke, val) {
                    label += '<option ' + (value.answers == val ? 'selected="selected"' : '') + '>' + val + '</option>'
                    });
                    label += '</select></div>'
                  } else {
                    label += '<div class="form-group" style="margin-left : 25px !important"><select disabled="disabled" class="form-control ' + value.quesID + '">'
                    $(question_label).each(function(ke, val) {
                    label += '<option ' + (value.answers == val ? 'selected="selected"' : '') + '>' + val + '</option>'
                    });
                    label += '</select></div>'
                  }
                }

                else if(value.quesType == 'Multi select Picklist'){
                  $(question_label).each(function(que_key, que_value){
                    //console.log(que_value);
                    var temp = answers_value.includes(que_value);
                    if(temp == false){
                      actual_questions.push(que_value);
                    }
                  });
                  if (value.accessType == 'Read/Write') {
                    label += '<div class="row" style="margin-left : 25px !important"><div class="col-5 col-sm-5 col-md-5 col-lg-5 mt-3"></div><div class="col-2 col-sm-2 col-md-2 col-lg-2 mt-3"></div><div class="col-5 col-sm-5 col-md-5 col-lg-5 mt-3"></div></div>'
                        +'<div class="row" style="margin-left : 25px !important">'
                          +'<div class="col-12 col-sm-5 col-md-5 col-lg-5 mt-3">'
                            +'<p class="multi-text-deco">Available Option</p>'
                              +'<select name="from[]" id="multiselect_'+value.quesID+'" class="form-control" size="8" multiple="multiple">'
                                if(actual_questions.length != parseInt(0)){
                                  $(actual_questions).each(function(ke, val) {
                                    if(val != 'Data not available'){
                                      label += '<option>' + val + '</option>'
                                    }
                                  });
                                }
                    label +=        '</select>'
                            +'</div>'
                            
                            +'<div class="col-12 col-sm-2 col-md-2 col-lg-2 mt-5 pick_btns">'
                                +'<button type="button" id="multiselect_'+value.quesID+'_rightAll" class="form-control"><i class="fa fa-forward"></i></button>'
                                +'<button type="button" id="multiselect_'+value.quesID+'_rightSelected" class="form-control"><i class="fa fa-chevron-right"></i></button>'
                                +'<button type="button" id="multiselect_'+value.quesID+'_leftSelected" class="form-control"><i class="fa fa-chevron-left"></i></button>'
                                +'<button type="button" id="multiselect_'+value.quesID+'_leftAll" class="form-control"><i class="fa fa-backward"></i></button>'
                            +'</div>'
                            
                            +'<div class="col-12 col-sm-5 col-md-5 col-lg-5 mt-3">'
                              +'<p class="multi-text-deco">Selected Option</p>'
                                +'<select name="to[]" id="multiselect_'+value.quesID+'_to" class="form-control '+value.quesID+'" size="8" multiple="multiple">'
                                  if(answers_value.length != parseInt(0)){
                                    $(answers_value).each(function(ake, aval) {
                                      console.log(aval);
                                      if(aval !== null && aval !== ''){
                                          label += '<option>' + aval + '</option>'
                                      }
                                    });
                                  }
                    label +=        '</select>'
                            +'</div>'
                        +'</div>';
                        actual_questions = [];
                  } else {
                  label += '<div class="row" style="margin-left : 25px !important"><div class="col-5 col-sm-5 col-md-5 col-lg-5 mt-3"></div><div class="col-2 col-sm-2 col-md-2 col-lg-2 mt-3"></div><div class="col-5 col-sm-5 col-md-5 col-lg-5 mt-3"></div></div>'
                        +'<div class="row" style="margin-left : 25px !important">'
                        +'<div class="col-12 col-sm-5 col-md-5 col-lg-5 mt-3">'
                          +'<p class="multi-text-deco">Available Option</p>'
                            +'<select name="from[]" id="multiselect" disabled="disbaled" class="form-control" size="8" multiple="multiple">'
                              if(actual_questions.length != parseInt(0)){
                                $(actual_questions).each(function(ke, val) {
                                  if(val != 'Data not available'){
                                    label += '<option>' + val + '</option>'
                                  }
                                });
                              }
                  label +=        '</select>'
                        +'</div>'
                        
                        +'<div class="col-12 col-sm-2 col-md-2 col-lg-2 mt-5 pick_btns">'
                            +'<button type="button" disabled="disabled" id="multiselect_rightAll" class="form-control"><i class="fa fa-forward"></i></button>'
                            +'<button type="button" disabled="disabled" id="multiselect_rightSelected" class="form-control"><i class="fa fa-chevron-right"></i></button>'
                            +'<button type="button" disabled="disabled" id="multiselect_leftSelected" class="form-control"><i class="fa fa-chevron-left"></i></button>'
                            +'<button type="button" disabled="disabled" id="multiselect_leftAll" class="form-control"><i class="fa fa-backward"></i></button>'
                        +'</div>'
                        
                        +'<div class="col-12 col-sm-5 col-md-5 col-lg-5 mt-3">'
                          +'<p class="multi-text-deco">Selected Option</p>'
                            +'<select name="to[]" id="multiselect_to" disabled="disbaled" class="form-control '+value.quesID+'" size="8" multiple="multiple">'
                              if(answers_value.length != parseInt(0)){
                                $(answers_value).each(function(ake, aval) {
                                  label += '<option>' + aval + '</option>'
                                });
                              }
                  label +=        '</select>'
                        +'</div>'
                    +'</div>';
                    actual_questions = [];
                  }
                }

                else {
                  $(question_label).each(function(ke, val) {
                    if (value.quesType == 'Multi Text input') {
                      if (value.accessType == 'Read/Write') {
                        label += '<div class="form-group" style="margin-left : 25px !important"><label>' + val + '</label><input type="text"  ques_id="' + value.quesID + '" name="input_' + key + '_' + ke + '" class="form-control ' + value.quesID + '" value="' + (answers_value[ke] != undefined ? answers_value[ke] : '') + '"></div>'
                      } else {
                        label += '<div class="form-group" style="margin-left : 25px !important"><label>' + val + '</label><input type="text" name="input_' + key + '_' + ke + '" class="form-control ' + value.quesID + '" disabled="disabled" value="' + (answers_value[ke] != undefined ? answers_value[ke] : '') + '"></div>'
                      }
                    } else if (value.quesType == 'Text') {
                      if (value.accessType == 'Read/Write') {
                        label += '<div class="form-group" style="margin-left : 25px !important"><label>' + val + '</label><input type="text" ques_id="' + value.quesID + '" name="input_' + key + '_' + ke + '" class="form-control ' + value.quesID + '" value="' + (answers_value[ke] != undefined ? answers_value[ke] : '') + '"></div>'
                      } else {
                        label += '<div class="form-group" style="margin-left : 25px !important"><label>' + val + '</label><input type="text" name="input_' + key + '_' + ke + '" class="form-control" disabled="disabled" value="' + (answers_value[ke] != undefined ? answers_value[ke] : '') + '"></div>'
                      }
                    } else if (value.quesType == 'Text Area') {
                      if (value.accessType == 'Read/Write') {
                        label += '<div class="form-group" style="margin-left : 25px !important"><label>' + val + '</label><textarea ques_id="' + value.quesID + '" rows="2" class="form-control ' + value.quesID + '">' + (answers_value[ke] != undefined ? answers_value[ke] : '') + '</textarea></div>'
                      } else {
                        label += '<div class="form-group" style="margin-left : 25px !important"><label>' + val + '</label><textarea rows="2" class="form-control" disabled="disabled">' + (answers_value[ke] != undefined ? answers_value[ke] : '') + '</textarea></div>'
                      }
                    } else if (value.quesType == 'Date Picker') {
                      if (value.accessType == 'Read/Write') {
                        label += '<div class="form-group" style="margin-left : 25px !important"><input type="text" name="input_' + key + '_' + ke + '" class="form-control datepicker ' + value.quesID + '" value="'+ (answers_value[ke] != undefined ? answers_value[ke] : '') +'"></div>'
                      } else {
                        label += '<div class="form-group" style="margin-left : 25px !important"><input type="text" name="input_' + key + '_' + ke + '" class="form-control datepicker ' + value.quesID + '" value="'+ (answers_value[ke] != undefined ? answers_value[ke] : '') +'" disabled="disabled"></div>'
                      }
                    } else if (value.quesType == 'Input file') {
                      if (value.accessType == 'Read/Write') {
                        label += '<div class="form-group" style="margin-left : 25px !important"><label>' + val + '</label><input type="text" ques_id="' + value.quesID + '" name="input_' + key + '_' + ke + '" class="form-control ' + value.quesID + '" value="' + (answers_value[ke] != undefined ? answers_value[ke] : '') + '"></div>'
                      } else {
                        label += '<div class="form-group" style="margin-left : 25px !important"><label>' + val + '</label><input type="text" name="input_' + key + '_' + ke + '" class="form-control" disabled="disabled" value="' + (answers_value[ke] != undefined ? answers_value[ke] : '') + '"></div>'
                      }
                    }
                  });
                }

                two += '<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3">' +'<h4 class="question_title" ques_id="' + value.quesID + '">Q'+three +") "+ value.question + '</h4>'+
                  label +
                  '</div>';
              });
            
            }
            i++;
            html += '<div class="card">' + one + two + '</div>'+'</div>' +
                  '</div>'+'</div>' +'</div>';

          }
        });

        $("#question_answer_tab").html(html);

        $('.datepicker').datepicker({
          changeMonth: true,
          changeYear: true
        });

        $(multiselect_ids).each(function(key,value){
          // console.log(value);
          $('#multiselect_'+value).multiselect({
            keepRenderingSort: true
          });
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
      } else {
        $("#question_answer_tab").html('<div class="col-12 col-sm-12" style="text-align:center;"><p><strong>'+res.msg+'</strong></p></div>');
        $("#collase_all").hide();
        $("#saveQuestionData").hide();
        $("#saveNotifyQuestionData").hide();
      }
    }
  });
}

$("#saveQuestionData").click(function() {
  $("#QA_loading").addClass('show');
  var form_ids = [];
  var multipicklist_values = [];
  var postData = {};
  var type = 'save';

  $('h4').each(function() {
    id = $(this).attr('ques_id');
    form_ids.push(id);
  });

  $(form_ids).each(function(key, value) {
    if (value != undefined) {
      postData[value] = $("." + value + "").map(function() {
      if ($(this).is(':enabled')) {
        // console.log(this);
        if($(this).attr('id') == 'multiselect_'+value+'_to'){
          $("#multiselect_"+value+"_to > option").each(function(){
            multipicklist_values.push(this.value);
          });
          return multipicklist_values;
        } else {
          return this.value;
        }
      }
      }).get();
    }
    multipicklist_values = [""];
  });
  $.ajax({
    url: base_url + 'saveQuestion/' + type + '/' + task_id,
    method: 'POST',
    data: postData,
    success: function(response) {
      $("#QA_loading").removeClass('show');
      var res = JSON.parse(response);
      if (res.st === parseInt(1)) {
        $('#show_message').removeClass('alert alert-success');
        $("#show_message").html('<p>' + res.msg + '</p>');
        $('#show_message').addClass('alert alert-success');
        $('#show_message').css({"width": "100%"});
        $("#show_message").delay(2000).fadeOut();
        $('#show_message').css({
          "width": "100%",
          "display": "block"
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
});


$("#saveNotifyQuestionData").click(function() {
  $("#QA_loading").addClass('show');
  var form_ids = [];
  var multipicklist_values = [];
  var postData = {};
  var type = 'notify';

  $('h4').each(function() {
    id = $(this).attr('ques_id');
    form_ids.push(id);
  });

  $(form_ids).each(function(key, value) {
    if (value != undefined) {
      postData[value] = $("." + value + "").map(function() {
      if ($(this).is(':enabled')) {
        // console.log(this);
        if($(this).attr('id') == 'multiselect_'+value+'_to'){
          $("#multiselect_"+value+"_to > option").each(function(){
            multipicklist_values.push(this.value);
          });
          return multipicklist_values;
        } else {
          return this.value;
        }
      }
      }).get();
    }
    multipicklist_values = [""];
  });

  $.ajax({
    url: base_url + 'saveQuestion/' + type + '/' + task_id,
    method: 'POST',
    data: postData,
    success: function(response) {
      $("#QA_loading").removeClass('show');
      var res = JSON.parse(response);
      if (res.st === parseInt(1)) {
        $('#show_message').removeClass('alert alert-success');
        $("#show_message").html('<p>' + res.msg + '</p>');
        $('#show_message').addClass('alert alert-success');
        $('#show_message').css({"width": "100%"});
        $("#show_message").delay(2000).fadeOut();
        $('#show_message').css({
          "width": "100%",
          "display": "block"
        });

        if (res.is_editable == 'false') {
          $("#saveQuestionData").hide();
          $("#saveNotifyQuestionData").hide();
          
          $(form_ids).each(function(key, value) {
            if (value != undefined) {
              $("." + value + "").attr('disabled', true);
              location.reload();
            }
          });
        }
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
});


function showChangeRequestData(){
  $("#CR_loading").addClass('show');
  var html ="";
  var carousel='';
  $.ajax({
    url: base_url + 'changeRequest',
    method: 'post',
    data: "task_id=" + task_id,
    success: function(response) {
      var res = JSON.parse(response);
      $("#CR_loading").removeClass('show');
      //console.log(res);return false;
      if(res.st === parseInt(1)){
        $(res.changerequest).each(function(ke, val) {
          if(ke === parseInt(0)){ var cla_act= 'active';} else{ var cla_act='';}
          carousel += '<li data-target="#demo" data-slide-to="'+ke+'"  class="'+cla_act+'" id="carousel_'+ke+'" onclick="addClassdynamic(this.id)"></li>';
        });

        html += '<ul class="carousel-indicators">'+carousel+'</ul>';
        html+= '<div class="carousel-inner">';

      $(res.changerequest).each(function(key, value) {
      if(value.contentType=="Audio"){
        if(key==0){ var add_active_class = 'active';} else{  var add_active_class = ''; }
        var content=""; 
        if(value.contentUrl==null){ var content_url = '';} else{  var content_url = value.contentUrl; }
        if(value.dropContentUrl==null){ var drop_url = '';} else{  var drop_url = value.dropContentUrl; } 
      $.each(value.TimeLapVsComments, function(idx, obj) {
          content += '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                        '<label class="light"><strong>'+idx+'</strong></label>'+
                      '</div>'+
                      '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                          '<label class="light"><strong>'+obj+'</strong></label>'+
                      '</div>';
         
          });

        html+='<div class="carousel-item audio '+add_active_class+'">'+
                      '<div class="row">'+
                      '<div class="col-12 col-sm-12 col-md-12 col-lg-3 text-center">'+
                        '<img src="'+base_url+'assets/images/audio.png">'+
                      '</div>'+
                      '<div class="col-12 col-sm-12 col-md-12 col-lg-9">'+
                        '<h3 class="item_title">Content Audio</h3>'+
                        '<div class="row mt-3">'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                              '<label class="light">Content URL</label>'+
                          '</div>'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                             '<b><a href="'+content_url+'" target="_blank" class="work-break">'+content_url+'</a></b>'+
                          '</div>'+
                        '</div>'+
                        '<div class="row mt-3">'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                            '<label class="light"><strong>Time-Lap</strong></label>'+
                            '</div>'+
                            '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                             '<label class="light"><strong>Comments</strong></label>'+
                           '</div>'+content+
                        '</div>'+
                        '<div class="row mt-5">'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                              '<label class="light">Drop Your Updated Content Here</label>'+
                            '</div>'+
                            '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                              '<b><a href="'+drop_url+'" target="_blank" class="work-break">'+drop_url+'</a></b>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row mt-5">'+
                          '<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">'+
                            '<div class="form-check">'+
                              '<input type="checkbox" class="form-check-input need_to_check">'+
                              '<label class="form-check-label" for="exampleCheck1">* I have checked all feedback  & uploaded the  updated  deliverable for review'+
                            '</label>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                        /*'<div class="row mt-3">'+
                          '<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">'+
                            '<button type="button" class="change_req btn disabled">Submit</button>'+
                          '</div>'+
                        '</div>'+*/
                      '</div>'+
                    '</div>'+
                  '</div>';
       }
       else if(value.contentType=="Text"){
         if(key==0){ var add_active_class = 'active';} else{  var add_active_class = ''; }
        var content = '';
        if(value.contentUrl==null){ var content_url = '';} else{  var content_url = value.contentUrl; }
        if(value.dropContentUrl==null){ var drop_url = '';} else{  var drop_url = value.dropContentUrl; }
        for (var i in value.TimeLapVsComments) {
          content = '<p class="output">'+i+'</p>';
  /*alert("key : " + i + " - value : " + value.TimeLapVsComments[i]);*/
          }
        html+='<div class="carousel-item text '+add_active_class+'">'+
                    '<div class="row">'+
                      '<div class="col-12 col-sm-12 col-md-12 col-lg-3 text-center">'+
                        '<img src="'+base_url+'assets/images/doc.png">'+
                      '</div>'+
                      '<div class="col-12 col-sm-12 col-md-12 col-lg-9">'+
                        '<h3 class="item_title">Content Document</h3>'+
                        '<div class="row mt-3">'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                                            '<label class="light">Content URL</label>'+
                                        '</div>'+
                                        '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                                            '<b><a href="'+content_url+'" target="_blank" class="work-break">'+content_url+'</a></b>'+
                                        '</div>'+
                        '</div>'+
                        '<div class="row mt-3">'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                                            '<label class="light">Custom Feedback</label>'+
                                        '</div>'+
                                        '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                                            content+
                                        '</div>'+
                        '</div>'+
                        '<div class="row mt-5">'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                                            '<label class="light">Drop Your Updated Content Here</label>'+
                                        '</div>'+
                                        '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                                            '<b><a href="'+drop_url+'" target="_blank" class="work-break">'+drop_url+'</a></b>'+
                                        '</div>'+
                        '</div>'+
                        '<div class="row mt-5">'+
                          '<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">'+
                            '<div class="form-check">'+
                              '<input type="checkbox" class="form-check-input need_to_check">'+
                              '<label class="form-check-label" for="exampleCheck1">* I have checked all feedback  & uploaded the  updated  deliverable for review'+
                            '</label>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                       /* '<div class="row mt-3">'+
                          '<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">'+
                            '<button type="button" class="change_req btn disabled">Submit</button>'+
                          '</div>'+
                        '</div>'+*/
                      '</div>'+
                    '</div>'+
                  '</div>';
       }
       else if(value.contentType=="Video"){
         if(key==0){ var add_active_class = 'active';} else{  var add_active_class = ''; }
         var content=""; 
         if(value.contentUrl==null){ var content_url = '';} else{  var content_url = value.contentUrl; }
        if(value.dropContentUrl==null){ var drop_url = '';} else{  var drop_url = value.dropContentUrl; }  
      $.each(value.TimeLapVsComments, function(idx, obj) {
          content += '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                        '<label class="light"><strong>'+idx+'</strong></label>'+
                      '</div>'+
                      '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                          '<label class="light"><strong>'+obj+'</strong></label>'+
                      '</div>';
         
          });

        html+='<div class="carousel-item video '+add_active_class+'">'+
                   '<div class="row">'+
                      '<div class="col-12 col-sm-12 col-md-12 col-lg-3 text-center">'+
                        '<img src="'+base_url+'assets/images/videos.png">'+
                      '</div>'+
                      '<div class="col-12 col-sm-12 col-md-12 col-lg-9">'+
                        '<h3 class="item_title">Content Videos</h3>'+
                        '<div class="row mt-3">'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                            '<label class="light">Content URL</label>'+
                          '</div>'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                            '<b><a href="'+content_url+'" target="_blank" class="work-break">'+content_url+'</a></b>'+
                          '</div>'+
                        '</div>'+
                        '<div class="row mt-3">'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                            '<label class="light"><strong>Time-Lap</strong></label>'+
                          '</div>'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                          '<label class="light"><strong>Comments</strong></label>'+
                          '</div>'+content+
                        '</div>'+
                        '<div class="row mt-5">'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                             '<label class="light">Drop Your Updated Content Here</label>'+
                            '</div>'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                            '<b><a href="'+drop_url+'" target="_blank" class="work-break">'+drop_url+'</a></b>'+
                          '</div>'+
                        '</div>'+
                        '<div class="row mt-5">'+
                          '<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">'+
                            '<div class="form-check">'+
                              '<input type="checkbox" class="form-check-input need_to_check">'+
                              '<label class="form-check-label" for="exampleCheck1">* I have checked all feedback  & uploaded the  updated deliverable for review'+
                            '</label>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                        /*'<div class="row mt-3">'+
                          '<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">'+
                            '<button type="button" class="change_req btn disabled">Submit</button>'+
                          '</div>'+
                        '</div>'+*/
                      '</div>'+
                    '</div>'+
                  '</div>';

       }
       else if(value.contentType=="Presentation"){
         if(key==0){ var add_active_class = 'active';} else{  var add_active_class = ''; }
        var content="";  
        if(value.contentUrl==null){ var content_url = '';} else{  var content_url = value.contentUrl; }
        if(value.dropContentUrl==null){ var drop_url = '';} else{  var drop_url = value.dropContentUrl; }  
      $.each(value.TimeLapVsComments, function(idx, obj) {
          content += '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                        '<label class="light"><strong>'+idx+'</strong></label>'+
                      '</div>'+
                      '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                          '<label class="light"><strong>'+obj+'</strong></label>'+
                      '</div>';
         
          });

        html+='<div class="carousel-item presentation '+add_active_class+'">'+
               '<div class="row">'+
                '<div class="col-12 col-sm-12 col-md-12 col-lg-3 text-center">'+
                        '<img src="'+base_url+'assets/images/ppt.png">'+
                  '</div>'+
                      '<div class="col-12 col-sm-12 col-md-12 col-lg-9">'+
                        '<h3 class="item_title"> Content Presentation</h3>'+
                        '<div class="row mt-3">'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                           '<label class="light">Content URL</label>'+
                          '</div>'+
                        '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                          '<b><a href="'+content_url+'" target="_blank" class="work-break">'+content_url+'</a></b>'+
                         '</div>'+
                        '</div>'+
                        '<div class="row mt-3">'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                           '<label class="light"><strong>Slide No</strong></label>'+
                          '</div>'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                          '<label class="light"><strong>Comments</strong></label>'+
                          '</div>'+content+
                        '</div>'+
                        '<div class="row mt-5">'+
                          '<div class="col-6 col-sm-6 col-md-6 col-lg-4">'+
                            '<label class="light">Drop Your Updated Content Here</label>'+
                            '</div>'+
                           '<div class="col-6 col-sm-6 col-md-6 col-lg-8">'+
                            '<b><a href="'+drop_url+'" target="_blank" class="work-break">'+drop_url+'</a></b>'+
                          '</div>'+
                        '</div>'+
                        '<div class="row mt-5">'+
                          '<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">'+
                            '<div class="form-check">'+
                              '<input type="checkbox" class="form-check-input need_to_check">'+
                              '<label class="form-check-label" for="exampleCheck1">* I have checked all feedback  & uploaded the  updated deliverable for review'+
                            '</label>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                        /*'<div class="row mt-3">'+
                          '<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">'+
                            '<button type="button" class="change_req btn disabled">Submit</button>'+
                          '</div>'+
                        '</div>'+*/
                      '</div>'+
                    '</div>'+
                  '</div>';
       }
      
       });
        html+='</div>';
        html+='<span onclick="prevaction()"><a class="carousel-control-prev" href="#demo" data-slide="prev">'+
                  '<span class="carousel-control-prev-icon" ></span>'+
                '</a></span>'+
                '<span onclick="nextaction()"><a class="carousel-control-next" href="#demo" data-slide="next">'+
                  '<span class="carousel-control-next-icon"></span>'+
                '</a></span>';
       $("#get_change_request").html(html);
      }
     
      else if(res.st === parseInt(0)){
        $("#get_change_request").html('<div class="col-12 col-sm-12" style="text-align:center;"><p><strong>' + res.msg + '</strong></p></div>');
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

function addClassdynamic(id){
  if(id=='carousel_0'){
    $("#carousel_1").removeClass('active');
    $("#carousel_2").removeClass('active');
    $("#carousel_3").removeClass('active');
    $("#carousel_0").addClass('active');
  
  }
  else if(id=='carousel_1'){
    $("#carousel_0").removeClass('active');
    $("#carousel_2").removeClass('active');
    $("#carousel_3").removeClass('active');
    $("#carousel_1").addClass('active');

  }
  else if(id=='carousel_2'){
    $("#carousel_0").removeClass('active');
    $("#carousel_1").removeClass('active');
    $("#carousel_3").removeClass('active');
    $("#carousel_2").addClass('active');
  }
  else if(id=='carousel_3'){
    $("#carousel_0").removeClass('active');
    $("#carousel_1").removeClass('active');
    $("#carousel_2").removeClass('active');
    $("#carousel_3").addClass('active');
  }
}

function nextaction(){
var check_0 = $('#carousel_0').attr('class');
var check_1 = $('#carousel_1').attr('class');
var check_2 = $('#carousel_2').attr('class');
var check_3 = $('#carousel_3').attr('class');
if(check_0=='active'){
$("#carousel_0").removeClass('active');
$("#carousel_1").addClass('active');
}
else if(check_1=='active'){
$("#carousel_1").removeClass('active');
$("#carousel_2").addClass('active');
}
else if(check_2=='active'){
$("#carousel_2").removeClass('active');
$("#carousel_3").addClass('active');
}
else if(check_3=='active'){
$("#carousel_3").removeClass('active');
$("#carousel_0").addClass('active');
}
}


function prevaction(){
var check_0 = $('#carousel_0').attr('class');
var check_1 = $('#carousel_1').attr('class');
var check_2 = $('#carousel_2').attr('class');
var check_3 = $('#carousel_3').attr('class');
if(check_0=='active'){
$("#carousel_0").removeClass('active');
$("#carousel_3").addClass('active');
}
else if(check_1=='active'){
$("#carousel_1").removeClass('active');
$("#carousel_0").addClass('active');
}
else if(check_2=='active'){
$("#carousel_2").removeClass('active');
$("#carousel_1").addClass('active');
}
else if(check_3=='active'){
$("#carousel_3").removeClass('active');
$("#carousel_2").addClass('active');
}
}