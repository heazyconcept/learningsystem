<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

  
    public function __construct()
    {
        parent::__construct();
        $this->load->model("users");
        $this->load->model("customSession");
    }

    public function Register()
    {
        try {
            $this->ConfirmAjaxCall();

            $RegisterData = (object) $_POST;
            $NotExist = $this->users->CheckExist($RegisterData->EmailAddress, $RegisterData->PhoneNumber);

            if ($NotExist) {
               
               $RegisterData = $this->utilities->AddPropertyToObJect($RegisterData, "UserType" , "Student");
                $ServerResponse = $this->users->Insert((array)  $RegisterData);
                if (!empty($ServerResponse)) {
                    echo $this->utilities->outputMessage("success", "Your Account is created successfully");
                    return;
                } else {
                    echo $this->utilities->outputMessage("error", "Your Request cannot be processed at this time");
                    return;
                }

            } else {
                echo $this->utilities->outputMessage("error", "Email/phone already registered");
                return;
            }
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            echo $this->utilities->outputMessage("error", "Internal Server Error");
            return;
        }

    }
    public function Login()
    {
        try {
            $this->ConfirmAjaxCall();
            $LoginData = (object) $_POST;
            $UserData = $this->users->GetByEmail($LoginData->EmailAddress);
            if (empty((array) $UserData)) {
                echo $this->utilities->outputMessage("error", "Email address does not exist");
                return;
            }
            
            $InsertedPassword = $this->utilities->GeneratePassword($LoginData->Password);
            if ($UserData->Password == $InsertedPassword) {
                $SessionID =  $this->utilities->GenerateGUID();
                $sessionData = array(
                    "UserId" => $UserData->Id,
                    "SessionId" => $SessionID,
                    "SessionDate" => $this->utilities->DbTimeFormat(),
                    "IsActive" => 1,
                    "UserAgent" => $this->utilities->GetUserAgent()
                );
               $DbResponse =  $this->customSession->Insert((object) $sessionData);
               if ($DbResponse > 0 ) {
                   echo $this->utilities->outputMessage("success", $SessionID);
                   return;
               }
                
                      
                }   
             else {
                echo $this->utilities->outputMessage("error", "Password is not correct");
                return;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
           
        }
        echo $this->utilities->outputMessage("error", "Internal Server Error");
        return;

    }
    // public function serverRequest()
    // {
    //     $ServerRequest = 'a:54:{s:14:"CONTENT_LENGTH";s:3:"380";s:12:"CONTENT_TYPE";s:68:"multipart/form-data; boundary=----WebKitFormBoundaryF62vYgCvE81jzPXh";s:21:"CONTEXT_DOCUMENT_ROOT";s:25:"/home/bohatty/public_html";s:14:"CONTEXT_PREFIX";s:0:"";s:13:"DOCUMENT_ROOT";s:25:"/home/bohatty/public_html";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:5:"HTTPS";s:2:"on";s:11:"HTTP_ACCEPT";s:3:"*/*";s:20:"HTTP_ACCEPT_ENCODING";s:17:"gzip, deflate, br";s:20:"HTTP_ACCEPT_LANGUAGE";s:26:"en-GB,en-US;q=0.9,en;q=0.8";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:11:"HTTP_COOKIE";s:379:"__tawkuuid=e::bohatty.com::HLdwWjW0rdGvN1vDay0AqZyng9jgHSE47RhJuyOj5qZbC66sjJ9rIZ8CgA9QCVX+::2; timezone=Africa/Lagos; whostmgrsession=root%3a9yeGsGAhbosr6PRf%2ca8042dc20c93e1bde366df45fa4c9cb8; cpsession=bohatty%3aRx2wZTadn4GhuaNd%2cb37658c2cb90dda6b93811ada03254a4; TawkConnectionTime=0; ci_session=3ejm4f9h5p0o1b5fqeonurvnc2nh3aif; csrf_cookie=df3d95aee7932ea59a75d62b5f34313c";s:9:"HTTP_HOST";s:11:"bohatty.com";s:11:"HTTP_ORIGIN";s:19:"https://bohatty.com";s:12:"HTTP_REFERER";s:38:"https://bohatty.com/account/login.aspx";s:15:"HTTP_USER_AGENT";s:114:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36";s:12:"HTTP_X_HTTPS";s:1:"1";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:4:"PATH";s:13:"/bin:/usr/bin";s:16:"PHP_INI_SCAN_DIR";s:67:"/opt/cpanel/ea-php56/root/etc:/opt/cpanel/ea-php56/root/etc/php.d:.";s:12:"QUERY_STRING";s:0:"";s:14:"REDIRECT_HTTPS";s:2:"on";s:19:"REDIRECT_SCRIPT_URI";s:35:"https://bohatty.com/ajax_call/login";s:19:"REDIRECT_SCRIPT_URL";s:16:"/ajax_call/login";s:20:"REDIRECT_SSL_TLS_SNI";s:11:"bohatty.com";s:15:"REDIRECT_STATUS";s:3:"200";s:18:"REDIRECT_UNIQUE_ID";s:27:"XFthejL4o4SNDQ9kNef4VgAAABI";s:12:"REDIRECT_URL";s:16:"/ajax_call/login";s:11:"REMOTE_ADDR";s:13:"154.118.64.51";s:11:"REMOTE_PORT";s:5:"11777";s:14:"REQUEST_METHOD";s:4:"POST";s:14:"REQUEST_SCHEME";s:5:"https";s:11:"REQUEST_URI";s:16:"/ajax_call/login";s:15:"SCRIPT_FILENAME";s:35:"/home/bohatty/public_html/index.php";s:11:"SCRIPT_NAME";s:10:"/index.php";s:10:"SCRIPT_URI";s:35:"https://bohatty.com/ajax_call/login";s:10:"SCRIPT_URL";s:16:"/ajax_call/login";s:11:"SERVER_ADDR";s:13:"199.192.20.57";s:12:"SERVER_ADMIN";s:21:"webmaster@bohatty.com";s:11:"SERVER_NAME";s:11:"bohatty.com";s:11:"SERVER_PORT";s:3:"443";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:6:"Apache";s:11:"SSL_TLS_SNI";s:11:"bohatty.com";s:2:"TZ";s:3:"UTC";s:9:"UNIQUE_ID";s:27:"XFthejL4o4SNDQ9kNef4VgAAABI";s:14:"ORIG_PATH_INFO";s:1:"/";s:20:"ORIG_PATH_TRANSLATED";s:35:"/home/bohatty/public_html/index.php";s:8:"PHP_SELF";s:10:"/index.php";s:18:"REQUEST_TIME_FLOAT";d:1549492602.335856914520263671875;s:12:"REQUEST_TIME";i:1549492602;s:4:"argv";a:0:{}s:4:"argc";i:0;}';

    //     $serverArray = unserialize($ServerRequest);

        
    //     echo "<pre>";
    //     print_r ((object) $serverArray );
    //     echo "</pre>";
        

    // }
    private function ConfirmAjaxCall()
    {
        if (empty($_REQUEST)) {
            redirect('/');
        }

    }
    public function Logout()
    {
        $this->session->sess_destroy();
		redirect('');
    }

}

/* End of file Account.php */


?>