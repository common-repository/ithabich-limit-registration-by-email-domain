<?php
namespace ITHabich\LimitRegistrationByMailDomain\Core;

if(!defined('ABSPATH')) exit;

class Sanitization {

    public function sanitizeAllowedMailDomains($input)
    {
        //only admins are allowed to change this setting.
        if (! current_user_can('manage_options')) {
            add_settings_error('ithlrbmd_allowed_mail_domains', 'ithlrbmd_allowed_mail_domains_error', esc_html__('You are not allowed to change this setting. Please contact your Administrator.', 'ithabich-limit-registration-by-email-domain'));
            return get_option('ithlrbmd_allowed_mail_domains');
        }

        $valid = true;
        
        $wpSanitized = sanitize_text_field($input);
        $mails = array_map('trim', explode(",", $wpSanitized));
       
        //if the input does contain nothing, we'll get an array with one empty string as value
        //we're resetting the value to an empty string.
        if (count($mails) === 1 && "" === $mails[0]) {
            return "";
        }

        foreach ($mails as $mail) {       
            //Check if it contains only allowed characters and starts with @. 
            //Furthermore, check if WordPress core also accepts it as a valid email address (domain).
            if (! preg_match("/^@[a-z0-9_.-]+$/i", $mail) || ! is_email("me" . $mail)) {
                $valid = false;
            }
        }

        if (! $valid) {
            add_settings_error('ithlrbmd_allowed_mail_domains', 'ithlrbmd_allowed_mail_domains_error', esc_html__('Allowed Mail Domains need to be a comma-seperated list, a single Domain or a complete empty field.', 'ithabich-limit-registration-by-email-domain'));
            return get_option('ithlrbmd_allowed_mail_domains');
        }

        return $input;
    }
}