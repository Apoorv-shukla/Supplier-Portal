
$(document).ready(function(){
  searchArr = [];
  createPieChartJS();
  getAllTaskList();
  getRecentSearch();
//   myCourse();
// var session_value = $('#session_value').val();
//   if(session_value == 'EduUser'){
//   myCourse();
// }else if(session_value == 'Supplier'){
//   searchArr = [];
//   createPieChartJS();
//   getAllTaskList();
//   getRecentSearch();
//  } 
//  else if(session_value == 'Merge'){
//   searchArr = [];
//   createPieChartJS();
//   getAllTaskList();
//   getRecentSearch();
//   //myCourse();
//  } 
  
});


function createPieChartJS(){
  $("#chartloading").addClass('show');
  $.ajax({
  url: './piechart',
  method: 'post',
  success: function(response) {
      var res = JSON.parse(response);
      $("#chartloading").hide();

      if(res.result.Values.every(item => item === 0)){
        $('#noData').text('Data Not Available');
      }
      else{
            if (res.st === parseInt(1)) {

              // console.log(res.result.Labels);return false;

        let myChart =document.getElementById('mychart').getContext('2d');
        let massPopChart = new Chart(myChart,{
        type: 'doughnut',
          data: {
              datasets: [{
                  data: res.result.Values,
                  backgroundColor: [
                    '#ed9f33', // yellow pending
                    '#32a8ff',// blue started
                    '#0024ff',// black review
                    '#000', // dark blue change request
                    '#21521f',// green done
                    // '#ff264f',// red rejected

                  ],
                  borderWidth: 0,
                  hoverBorderWidth:0,
                  label: 'Dataset 1'
              }],
              labels: res.result.Labels,
          },
          options: {
              responsive: true,
              legend: {
                  position: 'bottom', 
                  align: "start",
                  labels: {
                      fontColor: '#fff',
                      boxWidth: 25,
                  }
              },
              animation: {
                  animateScale: true,
                  animateRotate: true
              }
          }
        })

            }
          }
      }
    });
}
// var table = null;
function getAllTaskList(){
  // var searchArr = [];
  // $("#tableloading").addClass('show');
  $("#onloadtable").addClass('show');
  var html = "";
  var filter_data = $('#filter_id').val();
  if(filter_data=='Pending'){
    $("#reject_status_btn").css('display','block');
    $("#accept_status_btn").css('display','block');
   
  }else {
    $("#reject_status_btn").css('display','none');
    $("#accept_status_btn").css('display','none');
    
  }
  $.ajax({
    url: './list-of-task',
    method: 'post',
    data: "filter_data="+filter_data,
    success: function(response) {
      $("#onloadtable").removeClass('show');
      var res = JSON.parse(response);
      if(res.st===parseInt(1)){
        if(filter_data=='Pending'){
        var spanclass='';
        var po_status ="";
        html += `<table id="myTable" class="table display " cellspacing="0" width="100%" style="width:100%" >
          <thead>
              <tr>
                <th id="chck_box_hide"><input type="checkbox" name="selectAll" id="ckbCheckAll"></th>
                <th>Task Name</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>Delivery Date</th>
                <th>Price</th>
        <th>Priority</th>
                <th>Task Status</th>
              </tr>
          </thead>
        <span id="tableloading"></span>
        <tbody id="task_list">`;
        $(res.task_list.records).each(function(key,value){
          if(value.PO_Status__c=='Pending'){
            spanclass ='pending status';
            po_status ="Pending";
          
            /*$("#reject_status_btn").show();
            $("#accept_status_btn").show();*/
          } else if(value.PO_Status__c=='Started'){
            spanclass ='inprogress status';
            po_status ="Started";
            /*$("#accept_status_btn").hide();
            $("#reject_status_btn").hide();*/
          } else if(value.PO_Status__c=='Review'){
            spanclass ='review status';
            po_status ="Review";
           /*$("#reject_status_btn").hide();
           $("#accept_status_btn").hide();*/
          } else if(value.PO_Status__c=='Completed'){
            spanclass ='done status';
            po_status ="Completed";
           /*$("#reject_status_btn").hide();
           $("#accept_status_btn").hide();*/
          } else if(value.PO_Status__c=='Rejected'){
            spanclass ='reject status';
            po_status ="Rejected";
           /*$("#reject_status_btn").hide();
           $("#accept_status_btn").hide();*/
          } else if(value.PO_Status__c=='Change Request'){
            spanclass ='change status';
            po_status ="Change Request";
            /*$("#reject_status_btn").hide();
            $("#accept_status_btn").hide();*/
          }
          else if(value.PO_Status__c==null){
            spanclass ='change status';
            po_status = 'None';
            /*$("#reject_status_btn").hide();
            $("#accept_status_btn").hide();*/
          }
        

          if(value.StartDate__c==null){
             var finalstartdate = '';
          }
          else{
            var startdate = value.StartDate__c;
            var myArr = startdate;
            var result = myArr.split('-');
            var slash = "/";
            var finalstartdate =result[2].concat(slash).concat(result[1]).concat(slash).concat(result[0]);
          }
          if(value.OrderDate__c==null){
            var finaldeliverydate = '';
          }
          else{
            var deliverydate = value.OrderDate__c;
            var myArr2 = deliverydate;
            var result2 = myArr2.split('-');
            var slash = "/";
            var finaldeliverydate =result2[2].concat(slash).concat(result2[1]).concat(slash).concat(result2[0]);
          }
          if(value.PricePerWord__c==null){
            var priceperworld = '';
          }
          else{
            var priceperworld = value.PricePerWord__c;
          }
      if(value.Taskray_Priority__c==null){
            var Priority = '';
          }
          else{
            var Priority = value.Taskray_Priority__c;
          }
          html +="<tr>"+
          "<td id='chck_box_hide'><input type='checkbox' name ='status' id='"+value.Id+"' class='checkBoxClass' value='"+value.Id+"' onclick='enablebutton(this.id);'>"+"</td>"+
          "<td id='"+value.Name+"'> <a href='./task/"+value.Id+"' >"+value.Name+ "</a></td>"+
          "<td>"+value.Name__c+ "</td>"+
          "<td>"+finalstartdate+ "</td>"+
          "<td>"+finaldeliverydate+ "</td>"+
          "<td>"+priceperworld+ "</td>"+
      "<td>"+Priority+ "</td>"+
          "<td><span class='"+spanclass+"'>"+po_status+ "</span></td></tr>";
          searchArr.push(value.Name);
          // console.log(searchArr);
        });
          
        html+=`</tbody></table>`;
        $("#div_outer_table").html(html); 

       } else {
                  var spanclass='';
                  var po_status="";
        html += `<table id="myTable" class="table display " cellspacing="0" width="100%" style="width:100%" >
          <thead>
              <tr>
               
                <th>Task Name</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>Delivery Date</th>
                <th>Price</th>
        <th>Priority</th>
                <th>Task Status</th>
              </tr>
          </thead>
        <span id="tableloading"></span>
        <tbody id="task_list">`;
        $(res.task_list.records).each(function(key,value){
          if(value.PO_Status__c=='Pending'){
            spanclass ='pending status';
            po_status ="Pending";
          } else if(value.PO_Status__c=='Started'){
            spanclass ='inprogress status';
            po_status ="Started";
          } else if(value.PO_Status__c=='Review'){
            spanclass ='review status';
            po_status ="Review";
          } else if(value.PO_Status__c=='Completed'){
            spanclass ='done status';
            po_status ="Completed";
          } else if(value.PO_Status__c=='Rejected'){
            spanclass ='reject status';
            po_status ="Rejected";
          } else if(value.PO_Status__c=='Change Request'){
            spanclass ='change status';
            po_status ="Change Request";
          }
          else if(value.PO_Status__c==null){
            spanclass ='change status';
            po_status ="None";
          }
        
          if(value.StartDate__c==null){
            var finalstartdate = '';
          }
          else{
            var startdate = value.StartDate__c;
            var myArr = startdate;
            var result = myArr.split('-');
            var slash = "/";
            var finalstartdate =result[2].concat(slash).concat(result[1]).concat(slash).concat(result[0]);
          }
          if(value.OrderDate__c==null){
            var finaldeliverydate = '';
          }
          else{
            var deliverydate = value.OrderDate__c;
            var myArr2 = deliverydate;
            var result2 = myArr2.split('-');
            var slash = "/";
            var finaldeliverydate =result2[2].concat(slash).concat(result2[1]).concat(slash).concat(result2[0]);
          }
          if(value.PricePerWord__c==null){
            var priceperworld = '';
          }
          else{
            var priceperworld = value.PricePerWord__c;
          }
      if(value.Taskray_Priority__c==null){
            var Priority = '';
          }
          else{
            var Priority = value.Taskray_Priority__c;
          }
          html +="<tr>"+
          "<td id='"+value.Name+"'> <a href='./task/"+value.Id+"' >"+value.Name+ "</a></td>"+
          "<td>"+value.Name__c+ "</td>"+
          "<td>"+finalstartdate+ "</td>"+
          "<td>"+finaldeliverydate+ "</td>"+
          "<td>"+priceperworld+ "</td>"+
      "<td>"+Priority+ "</td>"+
          "<td><span class='"+spanclass+"'>"+po_status+ "</span></td></tr>";
          searchArr.push(value.Name);
        });
          
        html+=`</tbody></table>`;
        $("#div_outer_table").html(html);
       }
      } 
      else if(res.st === parseInt(0)){
        $("#div_outer_table").text(res.msg);    
      } 
      else if(res.st === parseInt(403)){ // Added to logout user if session is expire start
        $("#div_outer_table").text('No Data Available');
        swal({
          title: "Logged in Session Expire",
          text: "Page will redirect to login screen in 5 seconds",
          type: "warning",
          timer: 5000
        }).then(function() {
          window.location = "./login";
        });
      } // Added to logout user if session is expire end
      $('#myTable').DataTable({
        "destroy":true,
        "info": false,
        "searching": false,
        "lengthChange": false,
        //"ordering": true,
        "aaSorting": [[2, 'desc']],
        "pageLength": 10,
        "language": {
          "paginate": {
          "previous": "<",
          "next" : ">"
         }
        }
      }); 
      $(".head_btn").addClass('disabled'); 
      $("#ckbCheckAll").click(function () {
        $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        if ($(this).is(':checked')) {
          $(".head_btn").removeClass('disabled');
        } else {
          $(".head_btn").addClass('disabled');
        }
      });
      $(".checkBoxClass").change(function(){
        if (!$(this).prop("checked")){
          $("#ckbCheckAll").prop("checked",false);
        }
      });
    }
  });
}



