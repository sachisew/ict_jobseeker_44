
let data={
    'Job_ID':0
};
function loadmore() {
  
    var more_jobs = document.getElementById("more");
    var more_btn1 = document.getElementById("more1");//button
    var btnText = document.getElementById("loadmore_btn");
    btnText.style.display="none";
    more_jobs.style.display="inline";
    //more_btn1.style.display="inline-block";
  
  }
  /*after click on the job detail box for view more details about job*/
  function jobView(Job_ID)
  {

   data['Job_ID']=Job_ID;
    $.post("http://localhost/ict_jobseeker_44/Jobs/View_job/view_clicked_job",
   data,
    function(data,status){
   
    });
   //after load data from database then load a view job page
    window.open("http://localhost/ict_jobseeker_44/Jobs/View_job/View_jobjs/"+Job_ID,"_self");




   }
   //view relevent job after click job main page box
   function  viewJob(data){

    
  
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/ict_jobseeker_44/Jobs/View_job/view_clicked_job2/"+data);
    
    xhr.onload = function () {
        let job_detail_sub_container = document.querySelector(".job_detail_sub_container");
    
       s = JSON.parse(this.response);
    console.log(s)
    
     job_detail_sub_container.innerHTML = "";

    
        
         job_detail_sub_container.innerHTML += `  
          
         <div class="job_detail_left">
         <div class="job_detail_title_and_apply_button">
             <div class="job_detail_title_and_company">
                 <div class="job_detail_title">
                   ${s.Job_title} 
                 </div>
                 <div class="company">
                 ${s.Company_name}
                 </div>
                 <div class="social_media_icons">
                   <a href="${s.Company_facebook}">   <i  class="fab fa-facebook-square"></i></a> 
                   <a href="${s.Company_LinkedIn}">   <i  class="fab fa-linkedin"></i></a>
                     <a  href="${s.Company_twitter}"><i  class="fab fa-twitter-square"></i></a>
                 </div>
                 
 
             </div>
             

             <a>
             
            <button  onclick="load_job(${s.Job_ID})" >Apply Now</button>
            </a>
            
 
         </div>
         <div class="job_description_title">
             Job Description
         </div>
 
         <div class="job_description_text">
         ${s.Job_description}
 
         </div>
         
         
         
         
     </div>
     <div class="job_detail_right">
         <div class="company_details">

       ${parseInt(s['Job_provide_mock_interviews']) ?
         `<div class="mock_interview">
         We would like to supply mock interviews 
         </div>`
         :''}
         
            <p>
                Click here to veiw company details</p> 
            <button id="clickme" type="button" onclick="functionViewCompany(${s.User_ID})"> Click Here</button>
         </div>
         <div class="job_overview">
             <div class="job_overview_text">
                 Job overview
             </div>
             <div class="application_deadline">
                 <div class="application_deadline_text">
                     Application deadline :
                 </div>
                 <div class="application_deadline_date">
                 ${s.Job_deadline}
                 </div>
                
             </div>
            <!--  <div class="salary">
                     <div class="salary_text">
                         Salary(LKR) :
                     </div>
                     <div class="salary_number">
                        25 000-30 000
                     </div>
             </div> -->
             <div class="Job_Type">
                  <div class="Job_Type_text">
                     Job Type :
                  </div>
                  <div class="Job_Type_answer">
                  ${s.Job_type}
                  </div>
             </div>
             <!-- <div class="year_of_experience">
                 <div class="year_of_experience_text">
                     Year Of Experience :
                 </div>
                 <div class="year_of_experience_answer">
                     2 Years
                 </div>
            </div> -->
            <div class="phone_number">
             <div class="phone_number_text">
                 Phone number :
             </div>
             <div class="phone_number_answer">
             ${s.Job_phone_no}
             </div>
        </div>
        <div class="Email">
         <div class="Email_text">
                E-mail :
         </div>
         <div class="Email_answer">
         ${s.Email}
         </div>
    </div>
 
         </div>
         
     </div>
          
         `;
        
    };
    xhr.send();
  
    return false;

    }
 


  /*load  jobs*/
