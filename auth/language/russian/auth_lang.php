<?

$lang['auth:create'] = 'Создать конфигурацию';

// flash messages
$lang['auth:id_empty']	= 'ID запрошенной конфигурации пустой';
$lang['auth:id_wrong']	= 'ID запрошенной конфигурации не верный';
$lang['auth:updated']	= 'Конфигурация обновлена';
$lang['auth:deleted']	= 'Конфигурация удалена';
$lang['auth:added']		= 'Конфигурация добавлена';
$lang['auth:select']		= 'Выберите';
$lang['auth:default_group_error'] = 'Выберите группу для новых пользователей'; //


//Admin configurations
$lang['auth:admin:config:title'] = 'Все конфигурации';
$lang['auth:admin:config:name'] = 'Название';
$lang['auth:admin:config:enable'] = 'Включен';
$lang['auth:admin:config:no_items'] = 'Ни чего нет';

//admin form
$lang['auth:admin:form:title'] = 'Форма конфигурации';
$lang['auth:admin:form:name'] = 'Имя конфигурации';
$lang['auth:admin:form:default_config'] = 'Установить по умолчанию';
$lang['auth:admin:form:default_group'] = 'Группа по-умолчанию для новых пользователей';
$lang['auth:admin:form:account_suffix'] = 'Суффикс домена (@domain.com)';
$lang['auth:admin:form:base_dn'] = 'Base dn (путь до юнита, в котором искать пользователей) (DC=domain,DC=com)';
$lang['auth:admin:form:domain_controllers'] = 'Контроллеры домена (Сейчас можно указать только один контроллер)';
$lang['auth:admin:form:ad_username'] = 'Пользователь домена для чтения AD';
$lang['auth:admin:form:ad_password'] = 'Пароль пользователя';
$lang['auth:admin:form:real_primarygroup'] = 'Эта настройка позволит узнать основную группу пользователя. AD не всегда возвращает основную группу.';
$lang['auth:admin:form:use_ssl'] = 'adLDAP может использовать SSL, чтобы обеспечить дополнительную функциональность, такая как изменение пароля.';
$lang['auth:admin:form:use_tls'] = 'adLDAP может использовать TLS, а не SSL, чтобы обеспечить дополнительную функциональность, такая как изменение пароля.';
$lang['auth:admin:form:recursive_groups'] = 'При запросе членство в группе, делается рекурсивно.';