//profile DATA 
function profileData(){
  $.ajax({
  url: './profileData',
  method: 'post',
  success: function(response) {
      var res = JSON.parse(response);
            if (res.st === parseInt(1)) {
               $(res.profile_data.records).each(function(key,value){
                $('#name').text(value.Name);
                $('#phone').text(value.Phone);
                $('#mobile').text(value.MobilePhone);
                $('#account_name').text(value.Account.Name);
                $('#l_url').text(value.Linkedin_URL__c);
                $('#t_url').text(value.Twitter_Name__c);
                $('#comm').text(value.Communication_Language__c);
                $('#m_address').text(value.MailingAddress.street + value.MailingAddress.city + value.MailingAddress.state + value.MailingAddress.country + value.MailingAddress.postalCode);
               }); 
            }
          }
        });
}



$("#accept_status_btn").click(function(){
  if($(this).attr("class")=='btn head_btn accpt disabled'){
    $('#btn_click_without_select').text('Please Select Atleast One Task');
    $("#btn_click_without_select").css("display", "block");
    $("#btn_click_without_select").delay(1000).fadeOut();
  } else {
      var fd = new FormData()
      $("input:checkbox[name=status]:checked").each(function () {
      fd.append('task_id[]',$(this).val());
     }); 
  $.ajax({
  url: base_url+'acceptDashboardStatus',
  method: 'post',
  dataType: 'JSON',
  data: fd,
  contentType: false,
  processData: false,
  success: function(response) {
     if(response.st===parseInt(1)){
             getAllTaskList();
           }
            else if(response.st === parseInt(403)){
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
});

// $(function(){
//   // var availableTags = [{label : 'prateek', value : 'Prateek'}, {label : "Name", value : 'Narayan'}];

//   $( "#search_input_data" ).autocomplete({
//     source    : searchArr,
//     position: {  my: "right bottom", at: "right top", collision: "flip"  },
//     // source    : availableTags,
//     select: function(event, ui) {
//       doSearch(ui.item.label, ui.item.city);
//     }
//   });
// })

// function doSearch(term, location) {
//   // console.log(term);
//   var location = $("#"+term).children('a').attr("href").split("/");
//   // var loc = location.split("/")
//   // console.log(location);return false;
//   window.location.href = 'http://localhost/supplier_portal/task/'+location[2];
// }

$("#reject_status_btn").click(function(){
  if($(this).attr("class")=='btn head_btn reject disabled'){
    $('#btn_click_without_select').text('Please Select Atleast One Task');
    $("#btn_click_without_select").css("display", "block");
    $("#btn_click_without_select").delay(1000).fadeOut();
  } else {
    var fd = new FormData()
    $("input:checkbox[name=status]:checked").each(function () {
    fd.append('task_id[]',$(this).val());
    });
  $.ajax({
  url: base_url+'rejectDashboardStatus',
  method: 'post',
  data: fd,
  contentType: false,
  processData: false,
  success: function(response) {
    //console.log('dsdsdsds');
    var res = JSON.parse(response);
     if(res.st===parseInt(1)){
            getAllTaskList();
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
});


function enablebutton(id){
  if($('#' + id).is(":checked") || $('.checkBoxClass').is(":checked")){
    $(".head_btn").removeClass('disabled');
  } else{
    $(".head_btn").addClass('disabled');
  }      
}
// RECENT SEARCH

function getRecentSearch(){
  $("#recentsearchdata").addClass('show');
  var html="";
  $.ajax({
  url: './recentsearch',
  method: 'post',
  success: function(response) {
    $("#recentsearchdata").removeClass('show');
      var res = JSON.parse(response);
            if (res.st === parseInt(1)) {
                 html = '<ul>';
              $(res.recent_search.response.data).each(function(key,value){
                // console.log(value.Purchase_Order__c);
                // console.log(value.Purchase_Order__r.Name); return false;
                 html += '<a href="./task/'+value.Purchase_Order__c+'" style="color:#fff;"><li>'+ value.Purchase_Order__r.Name + '</li></a>';
    
                 });
               html += '</ul>';
            
               $("#recentsearchs").html(html);

            }
          }
        });
}

//jaidev code 



// my course js 

function myCourse(){
    $('.myCourse_outer').addClass('show');
    $(".myCourse_loader").addClass('show');
        
    var contact_id = $('#contact_id').val();
        
    var html="";
    var pagination="";
  $.ajax({
  url: './myCourse',
  method: 'post',
  success: function(response) {
    $('.myCourse_outer').removeClass('show');
            $(".myCourse_loader").removeClass('show');
      var res = JSON.parse(response);
      // console.log(res.st);
      // return false;
          if (res.st === parseInt(404)) {

              html+= '<div class="row">'+ 
                       '<div class="col-12 no_cousrse_list">'+
                       '<p class="mt-5 text-center "  style="font-size:20px; font-weight:bold; ">You have not purchased any course yet.</p></br>'+
                       '<p class=""  style="text-align:center;">Find relevent course<a href="./courseListing" style="color:blue;text-decoration:none;"> here</a></p>'+
                       '</div>'+
                      '</div>';
            $("#myCourseData").html(html);

            }
      
           else if (res.st === parseInt(1)) {
             
             html+='<div class="row pt-5">';
              $(res.result.services).each(function(key,value){
                if (value.serviceName !=null ){
                     var title_length = value.serviceName.length;
                  }
                    else{
                     var title_length = value.serviceName;
                    }
                if(title_length < 55){
                    title = '<a href="./purchaseddetail?courseid='+value.serviceId+'&contactid='+contact_id+'" style="color:black;text-decoration:none;"><h5 class="font-weight-medium">'+value.serviceName+'</h5></a>';
                } else {
                    title = '<a href="./purchaseddetail?courseid='+value.serviceId+'&contactid='+contact_id+'" style="color:black;text-decoration:none;"><h5 class="font-weight-medium">'+value.serviceName.substring(0,55)+'...</h5></a>';
                }
                 if (value.shortDesciption !=null ){
                     var desc_length = value.shortDesciption.length;
                  }
                    else{
                     var desc_length = value.shortDesciption;
                    }
                if(desc_length < 200){
                    des_str = '<p class="p-0 m-0">'+value.shortDesciption+'</p>';
                } else {
                    des_str = '<p class="p-0 m-0">'+value.shortDesciption.substring(0,200)+'...</p>';
                }
                 html  +=       ' <div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-3">'+
                               '<div class=" ">'+
                               '<div class="imageCon">'+
                               '<a href="./purchaseddetail?courseid='+value.serviceId+'&contactid='+contact_id+'" ><img src="'+value.imageUrl+'" class="w-100" alt="course3"/></a>'+
                              '</div>'+
            '<div class="course_box" style="min-height:250px;">'+
              '<div class="details">'+
                title+
                //'<a href="./coursedetail/'+value.serviceId+'" style="color:black;text-decoration:none;"><h5 class="font-weight-light">'+title+'</h5></a>'+
                des_str+
                '<ul class="course-meta desc">'+
                  '<li>'+
                      '<h6>Chapters</h6>';
                      if(value.serviceChapter==null || value.serviceChapter==parseInt(0)) { var no_label = 'N/A';  } else { var no_label = value.serviceChapter;}
                html  += '<span>'+no_label+'</span>'+
                  '</li>'+
                  '<li>'+
                      '<h6>Duration</h6>'+
                      '<span>'+value.courseDuration+'</span>'+
                  '</li>'+

                  '<li>'+
                      '<a href="./purchaseddetail?courseid='+value.serviceId+'&contactid='+contact_id+'"><button type="button" class="btn btn-primary" style="font-size:12px !important;">Read More</button></a>'+
                  '</li>'+
              '</ul>'+
              '</div>'+
            '</div>'+
          '</div>'+
        '</div>';
                 
                 
                 });

              html+='</div>';

               var totalrecord = res.result.databaseRecords;
                  var total_page = Math.ceil(totalrecord/3);
                  // console.log(total_page);
            pagination+= '<ul class="paging-row">';
            pagination+=    '<li class="" style="text-align:left;">'+
                            '<button class="btn pagination-button disabled"><a  class="button" style="font-size:12px;">Previous</a></button>'+
                    '</li>';
             pagination+= '<li class="" style="text-align: center;">'+
                    '<ul class="pagination">';
                    var a= '';
                    for (i = 1; i <= total_page; i++) {
                        if(i==1){ var pageactive= 'active'; } else { var pageactive=''; }
                     // var a =i+1;

                       // if(i!==0){
                        console.log(i);
                    pagination+='<li class="'+pageactive+'" style="cursor: pointer;"><a onclick = myCoursePage("'+i+'");>'+i+'</a></li>';
                             // }
                         }
                 pagination+= '</ul>'+
                    '</li>';
                    if(parseInt(total_page)!=1) { var ne= ''; var no = 2;} else { var ne='disabled'; var no = '1';}
                   pagination+= '<li class="" style="text-align: right;">'+
                            '<button class="btn pagination-button '+ne+'"><a onclick = myCoursePage("'+no+'"); class="button" style="font-size:12px;">Next</a></button>'+
                    '</li>'+
                     '</ul>';


              
            
               $("#myCourseData").html(html);
               $('#pagination').html(pagination);

            }
          }
        });
}


    function myCoursePage(page){
    //alert(page);
     $('.myCourse_outer').addClass('show');
    $(".myCourse_loader").addClass('show');

     var contact_id = $('#contact_id').val();
 
  var html="";
  var pagination="";
  var prev="";
  var next ="";
  $.ajax({
  url: './myCourse/'+page,
  method: 'post',
  success: function(response) {
   var res = JSON.parse(response);
    if (res.st === parseInt(1)) {
           $('.myCourse_outer').removeClass('show');
            $(".myCourse_loader").removeClass('show');

  html+='<div class="row pt-5">';
              $(res.result.services).each(function(key,value){
                if (value.serviceName !=null ){
                     var title_length = value.serviceName.length;
                  }
                    else{
                     var title_length = value.serviceName;
                    }
                if(title_length < 55){
                    title = '<a href="./purchaseddetail?courseid='+value.serviceId+'&contactid='+contact_id+'" style="color:black;text-decoration:none;"><h5 class="font-weight-light">'+value.serviceName+'</h5></a>';
                } else {
                    title = '<a href="./purchaseddetail?courseid='+value.serviceId+'&contactid='+contact_id+'" style="color:black;text-decoration:none;"><h5 class="font-weight-light">'+value.serviceName.substring(0,55)+'...</h5></a>';
                }
                if (value.shortDesciption !=null ){
                     var desc_length = value.shortDesciption.length;
                  }
                    else{
                     var desc_length = value.shortDesciption;
                    }
                if(desc_length < 200){
                    des_str = '<p class="p-0 m-0">'+value.shortDesciption+'</p>';
                } else {
                    des_str = '<p class="p-0 m-0">'+value.shortDesciption.substring(0,200)+'...</p>';
                }
                 html  +=       ' <div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-3">'+
                               '<div class=" ">'+
                               '<div class="imageCon">'+
                               '<a href="./purchaseddetail?courseid='+value.serviceId+'&contactid='+contact_id+'" ><img src="'+value.imageUrl+'" class="w-100" alt="course3"/></a>'+
                              '</div>'+
            '<div class="course_box" style="min-height:250px;">'+
              '<div class="details">'+
                title+
                //'<a href="./coursedetail/'+value.serviceId+'" style="color:black;text-decoration:none;"><h5 class="font-weight-light">'+title+'</h5></a>'+
                des_str+
                '<ul class="course-meta desc">'+
                  '<li>'+
                      '<h6>Chapters</h6>';
                      if(value.serviceChapter==null || value.serviceChapter==parseInt(0)) { var no_label = 'N/A';  } else { var no_label = value.serviceChapter;}
          html  += '<span>'+no_label+'</span>'+
                  '</li>'+
                  '<li>'+
                      '<h6>Duration</h6>'+
                      '<span>'+value.courseDuration+'</span>'+
                  '</li>'+

                  '<li>'+
                      '<a href="./purchaseddetail?courseid='+value.serviceId+'&contactid='+contact_id+'"><button type="button" class="btn btn-primary" style="font-size:14px !important;">Read More</button></a>'+
                  '</li>'+
              '</ul>'+
              '</div>'+
            '</div>'+
          '</div>'+
        '</div>';
                 
                 
                 });

              html+='</div>';
                 
                  var totalrecord = res.result.databaseRecords;
                  var total_page = Math.ceil(totalrecord/3);
                 
                 
            pagination+= '<div class="pagination-wrapper container">'+
                        '<ul class="paging-row">';
            var prev='';
            
            if(parseInt(res.page)==1){ var dis = 'disabled'; var prev='1';} else { var dis=''; var prev = parseInt(res.page)-1;}
                
        if(parseInt(res.page)==1){
        pagination+=    '<li style="text-align: right;">'+
                            '<button class="btn pagination-button '+dis+'"><a  class="button" style="font-size:12px;">Previous</a></button>'+
                    '</li>';
                }
                else {
                    pagination+=    '<li style="text-align: right;">'+
                            '<button class="btn pagination-button '+dis+'"><a onclick = courselistPage("'+prev+'"); class="button" style="font-size:12px;">Previous</a></button>'+
                    '</li>';
                }
            
        pagination+= '<li style="text-align: center;">'+
                    '<ul class="pagination">';
                   for (i = 1; i <= total_page; i++) {
                           if(res.page==i){ var pageactive= 'active'; } else { var pageactive=''; }
                    pagination+='<li class="'+pageactive+'" style="cursor: pointer;"><a onclick = myCoursePage("'+i+'");>'+i+'</a></li>';
                         }
        pagination+=   '</ul>'+
                    '</li>';
                 if(parseInt(res.page)!=parseInt(total_page)) { var next = parseInt(res.page)+1; var next_dis = ''; } else { var next_dis='disabled'; var next = parseInt(total_page);}
                     
                    
        if(parseInt(res.page)==parseInt(total_page)) {
                     pagination+=    '<li style="text-align: right;">'+
                            '<button class="btn pagination-button '+next_dis+'"><a class="button" style="font-size:12px;">Next</a></button>'+
                    '</li>';
                 } else {
        pagination+=    '<li style="text-align: right;">'+
                            '<button class="btn pagination-button '+next_dis+'"><a onclick = courselistPage("'+next+'"); class="button" style="font-size:12px;">Next</a></button>'+
                    '</li>';
                 }
                
               
        pagination+= '</ul>'+
                    '</div>';
              
              $("#myCourseData").html(html);
                 $('#pagination').html(pagination);
                }
        }
          
        });
}

