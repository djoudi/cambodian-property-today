<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.controller');
class PropertyControllerBooking extends JController
{
    function  __construct($config = array()) {
        JRequest::setVar("view","booking");
        parent::__construct($config);
    }

    function book(){
        JRequest::setVar("view","booking");
        JRequest::setVar("layout","book");
        $this->display();
    }
    function submit()
    {
        JRequest::checkToken() or jexit(JText::_('JInvalid_Token'));
        $data = JRequest::get("Post");
        $model	   = $this->getModel('booking');
        $row = $model->save($data);
        

        //JRequest::setVar("layout","submit");
        
        $app		= JFactory::getApplication();
        $db			= JFactory::getDbo();
        $SiteName	= $app->getCfg('sitename');

        $default	= JText::sprintf('MAILENQUIRY', $SiteName);
        $name		= JRequest::getVar('name','','post');
        $email		= JRequest::getVar('email','','post');



        $subject   = "Booking request recieved" ;
        $body	   = JRequest::getVar('text','','post');

        
        $emailCopy = JRequest::getInt('emailcopy',0,'post');
        //

        jimport('joomla.mail.helper');
        /*
        if (!$email || !$body || (JMailHelper::isEmailAddress($email) == false))
        {
            $this->setError();
            JRequest::setVar("task","error");
            $this->display();
            return false;
        }
         *
         */
        
        if ($emailCopy)
        {
            $MailFrom	= $app->getCfg('mailfrom');
            $FromName	= $app->getCfg('fromname');

            // TODO check the prefix for better formatting
            $prefix = JText::sprintf('COM_CONTACT_ENQUIRY_TEXT', JURI::base());
            $body	= $prefix."\n".$name.' <'.$email.'>'."\r\n\r\n".stripslashes($body);

            $mail = JFactory::getMailer();

            $mail->addRecipient($email);
            $mail->setSender(array($MailFrom, $FromName));
            $mail->setSubject($FromName.': '.$subject);
            $mail->setBody($body);

            $sent = $mail->Send();
        }

        $this->setRedirect("index.php?option=com_property&task=booking.show&id={$row->id}");
        return false;
    }
    
    public function show(){
        JRequest::setVar("layout","show");
        $this->display();
    }
}