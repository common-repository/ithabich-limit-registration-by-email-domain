<?php
namespace ITHabich\LimitRegistrationByMailDomain\Backend;

use ITHabich\LimitRegistrationByMailDomain\Core\Sanitization;
use ITHabich\LimitRegistrationByMailDomain\Views\Backend\MainView;

if(!defined('ABSPATH')) exit;

class Settings {

    private $mainView;
    private $sanitization;
    private $pageSlug = "limitregistrationbymaildomain-settings";

    function __construct(MainView $mainView, Sanitization $sanitization) {
        $this->mainView = $mainView;
        $this->sanitization = $sanitization;
    }

    public function register()
    {
        //Register Admin Menu and Page
        add_action('admin_menu', array($this, 'mainSettingsMenu'));

        //Register Settings
        add_action('admin_init', array($this, 'registerSettings'));
    }

    public function mainSettingsMenu()
    {
       add_options_page(esc_html__('Limit registration by mail domain - Settings', 'ithabich-limit-registration-by-email-domain'), esc_html__('Registration limit by mail domain', 'ithabich-limit-registration-by-email-domain'), 'manage_options', $this->pageSlug, 
                     array($this->mainView, 'renderPage'), 100);
    }

    public function registerSettings()
    {
        add_settings_section('ithlrbmdsettingssection', null, array($this->mainView, 'renderDesc'), $this->pageSlug);
        add_settings_field('ithlrbmd_allowed_mail_domains', esc_html__('Allowed Mail Domains', 'ithabich-limit-registration-by-email-domain'), array($this->mainView, 'renderInputField'), $this->pageSlug, 'ithlrbmdsettingssection', array('name' => "ithlrbmd_allowed_mail_domains", 'placeholder' => "@allowed.tld, @ok.com, @it-habich.de"));
        register_setting('ithlrbmdsettingsgroup', 'ithlrbmd_allowed_mail_domains', array('sanitize_callback' => array($this->sanitization, 'sanitizeAllowedMailDomains'), 'default' => "" ));
    }
}