<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Module_Auth extends Module {

    public $version = '1.0';

    public function info() {
        $info = array(
            'name' => array(
                'en' => 'Ldap Auth',
                'ru' => 'Авторизация AD'
            ),
            'description' => array(
                'en' => 'none',
                'ru' => 'none'
            ),
            'frontend' => FALSE,
            'backend' => TRUE,
            'menu' => 'users',
            'sections' => array(
                'general' => array(
                    'shortcuts' => array(
                        'create' => array(
                            'name' => 'auth:create',
                            'uri' => 'admin/auth/add',
                            'class' => 'add'
                        )
                    )
                )
            )
        );
		return $info;
    }

    public function install() {
    	return TRUE;
    }

    public function uninstall() {
        return TRUE;
    }

    public function upgrade($old_version) {
        return TRUE;
    }

    public function help() {
        return "Help is not available for this module";
    }

}
