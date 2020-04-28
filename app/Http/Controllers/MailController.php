<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

   


   public function basic_email($emailer) {

    $email=$emailer;

      $data = array('email'=> $email);

   
      Mail::send(['text'=>'mail'], $data, function($message) use($data) {



         $message->to( $data['email'], 'Branch_Negombo_St')->subject
            ('QR Code to your class card');
         $message->from('ImTheBest@gmail.com','Excellent Institute');

      });
     // echo "Basic Email Sent. Check your inbox.";

     
   }
   public function html_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('nikolinlahiru@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\image.jpg');
         
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}