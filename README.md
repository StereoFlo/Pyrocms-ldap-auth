Pyrocms-ldap-auth
=================

Provides auth for Active Directory for PyroCMS 2.2.3

if you want to install this module, you need to make changes into the core system files. Open the file
/system/cms/modules/users/controllers/users.php

After the line number 131

$this->form_validation->set_rules($validation);

Add:
if ($_POST)
{
       Events::trigger('before_user_login');
}

Save file and install the module in the Control Panel
