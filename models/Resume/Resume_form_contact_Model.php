<?php

class Resume_form_contact_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function Resume_form_data_m($mainObj){

        $jobseekerID = null;
        $resumeType = 1;
        $firstName = $mainObj->firstName;
        $lastName = $mainObj->lastName;
        $email = $mainObj->email;
        $phoneNumber = $mainObj->phoneNumber;
        $address = $mainObj->address;
        $city = $mainObj->city;
        $about = $mainObj->about;
        $experience_id = $mainObj->experience_id;
        $experience = $mainObj->experience;
        $education_id = $mainObj->education_id;
        $education = $mainObj->education;
        $skills = $mainObj->skills;
        $project_id = $mainObj->project_id;
        $project = $mainObj->project;
        $workHere = 0;
        $studyHere = 0;
        $fromDate = '2021-01-02';
        $toDate = '2021-01-02';





        $sql1 = "INSERT INTO `resume`(`Resume_type`, `First_name`, `Last_name`, `Address`, `Email`, `Phone_no`, `City`, `About you`,`Skills`, `Jobseeker_ID`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement1 = $this->db->prepare($sql1);
        $statement1->execute([$resumeType, $firstName, $lastName, $address, $email, $phoneNumber, $city, $about, $skills, $jobseekerID]);

        $sql_resume_id = $this->db->lastInsertId();

//       experience arrays
        $experience1 = array('id_experience' => $experience[0]->id_experience, 'jobTitle' => $experience[0]->jobTitle, 'employer' => $experience[0]->employer, 'city' => $experience[0]->city, 'country' => $experience[0]->country, 'experienceDetails' => $experience[0]->experienceDetails, 'from_experience' => $experience[0]->from_experience, 'to_experience' => $experience[0]->to_experience, 'workHere' => 'no', 'Resume_ID' => $sql_resume_id );
        $experience2 = array('id_experience' => $experience[1]->id_experience, 'jobTitle' => $experience[1]->jobTitle, 'employer' => $experience[1]->employer, 'city' => $experience[1]->city, 'country' => $experience[1]->country, 'experienceDetails' => $experience[1]->experienceDetails, 'from_experience' => $experience[1]->from_experience, 'to_experience' => $experience[1]->to_experience, 'workHere' => 'no', 'Resume_ID' => $sql_resume_id );
        $experience3 = array('id_experience' => $experience[2]->id_experience, 'jobTitle' => $experience[2]->jobTitle, 'employer' => $experience[2]->employer, 'city' => $experience[2]->city, 'country' => $experience[2]->country, 'experienceDetails' => $experience[2]->experienceDetails, 'from_experience' => $experience[2]->from_experience, 'to_experience' => $experience[2]->to_experience, 'workHere' => 'no', 'Resume_ID' => $sql_resume_id );

        $education1 = array('id_education' => $education[0]->id_education, 'institute' => $education[0]->institute, 'degree' => $education[0]->degree, 'city' => $education[0]->city, 'country' => $education[0]->country, 'from_education' => $education[0]->from_education, 'to_education' => $education[0]->to_education, 'studyHere' => 'no', 'Resume_ID' => $sql_resume_id);
        $education2 = array('id_education' => $education[1]->id_education, 'institute' => $education[1]->institute, 'degree' => $education[1]->degree, 'city' => $education[1]->city, 'country' => $education[1]->country, 'from_education' => $education[1]->from_education, 'to_education' => $education[1]->to_education, 'studyHere' => 'no', 'Resume_ID' => $sql_resume_id);
        $education3 = array('id_education' => $education[2]->id_education, 'institute' => $education[2]->institute, 'degree' => $education[2]->degree, 'city' => $education[2]->city, 'country' => $education[2]->country, 'from_education' => $education[2]->from_education, 'to_education' => $education[2]->to_education, 'studyHere' => 'no', 'Resume_ID' => $sql_resume_id);


