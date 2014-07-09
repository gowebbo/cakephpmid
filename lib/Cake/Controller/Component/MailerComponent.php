<?php 
/**
 * This is a component to send email from CakePHP using PHPMailer
 * @link http://bakery.cakephp.org/articles/view/94
 * @see http://bakery.cakephp.org/articles/view/94
 */
 App::uses('Component', 'Controller');
App::uses('Multibyte', 'I18n');
App::uses('CakeEmail', 'Network/Email');

class MailerComponent extends Component
{
    var $from         = '';
    var $fromName     = "";
    var $smtpUserName = '';  // SMTP username
    //var $smtpUserName = 'info@dealcations.com';  // SMTP username
    var $smtpPassword = ''; // SMTP password
    //var $smtpPassword = 'infoadmin'; // SMTP password
    var $smtpHostNames= "";  // specify main and backup server
   // $smtpHostNames= "mail.dealcations.com";  // specify main and backup server
	var $text_body = null;
    var $html_body = null;
    var $to = null;
    var $toName = null;
    var $subject = null;
    var $cc = null;
    var $bcc = null;
    var $template = 'email';
    var $attachments = null;
    var $HostNames="mail.psraviolistore.net";

    var $controller;

    function startup( &$controller ) {
      $this->controller = &$controller;
    }

    function bodyText() {
    /** This is the body in plain text for non-HTML mail clients
     */
      ob_start();
      $temp_layout = $this->controller->layout;
      $this->controller->layout = '';  // Turn off the layout wrapping
      //$this->controller->render($this->template); 
      $mail = ob_get_clean();
      $this->controller->layout = $temp_layout; // Turn on layout wrapping again
      return $mail;
    }

    function bodyHTML() {
    /** This is HTML body text for HTML-enabled mail clients
     */
      ob_start();
      $temp_layout = $this->controller->layout;
      $this->controller->layout = '';  //  HTML wrapper for my html email in /app/views/layouts
      $this->controller->render($this->template); 
      $mail = ob_get_clean();
      //$this->controller->layout = $temp_layout; // Turn on layout wrapping again
      return $mail;
    }

    function attach($filename, $asfile = '') {
      if (empty($this->attachments)) {
        $this->attachments = array();
        $this->attachments[0]['filename'] = $filename;
        $this->attachments[0]['asfile'] = $asfile;
      } else {
        $count = count($this->attachments);
        $this->attachments[$count+1]['filename'] = $filename;
        $this->attachments[$count+1]['asfile'] = $asfile;
      }
    }


    function send()
    {
		App::import('Vendor','phpmailer'.DS.'phpmailer');
		//vendor('phpmailer'.DS.'class.phpmailer');

		$mail = new PHPMailer();

		/*$mail->IsSMTP();            // set mailer to use SMTP
		 $mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = $this->smtpUserName;
		$mail->Password = $this->smtpPassword;
		*/
		$mail->IsMail();
		
		$mail->Host   = $this->HostNames;
		
		$mail->From     = $this->from;
		$mail->FromName = $this->fromName;
		if(is_array($this->to)){
			for($i=0;$i<count($this->to);$i++){
		      		$mail->AddAddress($this->to[$i], $this->toName[$i] );
				//$mail->AddReplyTo($this->from[$i], $this->fromName[$i] );	
			}
		}else{
		$mail->AddAddress($this->to, $this->toName );
		$mail->AddReplyTo($this->from, $this->fromName );
		}
		if(is_array($this->cc)){
			for($i=0;$i<count($this->cc);$i++){
		      		$mail->AddCC($this->cc[$i],$this->toName[$i]);
				$mail->AddReplyTo($this->from[$i], $this->fromName[$i] );
			}
		}else{
		$mail->AddCC($this->cc);
		$mail->AddReplyTo($this->from, $this->fromName );
		}
		$mail->CharSet  = 'UTF-8';
		$mail->WordWrap = 50;  // set word wrap to 50 characters

		if (!empty($this->attachments)) {
		  foreach ($this->attachments as $attachment) {
			if (empty($attachment['asfile'])) {
			  $mail->AddAttachment($attachment['filename']);
			} else {
			  $mail->AddAttachment($attachment['filename'], $attachment['asfile']);
			}
		  }
		}

		$mail->IsHTML(true);  // set email format to HTML

		$mail->Subject = $this->subject;
		$mail->Body    = $this->text_body;//$this->bodyHTML();
		//$mail->AltBody = $this->text_body;	//$this->bodyText();

		$result = $mail->Send();

		if($result == false ) $result = $mail->ErrorInfo;

		return $result;
    }
}
?>