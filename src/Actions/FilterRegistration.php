<?php
namespace ITHabich\LimitRegistrationByMailDomain\Actions;

if(!defined('ABSPATH')) exit;

class FilterRegistration {

    public function register()
    {
        add_filter('registration_errors', array($this, 'filterRegistration'), 10, 3);
    }

    public function filterRegistration($errors, $sanitizedUserLogin, $userMail) {
        
        $userMailArr = explode("@", $userMail);

        //skip filter if user provided mail is empty.
        //Thats the case when another check (WP Core) already failed (e.g. invalid mailaddress).
        if ((count($userMailArr) === 1 && "" === $userMailArr[0]) ) {
            return $errors;
        }

        //load allowed mail domains
        $wpSanitized = sanitize_text_field(get_option('ithlrbmd_allowed_mail_domains'));
        $mails = array_map('trim', explode(",", $wpSanitized));
        

        //skip filter if allowed mail domains is empty
        if (count($mails) === 1 && "" === $mails[0]) {
            return $errors;
        }

        //check if given user mail is in allowed mail domains list
        if (!in_array("@" . $userMailArr[1], $mails)) {
            $errors->add('mailError',  esc_html__('You are not allowed to register.', 'ithabich-limit-registration-by-email-domain') );
        }

        return $errors;
      }
}