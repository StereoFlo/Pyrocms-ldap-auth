Pyrocms-ldap-auth
=================

Provides auth for Active Directory for PyroCMS 2.2.3

What would work this module, you need to make changes to the core system files. You need to edit the file
/system/cms/modules/users/controllers/users.php

After the line number 131
$this->form_validation->set_rules($validation);

Add:
if ($_POST)
{
       Events::trigger('before_user_login');
}

Save file and install the module in the Control Panel