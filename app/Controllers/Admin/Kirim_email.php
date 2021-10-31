<?php 

namespace App\Controllers\Admin;
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
class Kirim_email extends BaseController
{
    public $mail;

    public function __construct()
    {
        helper(['form']);
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->isSMTP();
        $this->mail->Host       = 'mail3.modena.co.id ';   
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = 'support@modena.co.id';
        $this->mail->Password   = 'S@tr10*328';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port       = 587;
        $this->mail->Mailer      = 'smtp';
        $this->mail->SMTPOptions = ['ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]];
    }
 
    public function index()
    {
        //return view('email/voucher');
        return view('email/mail_test');
    }
 
    public function send()
    {
        $to                 = $this->request->getPost('to');
        $subject            = $this->request->getPost('subject');
        $message            = $this->request->getPost('message');
        try {
            $message = view('email/voucher');
            //$this->mail->AddEmbeddedImage('../assets/upload/voucher.png', "my-attach");
            //$this->mail->Body = 'Embedded Image: <img alt="PHPMailer" src="cid:my-attach"> Here is an image!';
            $this->mail->setFrom('support@modena.co.id', 'MODENA Indonesia');
            $this->mail->addAddress('Budi.Astanto@modena.com');
            //$mail->addReplyTo('', '');
            // Content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            //$this->mail->Body    = $message;
            $this->mail->AddEmbeddedImage('../assets/upload/voucher.png', "my-attach");
            $this->mail->Body = $message;
            $this->mail->send();
            echo "sukses";
            session()->setFlashdata('success', 'Send Email successfully');
            return redirect()->to('email'); 
        } catch (Exception $e) {
            session()->setFlashdata('error', "Send Email failed. Error: ". $this->mail->ErrorInfo);
            //return redirect()->to('email');
        }
    }
}