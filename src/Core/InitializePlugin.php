<?php
namespace ITHabich\LimitRegistrationByMailDomain\Core;

use ITHabich\LimitRegistrationByMailDomain\Backend\Settings;
use ITHabich\LimitRegistrationByMailDomain\Actions\FilterRegistration;

if(!defined('ABSPATH')) exit;

class InitializePlugin {

    private $settings;
    private $filterRegistration;

    function __construct(Settings $settings, FilterRegistration $filterRegistration) {
        $this->settings = $settings;
        $this->filterRegistration = $filterRegistration;
    }

    public function register(string $mainFilePath)
    {
        //Register activation hook
        register_activation_hook($mainFilePath, array($this, 'createOptions'));

        //Register deactivation hook
        register_deactivation_hook($mainFilePath, array($this, 'deleteOptions'));
    
        //Register Settings
        $this->settings->register();

        //Register Filter
        $this->filterRegistration->register();
    }

    public function createOptions()
    {
        //add default options
        add_option('ithlrbmd_allowed_mail_domains', '');
    }

    public function deleteOptions()
    {
        //delelte options that are used by this plugin to cleanup the database
        delete_option('ithlrbmd_allowed_mail_domains');
    }
}