<?

$lang['auth:create'] = 'Create a new config';

// flash messages
$lang['auth:id_empty']	= 'ID of requested configuration is empty';
$lang['auth:id_wrong']	= 'ID of requested configuration is wrong';
$lang['auth:updated']	= 'Configuration updated';
$lang['auth:deleted']	= 'Configuration deleted';
$lang['auth:added']		= 'Configuration added';
$lang['auth:select']		= 'Select on';
$lang['auth:default_group_error'] = 'Please, select the default group for new users'; //


//Admin configurations
$lang['auth:admin:config:title'] = 'All configurations';
$lang['auth:admin:config:name'] = 'Name';
$lang['auth:admin:config:enable'] = 'Enable';
$lang['auth:admin:config:no_items'] = 'No items';

//admin form
$lang['auth:admin:form:title'] = 'Configuration form';
$lang['auth:admin:form:name'] = 'Name of you config';
$lang['auth:admin:form:default_config'] = 'Set default';
$lang['auth:admin:form:default_group'] = 'Default group for new domain users';
$lang['auth:admin:form:account_suffix'] = 'Account suffix of you domain (@domain.com)';
$lang['auth:admin:form:base_dn'] = 'Base dn of you domain (DC=domain,DC=com)';
$lang['auth:admin:form:domain_controllers'] = 'Domain controllers of you domain (you can specify only one DC)';
$lang['auth:admin:form:ad_username'] = 'Domain user for read you AD';
$lang['auth:admin:form:ad_password'] = 'Domain user password';
$lang['auth:admin:form:real_primarygroup'] = 'This tweak will resolve the real primary group. AD does not always return the primary group.';
$lang['auth:admin:form:use_ssl'] = 'adLDAP can use LDAP over SSL to provide extra functionality such as password changes.';
$lang['auth:admin:form:use_tls'] = 'dLDAP can use LDAP over TLS connections rather than SSL to provide extra functionality such as password changes.';
$lang['auth:admin:form:recursive_groups'] = 'When querying group membership, do it recursively.';