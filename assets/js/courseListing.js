$(document).ready(function(){
  courseList();
});


/*Apoorv start*/
/*Apoorv end*/
// course listing  

function courseList(){

    $('.register_outer').addClass('show');
    $(".register_loader").addClass('show');
 
  var html="";
  var pagination="";
  $.ajax({
  url: './courseList',
  method: 'post',
  success: function(response) {
   
      var res = JSON.parse(response);
       console.log(res.result);
      // return false;
            if (res.st === parseInt(1)) {
            $('.register_outer').removeClass('show');
            $(".register_loader").removeClass('show');

             html+='<div class="row">';
                $(res.result.services).each(function(key,value){
                    //console.log(key);
                var title_length = value.serviceName.length;
                if(title_length < 55){
                    title = '<a href="./coursedetail/'+value.serviceId+'" style="color:black;text-decoration:none;"><h5 class="font-weight-medium">'+value.serviceName+'</h5></a>';
                } else {
                    title = '<a href="./coursedetail/'+value.serviceId+'" style="color:black;text-decoration:none;"><h5 class="font-weight-medium">'+value.serviceName.substring(0,55)+'...</h5></a>';
                }
                var desc_length = value.shortDesciption.length;
                if(desc_length < 200){
                    des_str = '<p class="p-0 m-0">'+value.shortDesciption+'</p>';
                } else {
                    des_str = '<p class="p-0 m-0">'+value.shortDesciption.substring(0,200)+'...</p>';
                }
                
                var des_strr =$(des_str).text()
                 
                 html  +=       ' <div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-3">'+
                               '<div class=" ">'+
                               '<div class="imageCon">'+
                               '<a href="./coursedetail/'+value.serviceId+'" ><img src="'+value.imageUrl+'" class="w-100" alt="course3"/></a>'+
                              '</div>'+
                              '<div class="course_box" style="min-height:250px;">'+
                                '<div class="details">'+
                                    title+
                                  //'<a href="./coursedetail/'+value.serviceId+'" style="color:black;text-decoration:none;"><h5 class="font-weight-light">'+title+'...</h5></a>'+
                                    // des_str+
                                  '<p class="p-0 m-0">'+des_strr+'...</p>'+
                                  '<ul class="course-meta desc">'+
                                      '<li>';
                        if(parseInt(value.serviceChapter)==parseInt(1)) { var chap_label = 'Chapters'; } else { var chap_label = 'Chapters';}
                        if(value.serviceChapter==null || value.serviceChapter==parseInt(0)) { var no_label = 'N/A'; } else { var no_label = value.serviceChapter;}
                         html +=        '<h6><b>'+chap_label+'</b></h6>'+
                                          
                                          '<span><b>'+no_label+'</b></span>'+
                                      '</li>'+
                                      '<li>'+
                                          '<h6><b>Duration</b></h6>'+
                                          '<span><b>'+value.courseDuration+'</b></span>'+
                                      '</li>'+
                    
                                      '<li>'+
                                          '<a href="./coursedetail/'+value.serviceId+'"><button type="button" class="btn btn-primary" style="font-size:12px !important;">Read More</button></a>'+
                                      '</li>'+
                                  '</ul>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>';
                 
                 
                 });
                 var totalrecord = res.result.databaseRecords;
                  var total_page = Math.ceil(totalrecord/3);
            pagination+= '<div class="pagination-wrapper container">'+
                        '<ul class="paging-row">';
              pagination+=    '<li style="text-align: right;">'+
                            '<button class="btn pagination-button disabled"><a class="button" style="font-size:12px;">Previous</a></button>'+
                    '</li>';
                    
             pagination+= '<li style="text-align: center;">'+
                    '<ul class="pagination">';
                    for (i = 1; i <=total_page; i++) {
                       if(i==1){ var pageactive= 'active'; } else { var pageactive=''; }
                       //console.log(pageactive);
                    pagination+='<li class="'+pageactive+'" style="cursor: pointer;"><a onclick = courselistPage("'+i+'");>'+i+'</a></li>';
                             
                         }
                 pagination+= '</ul>'+
                    '</li>';
                    if(parseInt(total_page)!=1) { var ne= ''; var no = 2;} else { var ne='disabled'; var no = '1';}
                  pagination+=  '<li>'+
                            '<button class="btn pagination-button '+ne+'"><a onclick = courselistPage("'+no+'"); class="button" style="font-size:12px;">Next</a></button>'+
                    '</li>'+
                    '</ul>'+
                    '</div>';
              
               
               $("#courseListData").html(html);
                 $('#pagination').html(pagination);
            }
          }
        });
}

    
    function courselistPage(page){
    //alert(page);
    $('.register_outer').addClass('show');
    $(".register_loader").addClass('show');
 
  var html="";
  var pagination="";
  var prev="";
  var next ="";
  
  $.ajax({
  url: './courseList/'+page,
  method: 'post',
  success: function(response) {
   var res = JSON.parse(response);
   
    if (res.st === parseInt(1)) {
            $('.register_outer').removeClass('show');
            $(".register_loader").removeClass('show');

             html+='<div class="row">';
                $(res.result.services).each(function(key,value){
                    //console.log(key);
               if(value.serviceName!=null){
                var title_length = value.serviceName.length;
                if(title_length < 55){
                    title = '<a href="./coursedetail/'+value.serviceId+'" style="color:black;text-decoration:none;"><h5 class="font-weight-medium">'+value.serviceName+'</h5></a>';
                } } else {
                    title = '<a href="./coursedetail/'+value.serviceId+'" style="color:black;text-decoration:none;"><h5 class="font-weight-medium">'+value.serviceName.substring(0,55)+'...</h5></a>';
                }
                 if(value.shortDesciption!=null){
                var desc_length = value.shortDesciption.length;
                if(desc_length < 200){
                    des_str = '<p class="p-0 m-0">'+value.shortDesciption+'</p>';
                } } else { if(value.shortDesciption!=null){
                    des_str = '<p class="p-0 m-0">'+value.shortDesciption.substring(0,55)+'...</p>';
                }
                    
                }
                var des_strr =$(des_str).text();
                 
                 html  +=       ' <div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-3">'+
                               '<div class=" ">'+
                               '<div class="imageCon">'+
                               '<a href="./coursedetail/'+value.serviceId+'" ><img src="'+value.imageUrl+'" class="w-100" alt="course3"/></a>'+
                              '</div>'+
                              '<div class="course_box" style="min-height:250px;">'+
                                '<div class="details">'+
                                    title+
                                  //'<a href="./coursedetail/'+value.serviceId+'" style="color:black;text-decoration:none;"><h5 class="font-weight-light">'+title+'...</h5></a>'+
                                    // des_str+
                                  '<p class="p-0 m-0" style="font-size:15px;">'+des_strr+'...</p>'+
                                  '<ul class="course-meta desc">';
                                  if(parseInt(value.serviceChapter)==parseInt(1)) { var chap_label = 'Chapters'; } else { var chap_label = 'Chapters';}
                        if(value.serviceChapter==null || value.serviceChapter==parseInt(0)) { var no_label = 'N/A';  } else { var no_label = value.serviceChapter;}
                         html +=        '<li>'+
                                        '<h6><b>'+chap_label+'</b></h6>'+
                                          '<span><b>'+no_label+'</b></span>'+
                                      '</li>'+
                                      '<li>'+
                                          '<h6><b>Duration</b></h6>'+
                                          '<span><b>'+value.courseDuration+'</b></span>'+
                                      '</li>'+
                    
                                      '<li>'+
                                          '<a href="./coursedetail/'+value.serviceId+'"><button type="button" class="btn btn-primary" style="font-size:12px !important;">Read More</button></a>'+
                                      '</li>'+
                                  '</ul>'+
                                '</div>'+
                              '</div>'+
                            '</div>'+
                          '</div>';
                 
                 
                 });
                 
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
                    pagination+='<li class="'+pageactive+'" style="cursor: pointer;"><a onclick = courselistPage("'+i+'");>'+i+'</a></li>';
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
              
               $("#courseListData").html(html);
                 $('#pagination').html(pagination);
                }
        }
          
        });
}

   function module(module_id,course_id,video_link){
       //var id = "#status_"+module_id;
        
       var checkbox = document.getElementById('status_'+module_id).checked;
       
       if (checkbox == true) {
           var status = 1;
       } else if (checkbox == false) {
           var status =0;
       }
    $.ajax({
  url: './coursemodule',
  method: 'post',
 data: "module_id="+module_id+"&course_id="+course_id+"&status="+status, 
  success: function(response) {
      var res = JSON.parse(response);
      if (res.st === parseInt(1)) {
          swal("Status Updated", "", "success");
          return false;
      }
    }
        });
    }