        $project1 = array('id_project' => $project[0]->id_project, 'projectTitle' => $project[0]->projectTitle, 'projectDetails' => $project[0]->projectDetails, 'Resume_ID' => $sql_resume_id);
        $project2 = array('id_project' => $project[1]->id_project, 'projectTitle' => $project[1]->projectTitle, 'projectDetails' => $project[1]->projectDetails, 'Resume_ID' => $sql_resume_id);
        $project3 = array('id_project' => $project[2]->id_project, 'projectTitle' => $project[2]->projectTitle, 'projectDetails' => $project[2]->projectDetails, 'Resume_ID' => $sql_resume_id);


//        return $experience1;

//        query for experience table
        $sql2 = "INSERT INTO `resume_experience`(`Resume_experience_ID`, `Job_title`, `Employer`, `City`, `Country`, `What_did_you_do_in_this_job`, `From`, `To`, `I_currently_working_here`, `Resume_ID`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

//        $sqlsample = "INSERT INTO `resume_experience`(`Resume_experience_ID`, `Job_title`, `Employer`, `City`, `Country`, `What_did_you_do_in_this_job`, `From`, `To`, `I_currently_working_here`, `Resume_ID`) VALUES (".$experience[0]->id_experience.", ".$experience[0]->jobTitle.", ".$experience[0]->employer.", ".$experience[0]->city.", ".$experience[0]->country.", ".$experience[0]->experienceDetails.", ".$experience[0]->from_experience.", ".$experience[0]->to_experience.", ".'no'.", ".$sql_resume_id.")";
        $statement2a = $this->db->prepare($sql2);
        $statement2a->execute([$experience[0]->id_experience, $experience[0]->jobTitle, $experience[0]->employer, $experience[0]->city, $experience[0]->country, $experience[0]->experienceDetails, $fromDate, $toDate, $workHere, $sql_resume_id]);
//            return $sqlsample;
////        experience 2
        $statement2b = $this->db->prepare($sql2);
        $statement2b->execute([$experience[1]->id_experience, $experience[1]->jobTitle, $experience[1]->employer, $experience[1]->city, $experience[1]->country, $experience[1]->experienceDetails, $fromDate, $toDate, $workHere, $sql_resume_id ]);

//        experience 3
        $statement2c = $this->db->prepare($sql2);
        $statement2c->execute([$experience[2]->id_experience, $experience[2]->jobTitle, $experience[2]->employer, $experience[2]->city, $experience[2]->country, $experience[2]->experienceDetails, $fromDate, $toDate, $workHere, $sql_resume_id ]);


//        query for education table
        $sql3 = "INSERT INTO `resume_education`(`Resume_education_ID`, `Institute`, `Degree`, `City`, `Country`, `From`, `To`, `I_currently_study_here`, `Resume_ID`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? )";
        $statement3a = $this->db->prepare($sql3);
        $statement3a->execute([$education[0]->id_education, $education[0]->institute, $education[0]->degree, $education[0]->city, $education[0]->country, $fromDate, $toDate, $studyHere, $sql_resume_id]);

//        education 2
        $statement3b = $this->db->prepare($sql3);
        $statement3b->execute([$education[1]->id_education, $education[1]->institute, $education[1]->degree, $education[1]->city, $education[1]->country, $fromDate, $toDate, $studyHere, $sql_resume_id]);

//        education 3
        $statement3c = $this->db->prepare($sql3);
        $statement3c->execute([$education[2]->id_education, $education[2]->institute, $education[2]->degree, $education[2]->city, $education[2]->country, $fromDate, $toDate, $studyHere, $sql_resume_id]);


//        query for project
        $sql5 = "INSERT INTO `resume_project`(`Resume_project_ID`, `Project_title`, `Description`, `Resume_ID`) VALUES (?, ?, ?, ?)";
        $statement5a = $this->db->prepare($sql5);
        $statement5a->execute([$project[0]->id_project, $project[0]->projectTitle, $project[0]->projectDetails, $sql_resume_id]);

//        project 2
        $statement5b = $this->db->prepare($sql5);
        $statement5b->execute([$project[1]->id_project, $project[1]->projectTitle, $project[1]->projectDetails, $sql_resume_id]);

//        project 3
        $statement5c = $this->db->prepare($sql5);
        $statement5c->execute([$project[2]->id_project, $project[2]->projectTitle, $project[2]->projectDetails, $sql_resume_id]);

    }

    function Resume_form_data_m_update($mainObj){

        $jobseekerID = 147;
        $resumeType = 1;
        $firstName = $mainObj->firstName;
        $lastName = $mainObj->lastName;
        $email = $mainObj->email;
        $phoneNumber = $mainObj->phoneNumber;
        $address = $mainObj->address;
        $city = $mainObj->city;
        $about = $mainObj->about;
        $experience_id = $mainObj->experience_id;
        $experience = $mainObj->experience;
        $education_id = $mainObj->education_id;
        $education = $mainObj->education;
        $skills = $mainObj->skills;
        $project_id = $mainObj->project_id;
        $project = $mainObj->project;
        $workHere = 0;
        $studyHere = 0;
        $fromDate = '2021-01-02';
        $toDate = '2021-01-02';



//        to get the resume ID
        $sql_resume_ID_query = "SELECT Resume_ID FROM `resume` WHERE Jobseeker_ID = 147;";

        $sql_resume_ID = $this->db->runQuery("$sql_resume_ID_query");



      $sql_main= " UPDATE
    `resume`, `resume_experience`, `resume_education`, `resume_project`
SET";

// to update resume data
    $sql_resume = "'Resume_type` = '".$resumeType."',
    `First_name` = '".$firstName."',
    `Last_name` = '".$lastName."',
    `Address` = '".$email."',
    `Email` = '".$phoneNumber."',
    `Phone_no` = '".$address."',
    `City` = '".$city."',
    `About you` = '".$about."',
    `Skills` = '".$skills."',
    WHERE Resume_ID = ".$sql_resume_ID;

    $sql_resume_update = "UPDATE `resume` SET ".$sql_resume." WHERE Resume_ID = ".$sql_resume_ID;

    $resume_update_response = $this->db->runQuery($sql_resume_update);

// to update experience data

//        experience 1
   $sql_experience2a = "
    `Job_title` = '".$experience[0]->jobTitle."',
    `Employer` = '".$experience[0]->employer."',
    `City` = '".$experience[0]->city."',
    `Country` = '".$experience[0]->country."',
    `What_did_you_do_in_this_job` = '".$experience[0]->experienceDetails."',
    `From` = '".$experience[0]->from_experience."',
    `To` = '".$experience[0]->to_experience."',
    `I_currently_working_here` = '".$workHere."'";

$sql_experience2a_update = "UPDATE `resume_experience` SET ".$sql_experience2a." WHERE Resume_ID = '".$sql_resume_ID."' AND Resume_experience_ID ='2a'";

        $experience2a_update_response = $this->db->runQuery($sql_experience2a_update);

//experience 2
        $sql_experience2b = "
    `Job_title` = '".$experience[1]->jobTitle."',
    `Employer` = '".$experience[1]->employer."',
    `City` = '".$experience[1]->city."',
    `Country` = '".$experience[1]->country."',
    `What_did_you_do_in_this_job` = '".$experience[1]->experienceDetails."',
    `From` = '".$experience[1]->from_experience."',
    `To` = '".$experience[1]->to_experience."',
    `I_currently_working_here` = '".$workHere."'";

        $sql_experience2b_update = "UPDATE `resume_experience` SET ".$sql_experience2b." WHERE Resume_ID = '".$sql_resume_ID."' AND Resume_education_ID ='2b'";

        $experience2b_update_response = $this->db->runQuery($sql_experience2b_update);

//        experience 3
        $sql_experience2c = "
    `Job_title` = '".$experience[2]->jobTitle."',
    `Employer` = '".$experience[2]->employer."',
    `City` = '".$experience[2]->city."',
    `Country` = '".$experience[2]->country."',
    `What_did_you_do_in_this_job` = '".$experience[2]->experienceDetails."',
    `From` = '".$experience[2]->from_experience."',
    `To` = '".$experience[2]->to_experience."',
    `I_currently_working_here` = '".$workHere."'";

        $sql_experience2c_update = "UPDATE `resume_experience` SET ".$sql_experience2c." WHERE Resume_ID = '".$sql_resume_ID."' AND Resume_education_ID='2c'";

        $experience2c_update_response = $this->db->runQuery($sql_experience2c_update);

//      education 1
        $sql_education3a = "`Institute` = '".$education[0]->institute."',
    `Degree` = '".$education[0]->degree."',
    `City` = '".$education[0]->city."',
    `Country` = '".$education[0]->country."',
    `From` = '".$education[0]->from_education."',
    `To` = '".$education[0]->to_education."',
    `I_currently_study_here` = '".$studyHere."'";

        $sql_education3a_update = "UPDATE `resume_education` SET ".$sql_education3a." WHERE Resume_ID = '".$sql_resume_ID."' AND `Resume_education_ID`='3a'";

        $education3a_update_response = $this->db->runQuery($sql_education3a_update);

//      education 2
        $sql_education3b = "`Institute` = '".$education[1]->institute."',
    `Degree` = '".$education[1]->degree."',
    `City` = '".$education[1]->city."',
    `Country` = '".$education[1]->country."',
    `From` = '".$education[1]->from_education."',
    `To` = '".$education[1]->to_education."',
    `I_currently_study_here` = '".$studyHere."'";


        $sql_education3b_update = "UPDATE `resume_education` SET ".$sql_education3b." WHERE Resume_ID = '".$sql_resume_ID."' AND `Resume_education_ID`='3b'";

        $education3b_update_response = $this->db->runQuery($sql_education3b_update);

//        education 3
        $sql_education3c = "`Institute` = '".$education[2]->institute."',
    `Degree` = '".$education[2]->degree."',
    `City` = '".$education[2]->city."',
    `Country` = '".$education[2]->country."',
    `From` = '".$education[2]->from_education."',
    `To` = '".$education[2]->to_education."',
    `I_currently_study_here` = '".$studyHere."'";

        $sql_education3c_update = "UPDATE `resume_education` SET ".$sql_education3c." WHERE Resume_ID = '".$sql_resume_ID."' AND `Resume_education_ID`='3c'";

        $education3c_update_response = $this->db->runQuery($sql_education3c_update);

//        project 1
   $sql_project5a = "
    `Project_title` = '".$project[0]->projectTitle."',
    `Description` = '".$project[0]->projectDetails."'";

    $sql_project5a_update = "UPDATE `resume_project` SET ".$sql_project5a." WHERE Resume_ID = ".$sql_resume_ID." AND Resume_project_ID = '5a'";

        $project5a_update_response = $this->db->runQuery($sql_project5a_update);

//   project 2
        $sql_project5b = "
    `Project_title` = '".$project[1]->projectTitle."',
    `Description` = '".$project[1]->projectDetails."'";

        $sql_project5b_update = "UPDATE `resume_project` SET ".$sql_project5b." WHERE Resume_ID = ".$sql_resume_ID." AND Resume_project_ID = '5b'";

        $project5b_update_response = $this->db->runQuery($sql_project5b_update);

//        project 3
        $sql_project5c = "
    `Project_title` = '".$project[2]->projectTitle."',
    `Description` = '".$project[2]->projectDetails."'";

        $sql_project5c_update = "UPDATE `resume_project` SET ".$sql_project5c." WHERE Resume_ID = ".$sql_resume_ID." AND Resume_project_ID = '5c'";

        $project5c_update_response = $this->db->runQuery($sql_project5c_update);


    }


