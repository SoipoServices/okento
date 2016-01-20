<?php
/**
 * Created by PhpStorm.
 * User: soiposervices
 * Date: 29/11/15
 * Time: 11:21
 */

namespace Soipo\Okento\AdminBundle\Manager;

use Hip\MandrillBundle\Dispatcher;
use Hip\MandrillBundle\Message;
use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class MailerManager
{
    protected  $mailer;
    protected  $fromEmail;


    public function __construct(\Swift_Mailer $mailer ,$fromEmail){
        $this->mailer = $mailer;
        $this->fromEmail = $fromEmail;
    }

    /**
     * Send emails  using Mandrill
     * @param $fromEmail
     * @param $toEmail
     * @param string $fromName
     * @param string $subject
     * @param string $body
     * @param $attachment
     * @return array|bool
     */
    public function send($fromEmail, $toEmail , $subject = '', $body = '', $attachment = null ){


        $message = \Swift_Message::newInstance();

        $message
            ->setFrom($fromEmail)
            ->setTo($toEmail)
            ->setSubject($subject)
            ->setBody($body,'text/html');

        if($attachment instanceof \Swift_Mime_MimeEntity){
            $message->attach($attachment);
        }else{
            $fs = new Filesystem();
            if($fs->exists($attachment)){
                $message->attach(\Swift_Attachment::fromPath($attachment));
            }
        }


        $result = $this->mailer->send($message);

        return $result;
    }

    /**
     * Send emails from admin account
     * @param $toEmail
     * @param string $subject
     * @param string $body
     * @param  $attachment
     * @return array|bool
     */
    public  function sendFromAdmin($toEmail , $subject = '', $body = '', $attachment = null){
        return $this->send($this->fromEmail, $toEmail , $subject , $body,$attachment);
    }

    /**
     * @param string $subject
     * @param string $body
     * @param $attachment
     * @return array|bool
     */
    public  function sendToAdmin($subject = '', $body = '',$attachment = null){
        return $this->send($this->fromEmail, $this->fromEmail , $subject , $body,$attachment);
    }

}