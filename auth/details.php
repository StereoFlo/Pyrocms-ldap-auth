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
    	$this->dbforge->drop_table('auth_configuration');
		$sql = "
			CREATE TABLE ".$this->db->dbprefix('auth_configuration')." (
			  id int(11) NOT NULL AUTO_INCREMENT,
			  name varchar(255) DEFAULT NULL,
			  default_config int(11) DEFAULT NULL,
			  default_group int(11) DEFAULT NULL,
			  account_suffix varchar(255) DEFAULT NULL,
			  base_dn varchar(255) DEFAULT NULL,
			  domain_controllers varchar(255) DEFAULT NULL,
			  ad_username varchar(255) DEFAULT NULL,
			  ad_password varchar(255) DEFAULT NULL,
			  real_primarygroup int(11) DEFAULT NULL,
			  use_ssl int(11) DEFAULT NULL,
			  use_tls int(11) DEFAULT NULL,
			  recursive_groups int(11) DEFAULT NULL,
			  PRIMARY KEY (id)
			) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT = 'Auth module table';
		";
		if($this->db->query($sql))
		{
			return TRUE;
		}
    }

    public function uninstall() {
    	$this->dbforge->drop_table('auth_configuration');
        return TRUE;
    }

    public function upgrade($old_version) {
        return TRUE;
    }

    public function help() {
        return "Help is not available for this module";
    }

}
