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
            // log_message("ERROR", serialize($_SERVER));
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
                    "UserAgent" => $this->utilities->GetUserAgent(),
                    "IpAddress" => $this->utilities->GetIpAddress()
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
    public function serverRequest()
    {
        $ServerRequest = 'a:43:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:9:"localhost";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:14:"CONTENT_LENGTH";s:2:"51";s:11:"HTTP_ACCEPT";s:3:"*/*";s:11:"HTTP_ORIGIN";s:16:"http://localhost";s:21:"HTTP_X_REQUESTED_WITH";s:14:"XMLHttpRequest";s:15:"HTTP_USER_AGENT";s:115:"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36";s:12:"CONTENT_TYPE";s:48:"application/x-www-form-urlencoded; charset=UTF-8";s:12:"HTTP_REFERER";s:36:"http://localhost/lms/user/login.html";s:20:"HTTP_ACCEPT_ENCODING";s:17:"gzip, deflate, br";s:20:"HTTP_ACCEPT_LANGUAGE";s:26:"en-GB,en-US;q=0.9,en;q=0.8";s:11:"HTTP_COOKIE";s:192:"_ga=GA1.1.1609326466.1556889424; TawkConnectionTime=0; __tawkuuid=e::localhost::93WOH3dfyh3T4jMOmqnZjeOQJlG4B1yswr//Z9yG4YroTwHgT5gFUoqY+KK5zvqg::2; ci_session=20ohdq800alev63ru68upaaa3nhpnlks";s:4:"PATH";s:402:"C:\WINDOWS\system32;C:\WINDOWS;C:\WINDOWS\System32\Wbem;C:\WINDOWS\System32\WindowsPowerShell\v1.0\;C:\Program Files\Git\cmd;C:\WINDOWS\System32\OpenSSH\;C:\Program Files\dotnet\;C:\Program Files\Microsoft SQL Server\130\Tools\Binn\;C:\Program Files\Microsoft SQL Server\Client SDK\ODBC\170\Tools\Binn\;C:\Users\uridium-Ezekiel\AppData\Local\Microsoft\WindowsApps;C:\Users\uridium-Ezekiel\.dotnet\tools";s:10:"SystemRoot";s:10:"C:\WINDOWS";s:7:"COMSPEC";s:27:"C:\WINDOWS\system32\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\WINDOWS";s:16:"SERVER_SIGNATURE";s:80:"<address>Apache/2.4.37 (Win64) PHP/7.2.14 Server at localhost Port 80</address>
            ";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.4.37 (Win64) PHP/7.2.14";s:11:"SERVER_NAME";s:9:"localhost";s:11:"SERVER_ADDR";s:3:"::1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:3:"::1";s:13:"DOCUMENT_ROOT";s:13:"C:/wamp64/www";s:14:"REQUEST_SCHEME";s:4:"http";s:14:"CONTEXT_PREFIX";s:0:"";s:21:"CONTEXT_DOCUMENT_ROOT";s:13:"C:/wamp64/www";s:12:"SERVER_ADMIN";s:29:"wampserver@wampserver.invalid";s:15:"SCRIPT_FILENAME";s:31:"C:/wamp64/www/lms/api/index.php";s:11:"REMOTE_PORT";s:5:"54545";s:12:"REDIRECT_URL";s:22:"/lms/api/Account/Login";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:22:"/lms/api/Account/Login";s:11:"SCRIPT_NAME";s:18:"/lms/api/index.php";s:9:"PATH_INFO";s:14:"/Account/Login";s:15:"PATH_TRANSLATED";s:27:"C:\wamp64\www\Account\Login";s:8:"PHP_SELF";s:32:"/lms/api/index.php/Account/Login";s:18:"REQUEST_TIME_FLOAT";d:1558130657.367;s:12:"REQUEST_TIME";i:1558130657;}';

        $serverArray = unserialize($ServerRequest);

        
        echo "<pre>";
        print_r ((object) $serverArray );
        echo "</pre>";
        

    }
    public function ValidateSession( string $sessionId)
    {
      try {
          
         $sessionData = $this->customSession->Get($sessionId);

         if (!empty( (array) $sessionData)) {
            $IpAddress = $this->utilities->GetIpAddress();
            $userAgent = $this->utilities->GetUserAgent();
            
            if ($sessionData->IsActive == 1 && $IpAddress == $sessionData->IpAddress) {
               
                echo $this->utilities->outputMessage("success");
               return;
            }
             
         }
       

      } catch (\Throwable $th) {
         $this->utilities->LogError($th);
        
      }
      echo $this->utilities->outputMessage("error", "Internal server error");
      return;
    }

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