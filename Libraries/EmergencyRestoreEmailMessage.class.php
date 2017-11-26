<?php
/**
* 
*/

namespace WCFE\Includes\Mail;

// No Direct Access
defined('ABSPATH') or die(-1);

/**
* 
*/
class EmergencyRestoreMail
{
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $to;
    
    /**
    * put your comment there...
    * 
    */
    public function __construct()
    {
        
        // Get Current Logged in user email to send mail to
        $user = get_userdata(get_current_user_id());
        $this->to = $user->user_email;
    }

    /**
    * put your comment there...
    * 
    * @param mixed $backupLink
    * @return boolean
    */
    public function send($restoreLink)
    {
        
        $blogname = get_bloginfo('name');
        $blogdomain = parse_url(home_url(), PHP_URL_HOST);
        
        // Subject
        $subject = 'WP Config File Editor - Emergency Restore Link';
        
        // Generic Headers
        $headers[] = 'Content-Type: text/plain';
        
        // Set From as web site address
        $headers[] = "From: {$blogname} <noreply@{$blogdomain}>";
        
        // Message
        $message[] = 'Here is a link to help you Restore your latest wp-config.php file';
        $message[] = 'Please use it only if you\'ve problem accessing your site after the last save operation';
        $message[] = $restoreLink;
        
        // Formatting Headers
        $headers = join("\r\n", $headers);
        
        // Formattig message
        $message = join("\n", $message);
        
        // Send mail
        $status = wp_mail(
            $this->to,
            $subject,
            $message,
            $headers
        );
        
        return $status;
    }
}