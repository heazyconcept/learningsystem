<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Mail_lib
{
  public function send_mail($name, $to, $subject, $message_type,  $other_values, $message_to, $attachment = '', $cc= '', $bcc='' )
  {
    $CI =& get_instance();

    $config['protocol'] ='smtp';
    $config['smtp_port'] ='465';
    $config['smtp_crypto'] ='ssl';
    $config['priority'] ='1';
    $config['smtp_host'] ='server1.greenmousetech.com';
    $config['smtp_user'] ='no-reply@growcropsonline.com';
    $config['smtp_pass'] = 'Growcrops_2018';
    $config['mailtype'] = 'html';
    $CI->email->initialize($config);
  $CI->email->from('no-reply@growcropsonline.com', $name);
  $CI->email->to($to);
  if (!empty($cc)) {
    $CI->email->cc($cc);
  }
  if (!empty($bcc)) {
    $CI->email->bcc($bcc);
  }
  if (!empty($attachment)) {
      $CI->email->attach($attachment);
  }


  $CI->email->subject($subject);
  $mail_details = $this->mail_body($message_type, $other_values, $message_to);
  $mail_body = '
    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
      <tbody>
        <tr>
          <td align="center" valign="top">
                <div id="template_header_image"></div>
                <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="background-color:#fdfdfd;border:1px solid #dcdcdc;border-radius:3px!important">
                  <tbody>
                    <tr>
                      <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header" style="background-color:#fdfdfd;border-radius:3px 3px 0 0!important;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif">
                          <tbody>
                            <tr>
                              <td id="header_wrapper" style="padding:10px 10px;display:block width:40%">
                                <h1 style="color:#ffffff;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:100%;margin:0;text-align:left"><img src="'.asset_url('/img/logo.png') .'" alt="" style="width: 33%;padding: 10px"></h1>
                              </td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
                          <tbody>
                            <tr>
                              <td valign="top" id="body_content" style="background-color:#fdfdfd">
                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                  <tbody>
                                    <tr>
                                      <td valign="top" style="padding:48px">
                                        <div id="ody_content_inner" style="color:#737373;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
                                          <p style="margin:0 0 16px">Dear '. $mail_details['dear'] .'</p>
                                          '.$mail_details['other_message'].'
                                          <p>Regards</p>
                                          <p>Growcropsonline</p>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td align="center" valign="top">
                            <table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer">
                              <tbody>
                                <tr>
                                  <td valign="top" style="padding:0">
                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td colspan="2" valign="middle" id="credit" style="padding:0 48px 48px 48px;border:0;color:#ffffff;font-family:Arial;font-size:12px;line-height:125%;text-align:center; background:#557295;">
                                            <p>Growcropsonline All right Reserved.</p>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>

      ';
  $CI->email->message($mail_body);
  if ($CI->email->send()) {
    return true;
  }else {
    return false;
  }

  // return $CI->email->print_debugger();
  }
  private function mail_body($message_type, $other_values, $message_to)
  {
    if ($message_to == 'user') {

      if ($message_type == 'registration') {
        $mail_body['dear'] = $other_values['first_name'] . ' '. $other_values['last_name'];
        $mail_body['other_message'] = '<p style="margin:0 0 16px">Thanks for creating account on Growcrops Online. Your username is <strong> ' .$other_values['username']. '</strong></p>
        <p style="margin:0 0 16px">kindly click ' .$other_values['activation'].' to activate your account.</p>';

      }elseif ($message_type == 'employee') {
        $mail_body['dear'] = $other_values['first_name'] . ' '. $other_values['last_name'];
        $mail_body['other_message'] = '<p style="margin:0 0 16px">You have been created as an admin on Growcrops Online. Your username is <strong> ' .$other_values['email_address']. '</strong> <br> your password is: <strong>'.$other_values['password'].'</strong></p>
        <p style="margin:0 0 16px">kindly click <a href="' .base_url('admin').'" target="_blank">here</a> to login to the admin dashboard.</p>';

      }elseif ($message_type == 'transaction') {
        $mail_body['dear'] = $other_values['first_name'] . ' '. $other_values['last_name'];
        $mail_body['other_message'] = '<p style="margin:0 0 16px">This is to confirm the booking you just made for '.$other_values['crop_name'].' with the following details</p>
        <p style="margin:0 0 16px">
        Amount paid: &#8358;'.number_format($other_values['amount'], 2).' <br>
        Slot Paid for : '.$other_values['slot'].'<br>
        Transaction Reference : '.$other_values['transaction_ref'].'<br>
        Present Stage : '. strtoupper($other_values['stage']).'<br>
        </p>
        <p style="margin:0 0 16px">Please note that you will recieve a payment receipt on completion of your payment process</p>';
      }elseif ($message_type == 'reset_password') {
        $mail_body['dear'] = $other_values['email_address'];
        $mail_body['other_message'] = '<p style="margin:0 0 16px">You have requested a password reset. if you have not, kindly ignore this message</p>
        <p style="margin:0 0 16px"> Kindly '.$other_values['reset_link'].' to reset your password </p>';
      }elseif ($message_type == 'invoicing') {
        $mail_body['dear'] = $other_values['first_name'] . ' '. $other_values['last_name'];
        $mail_body['other_message'] = '<p style="margin:0 0 16px">This is to inform you that you are ready to move to the next Cycle for '.$other_values['crop_name'].' with the following details</p>
        <p style="margin:0 0 16px">Your invoice has been scheduled. kindly login to your account to pay the required amount</p>';
      }elseif ($message_type == 'send_schedule') {
        $mail_body['dear'] = $other_values['email_address'];
        $mail_body['other_message'] = '<p style="margin:0 0 16px">You have requested for a schedule on Grwocropsonline</p>
        <p style="margin:0 0 16px">Find attached the schedule requested</p>';
      }elseif ($message_type == 'bulk_schedule') {
        $mail_body['dear'] = $other_values['email_address'];
        $mail_body['other_message'] = '<p style="margin:0 0 16px">One more step to go</p>
        <p style="margin:0 0 16px">Kindly '.$other_values['link'].' and get your schedule</p>';
      }

    }
    return $mail_body;



  }


}
