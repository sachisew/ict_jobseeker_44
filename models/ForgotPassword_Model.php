<?php

/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/* Include the Composer generated autoload.php file. */  
require 'vendor/autoload.php';

class ForgotPassword_Model extends Model{
    function __construct()
    {
       parent :: __construct(); 
    }

    //one email account can has one account.if there has a another account using that email select that user details
    public function isRegisteredUser($email) {
        $query = "SELECT * FROM user WHERE email = '$email'";
    
        $row = $this->db->runQuery($query);
       
        if(count($row)) {
       
            return true;
        }else {
           
            return false;
        }
    }

    public function  sendMail($email,$emailToken,$fname)
    {
                /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
        $mail = new PHPMailer(TRUE);
                
        //Enable SMTP debugging.but i disable it by putting zero here.if you want change zero to 3
        $mail->SMTPDebug = 0;                               
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();            
        //Set SMTP host name                          
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;                          
        //Provide username and password     
        $mail->Username = "secondyeargroupproject44@gmail.com";                 
        $mail->Password = "Second@44";                           
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";                           
        //Set TCP port to connect to
        $mail->Port = 587;

        /* Open the try/catch block. */
        try {
            $message = '<html><head>
            <title>Email Verification</title>
            </head>
            <body>';
            $message .= '<h1>Hello ' . $fname . '!</h1>';
            $message .='<p>You are receiving this email because we received a password reset request for your account.</p>';
            $message .= '<p><a href="'.URL.'Registration/activation'. '/'.$email.'/'. $emailToken. '">CLICK HERE TO RESET YOUR PASSWORD</a>';
            $message .= "</body></html>";
         
                   
            /* Set the mail sender. */
            $mail->setFrom('secondyeargroupproject44@gmail.com', 'ICT Jobseeker');

            /* Add a recipient. */
            //$mail->addAddress($email, 'username');
            $mail->addAddress($email, 'username',0);

            /* Set the subject. */
            $mail->Subject = 'ICT Jobseeker varify your email';

            /* Set the mail message body. */
            //$mail->Body =  $message;
            $mail->MsgHTML($message);
            /* Finally send the mail. */
            $mail->send();
            }
            catch (Exception $e)
            {
            /* PHPMailer exception. */
            echo $e->errorMessage();
            }
            catch (\Exception $e)
            {
            /* PHP exception (note the backslash to select the global namespace Exception class). */
        //echo $e->getMessage();
            }
    }
    public function  activation($email,$emailToken){

          
        
        $info['active_msg'] = $this->model->verifyemail_update($email,$emailToken);
       
      
        $this->view ->render('Success_post');

        }

    
}






?>