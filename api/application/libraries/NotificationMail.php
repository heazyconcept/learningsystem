<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class NotificationMail
{
  public function send_mail($mailOptions)
  {
    
    $mailOptions = json_decode($mailOptions);
    
    $CI =& get_instance();

    $config['protocol'] ='smtp';
    $config['smtp_port'] ='465';
    $config['smtp_crypto'] ='ssl';
    $config['priority'] ='1';
    $config['smtp_host'] ='osigla.com.ng';
    $config['smtp_user'] ='no-reply@osigla.com.ng';
    $config['smtp_pass'] = 'Osigla123.';
    $config['mailtype'] = 'html';
    $CI->email->initialize($config);
  $CI->email->from('no-reply@osigla.com.ng', $mailOptions->name);
  $CI->email->to($mailOptions->to);
  if (isset($mailOptions->cc) && !empty($mailOptions->cc)) {
    $CI->email->cc($mailOptions->$cc);
  }
  if (isset($mailOptions->bcc) && !empty($mailOptions->bcc)) {
    $CI->email->bcc($mailOptions->bcc);
  }
  if (isset($mailOptions->attachment) && !empty($mailOptions->attachment)) {
      $CI->email->attach($mailOptions->attachment);
  }
  $mailAction = "";
  if (isset($mailOptions->MailLink) ) {
    $actionReplace = array('%MailLink%', '%MailLinkText%');
    $actionWith = array($mailOptions->MailLink, $mailOptions->MailLinkText);
    $actionTemplate =  file_get_contents('mails/mailaction.html', true);
    $mailAction = str_replace($actionReplace, $actionWith, $actionTemplate);
  }
  $CI->email->subject($mailOptions->subject);
  $replace = array('%MailLogo%', '%MailTitle%', '%Salutation%', '%MailMessage%', '%MailAction%');
  $with = array($mailOptions->MailLogo, $mailOptions->MailTitle, $mailOptions->Salutation, $mailOptions->MailMessage, $mailAction);
  $template = file_get_contents('mails/notification.html', true);
  $mail_body =  str_replace($replace, $with, $template);
  $CI->email->message($mail_body);
  if ($CI->email->send()) {
    return true;
  }else {
    return false;
  }

  
  }
  


}