//    to get resume data
    function get_resume_data_m(){
        $sql_resume = "SELECT `Resume_ID`, `Resume_type`, `First_name`, `Last_name`, `Address`, `Email`, `Phone_no`, `City`, `About you`, `Skills`, `Jobseeker_ID` FROM `resume` WHERE Resume_ID = '1'";

        $resume_ID = 1;
//        to get resume experiece details
        $sql_resume_experience2a = "SELECT * FROM `resume_experience` WHERE Resume_ID = ".$resume_ID." AND Resume_experience_ID = '2a'";
        $sql_resume_experience2b = "SELECT * FROM `resume_experience` WHERE Resume_ID = ".$resume_ID." AND Resume_experience_ID = '2b'";
        $sql_resume_experience2c = "SELECT * FROM `resume_experience` WHERE Resume_ID = ".$resume_ID." AND Resume_experience_ID = '2c'";

//        to get resume education details
        $sql_resume_education3a = "SELECT * FROM `resume_education` WHERE Resume_ID = ".$resume_ID." AND Resume_education_ID = '3a'";
        $sql_resume_education3b = "SELECT * FROM `resume_education` WHERE Resume_ID = ".$resume_ID." AND Resume_education_ID = '3b'";
        $sql_resume_education3c = "SELECT * FROM `resume_education` WHERE Resume_ID = ".$resume_ID." AND Resume_education_ID = '3c'";

//        to get resume project details
        $sql_resume_project5a = "SELECT * FROM `resume_project` WHERE Resume_ID = ".$resume_ID." AND Resume_project_ID = '5a'";
        $sql_resume_project5b = "SELECT * FROM `resume_project` WHERE Resume_ID = ".$resume_ID." AND Resume_project_ID = '5b'";
        $sql_resume_project5c = "SELECT * FROM `resume_project` WHERE Resume_ID = ".$resume_ID." AND Resume_project_ID = '5c'";


//        $statement_resume = $this->db->prepare($sql_resume);
//
////        resume experience
//        $sql_resume_experience2a = $this->db->prepare($sql_resume_experience2a);
//        $sql_resume_experience2b = $this->db->prepare($sql_resume_experience2b);
//        $sql_resume_experience2c = $this->db->prepare($sql_resume_experience2c);
//
////        resume education
//        $sql_resume_education3a = $this->db->prepare($sql_resume_education3a);
//        $sql_resume_education3b = $this->db->prepare($sql_resume_education3b);
//        $sql_resume_education3c = $this->db->prepare($sql_resume_education3c);
//
////        resume project
//        $sql_resume_project5a = $this->db->prepare($sql_resume_project5a);
//        $sql_resume_project5b = $this->db->prepare($sql_resume_project5b);
//        $sql_resume_project5c = $this->db->prepare($sql_resume_project5c);


        $resume = $this->db->runQuery($sql_resume);

        $experience2a = $this->db->runQuery($sql_resume_experience2a);
        $experience2b = $this->db->runQuery($sql_resume_experience2b);
        $experience2c = $this->db->runQuery($sql_resume_experience2c);

        $education3a = $this->db->runQuery($sql_resume_education3a);
        $education3b = $this->db->runQuery($sql_resume_education3b);
        $education3c = $this->db->runQuery($sql_resume_education3c);

        $project5a = $this->db->runQuery($sql_resume_project5a);
        $project5b = $this->db->runQuery($sql_resume_project5b);
        $project5c = $this->db->runQuery($sql_resume_project5c);


        $data = array('resume' => $resume[0],
            'experience2a' => $experience2a[0],
            'experience2b' => $experience2b[0],
            'experience2c' => $experience2c[0],
            'education3a' => $education3a[0],
            'education3b' => $education3b[0],
            'education3c' => $education3c[0],
            'project5a' => $project5a[0],
            'project5b' => $project5b[0],
            'project5c' => $project5c[0],
        );

        return $data;

    }
}