/* function jobLoad() {

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/ict_jobseeker_44/Jobs_main_page/select_job_data");
    
    xhr.onload = function () {
      const features_job = document.querySelector(".features_job");
     
      search = JSON.parse(this.response);
      
    console.log(search)
    
     features_job.innerHTML = ``;

      if (search!==null) {
       
        for (var s of search) {
      
         features_job.innerHTML += `  
         <div class="features_job_row" onclick="jobView( ${s.Job_ID})">
         <div class="features_job_row_picture">
             <img src='<?php echo URL ?>views/images/Jobs_main_page/3.JFIF'>


         </div>
         <div class="features_job_row_job_and_company">
             <div class="features_job_row_job">
             ${s.Job_title}


             </div>
             <div class="features_job_row__company">
             ${s.Company_name}
             </div>
         </div>
         <div class="features_job_row_location">

             <i class="fas fa-map-marker-alt"></i>

             <div class="features_job_row_location_name">
             ${s.Job_city}
             </div>
         </div>
         <div class="features_job_row_job_type">
             <i class="fas fa-clock"></i>
             <div class="features_job_row_job_type_name">
             ${s.Job_type}
             </div>
         </div>

         
            

                 <div class="features_job_row_deadline_date_container">
                     <div>Expires on </div>
                     <div class="features_job_row_deadline_date">
                     ${s.Job_deadline}
                     </div>
                 </div>



       

     </div>
          
         `;
        }
      } else {
                      
      }
    };
    xhr.send();
    return false;

  }
 */
//load job according to search
function ajaxload(query = '', page_number = 1) {
  
if(query != '' ){
   document.getElementById("top_trending_categories_container").style.height='0';
   document.getElementById("top_trending_categories_container").style.visibility = "hidden";
   document.getElementById("top_trending_categories_title").style.visibility = "hidden";
   document.getElementById("features_job").style.marginTop = "0";

}
    //pass the page number and search query
    const form_data = new FormData();
    form_data.append('query', query);
    form_data.append('page', page_number);
    const urlparam = new URLSearchParams(form_data);


    //initialize connection
    const xhr = new XMLHttpRequest();
    
    //establish connection
    xhr.open("POST", "http://localhost/ict_jobseeker_44/Jobs_main_page/search_job");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")

    let features_job1 = document.querySelector(".features_job");
    xhr.onload = function () {

        if (xhr.status == 200) {
            const job_data1 = xhr.responseText; //ajax response data
           
          const job_data2 = JSON.parse(job_data1); //convert the response data to js object
          let  search = JSON.parse(job_data2.data); //convert the data array into js object
         let  category = JSON.parse(job_data2.category); //convert the category array into js object
          //search = JSON.parse(this.response);
          console.log(category );

         let top_trending_categories_container = document.querySelector(".top_trending_categories_container");

         top_trending_categories_container.innerHTML= `
         ${(query == '' ) ?

`<div class="top_trending_categories_box_row">

<div class="top_trending_categories_box" title= "click to browse job by category"><a href="javascript:ajaxload('${category[0][0]}');">${category[0][0]}</a></div>


<div class="top_trending_categories_box" title= "click to browse job by category"><a href="javascript:ajaxload('${category[1][0]}');">${category[1][0]}</a></div>


<div class="top_trending_categories_box" title= "click to browse job by category"><a href="javascript:ajaxload('${category[2][0]}');">${category[2][0]}</a></div>




</div>
<!-- <div class="top_trending_categories_box_arrows">
<i class="fa fa-chevron-left" ></i>
<i class="fa fa-chevron-right" ></i>
</div> -->

<div class="top_trending_categories_box_row">

<div class="top_trending_categories_box" title= "click to browse job by category"><a href="javascript:ajaxload('${category[3][0]}');">${category[3][0]}</a></div>


<div class="top_trending_categories_box" title= "click to browse job by category"><a href="javascript:ajaxload('${category[4][0]}');">${category[4][0]}</a></div>


<div class="top_trending_categories_box" title= "click to browse job by category"><a href="javascript:ajaxload('${category[5][0]}');">${category[5][0]}</a></div>


</div>`

         
         :""}
         
         
`
          features_job1.innerHTML = ``;
               
                if(search != null) {
       
                    for (var s of search) {
                  
                     features_job1.innerHTML += ` 
                      
                     <div class="features_job_row" onclick="jobView( ${s.Job_ID})">
                     
                     <div class="features_job_row_job_and_company">
                         <div class="features_job_row_job">
                         ${s.Job_title}
            
            
                         </div>
                         <div class="features_job_row__company">
                         ${s.Company_name}
                         </div>
                     </div>
                     <div class="features_job_row_location">
            
                         <i class="fas fa-map-marker-alt"></i>
            
                         <div class="features_job_row_location_name">
                         ${s.Job_city}
                         </div>
                     </div>
                     <div class="features_job_row_job_type">
                         <i class="fas fa-clock"></i>
                         <div class="features_job_row_job_type_name">
                         ${s.Job_type}
                         </div>
                     </div>
            
                     
                        
            
                             <div class="features_job_row_deadline_date_container">
                                 <div>Expires on </div>
                                 <div class="features_job_row_deadline_date">
                                 ${s.Job_deadline}
                                 </div>
                             </div>
            
            
            
                   
            
                 </div>
                      
                     `;
                    }
                  } else {
                                  
                  }


              //  document.getElementById("features_job").innerHTML = features_job1;
                document.getElementById("pagination-link").innerHTML = job_data2.pagination;
                document.getElementById("total-data").innerHTML = job_data2.total_data;
                // document.getElementById("page_no").innerHTML = job_data2.page_no;

            }


        }
        for (var pair of form_data.entries()) {
            console.log(pair);
        }
        xhr.send(urlparam);
    }



