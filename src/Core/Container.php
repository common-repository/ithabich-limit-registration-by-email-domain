<?php
namespace ITHabich\LimitRegistrationByMailDomain\Core;

use ITHabich\LimitRegistrationByMailDomain\Actions\FilterRegistration;
use ITHabich\LimitRegistrationByMailDomain\Backend\Settings;
use ITHabich\LimitRegistrationByMailDomain\Views\Backend\MainView;

if(!defined('ABSPATH')) exit;

class Container {

    public $singletonList = [];

    public function get(string $class)
    {
        if (method_exists($this, $class)) {
            return $this->$class();
        }
        throw new \Exception("The requested class does not exist.", 1);
        
    }
    
    private function initializePlugin()
    {
        if (!isset($this->singletonList['initializePlugin']) || !is_a($this->singletonList['initializePlugin'], 'ITHabich\LimitRegistrationByMailDomain\Core\InitializePlugin')) {
            $this->singletonList['initializePlugin'] = new InitializePlugin($this->get('settings'), $this->get('filterRegistration'));
        }
        
        return $this->singletonList['initializePlugin'];
    }

    private function filterRegistration()
    {
        if (!isset($this->singletonList['filterRegistration']) || !is_a($this->singletonList['filterRegistration'], 'ITHabich\LimitRegistrationByMailDomain\Actions\FilterRegistration')) {
            $this->singletonList['filterRegistration'] = new FilterRegistration();
        }
        
        return $this->singletonList['filterRegistration'];
    }
        
    private function sanitization()
    {
        if (!isset($this->singletonList['sanitization']) || !is_a($this->singletonList['sanitization'], 'ITHabich\LimitRegistrationByMailDomain\Core\Sanitization')) {  
            $this->singletonList['sanitization'] = new Sanitization();
        }
        
        return $this->singletonList['sanitization'];
    }

    private function settings()
    {
        if (!isset($this->singletonList['settings']) || !is_a($this->singletonList['settings'], 'ITHabich\LimitRegistrationByMailDomain\Backend\Settings')) {  
            $this->singletonList['settings'] = new Settings($this->get('mainView'), $this->get('sanitization'));
        }
        
        return $this->singletonList['settings'];
    }
    
    private function mainView()
    {
        if (!isset($this->singletonList['mainView']) || !is_a($this->singletonList['mainView'], 'ITHabich\LimitRegistrationByMailDomain\Views\Backend\MainView')) {  
            $this->singletonList['mainView'] = new MainView();
        }
        
        return $this->singletonList['mainView'];
    }
}