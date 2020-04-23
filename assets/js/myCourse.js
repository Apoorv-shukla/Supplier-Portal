
$(document).ready(function(){
    myCourse();
});

function myCourse(){
    $('.myCourse_outer').addClass('show');
    $(".myCourse_loader").addClass('show');
        
    var contact_id = $('#contact_id').val();
        
    var html="";
    var pagination="";
  $.ajax({
  url: './loadCourses',
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
                
                 var des_strr =$(des_str).text();
                 html  +=       ' <div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-3">'+
                               '<div class=" ">'+
                               '<div class="imageCon">'+
                               '<a href="./purchaseddetail?courseid='+value.serviceId+'&contactid='+contact_id+'" ><img src="'+value.imageUrl+'" class="w-100" alt="course3"/></a>'+
                              '</div>'+
            '<div class="course_box" style="min-height:250px;">'+
              '<div class="details">'+
                title+
                //'<a href="./coursedetail/'+value.serviceId+'" style="color:black;text-decoration:none;"><h5 class="font-weight-light">'+title+'</h5></a>'+
               '<p class="p-0 m-0" style="font-size:15px;">'+des_strr+'...</p>'+
                '<ul class="course-meta desc">'+
                  '<li>'+
                      '<h6><b>Chapters</b></h6>';
                      if(value.serviceChapter==null || value.serviceChapter==parseInt(0)) { var no_label = 'N/A';  } else { var no_label = value.serviceChapter;}
                html  += '<span><b>'+no_label+'</b></span>'+
                  '</li>'+
                  '<li>'+
                      '<h6><b>Duration</b></h6>'+
                      '<span><b>'+value.courseDuration+'</b></span>'+
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
                 
                  var des_strr =$(des_str).text();
                
                 html  +=       ' <div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-3">'+
                               '<div class=" ">'+
                               '<div class="imageCon">'+
                               '<a href="./purchaseddetail?courseid='+value.serviceId+'&contactid='+contact_id+'" ><img src="'+value.imageUrl+'" class="w-100" alt="course3"/></a>'+
                              '</div>'+
            '<div class="course_box" style="min-height:250px;">'+
              '<div class="details">'+
                title+
                //'<a href="./coursedetail/'+value.serviceId+'" style="color:black;text-decoration:none;"><h5 class="font-weight-light">'+title+'</h5></a>'+
               '<p class="p-0 m-0" style="font-size:15px;">'+des_strr+'...</p>'+
                '<ul class="course-meta desc">'+
                  '<li>'+
                      '<h6><b>Chapters</b></h6>';
                      if(value.serviceChapter==null || value.serviceChapter==parseInt(0)) { var no_label = 'N/A';  } else { var no_label = value.serviceChapter;}
          html  += '<span><b>'+no_label+'</b></span>'+
                  '</li>'+
                  '<li>'+
                      '<h6><b>Duration</b></h6>'+
                      '<span><b>'+value.courseDuration+'</b></span>'+
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