ajaxload();
//load job according to search
function ajaxload1(query1 = '',query2 = '', page_number = 1) {
  
    
    query1=document.getElementById("category").value;
    query2=document.getElementById("location").value;
      
    
    
        //pass the page number and search query
       /* const form_data1 = new FormData();
        form_data1.append('query1', query1);
        form_data1.append('page', page_number);
        const urlparam1 = new URLSearchParams(form_data1);*/

         //pass the page number and search query
        /* const form_data2 = new FormData();
         form_data2.append('query2', query2);
         form_data2.append('page', page_number);
         const urlparam2 = new URLSearchParams(form_data2);*/
    
    
        //initialize connection
        const xhr = new XMLHttpRequest();
        
        //establish connection
        xhr.open("POST", "http://localhost/ict_jobseeker_44/Jobs_main_page/search_job_union/"+query1+"/"+query2);
       // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
    
        let features_job1 = document.querySelector(".features_job");
        xhr.onload = function () {
    
            if (xhr.status == 200) {
                const job_data1 = xhr.responseText; //ajax response data
               
              const job_data2 = JSON.parse(job_data1); //convert the response data to js object
              let  search = JSON.parse(job_data2.data); //convert the data array into js object
            
              console.log(search );
    
              features_job1.innerHTML = ``;
                   
                    if(search != null) {
           
                        for (var s of search) {
                      
                         features_job1.innerHTML += ` 
                          
                         <div class="features_job_row" onclick="jobView( ${s.Job_ID})">
                         <div class="features_job_row_picture">
                             <img src='<?php echo URL ?>views/images/Jobs_main_page/3.JFIF'>
                
                
                         </div>
                         <div class="features_job_row_job_and_company">
                             <div class="features_job_row_job">
                             ${s.Job_title}
                
                
                             </div>
                             <div class="features_job_row__company">
                             ${s.Company_name}
                             </div>
                         </div>
                         <div class="features_job_row_location">
                
                             <i class="fas fa-map-marker-alt"></i>
                
                             <div class="features_job_row_location_name">
                             ${s.Job_city}
                             </div>
                         </div>
                         <div class="features_job_row_job_type">
                             <i class="fas fa-clock"></i>
                             <div class="features_job_row_job_type_name">
                             ${s.Job_type}
                             </div>
                         </div>
                
                         
                            
                
                                 <div class="features_job_row_deadline_date_container">
                                     <div>Expires on </div>
                                     <div class="features_job_row_deadline_date">
                                     ${s.Job_deadline}
                                     </div>
                                 </div>
                
                
                
                       
                
                     </div>
                          
                         `;
                        }
                      } else {
                                      
                      }
    
    
                  //  document.getElementById("features_job").innerHTML = features_job1;
                    document.getElementById("pagination-link").innerHTML = job_data2.pagination;
                    document.getElementById("total-data").innerHTML = job_data2.total_data;
                    // document.getElementById("page_no").innerHTML = job_data2.page_no;
    
                }
    
    
            }
           
            xhr.send();
        }
    
function load_job(data){
    
    location.href="http://localhost/ict_jobseeker_44/Jobseeker/ApplyJobs/ApplyJobs1/"+data;
}


























