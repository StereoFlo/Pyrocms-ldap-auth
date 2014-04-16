<section class="title">
	<h4><?= lang('auth:admin:form:title'); ?></h4>
</section>

<section class="item">
	<div class="content">

	<?php echo form_open($this->uri->uri_string(), 'class="crud"'); ?>
		<div class="form_inputs" >
            <ul>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <label for="name"><?= lang('auth:admin:form:name'); ?></label>
                    <div class="input"><?php echo form_input('name', isset($config[0]->name) ? $config[0]->name : '', 'class="width-15"'); ?></div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <label for="default_config"><?= lang('auth:admin:form:default_config'); ?></label>
                    <div class="input"><?php echo form_checkbox('default_config', 1, isset($config[0]->default_config) ? (($config[0]->default_config == 1) ? TRUE : FALSE) : ''); ?></div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <label for="default_group"><?= lang('auth:admin:form:default_group'); ?></label>
                    <div class="input"><?php echo form_dropdown('default_group', array(0 => lang('global:select-all')) + $groups_select, isset($config[0]->default_group) ? $config[0]->default_group : '') ?></div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <label for="account_suffix"><?= lang('auth:admin:form:account_suffix'); ?></label>
                    <div class="input"><?php echo form_input('account_suffix', isset($config[0]->account_suffix) ? $config[0]->account_suffix : '', 'class="width-15"'); ?></div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <label for="base_dn"><?= lang('auth:admin:form:base_dn'); ?></label>
                    <div class="input"><?php echo form_input('base_dn', isset($config[0]->base_dn) ? $config[0]->base_dn : '', 'class="width-15"'); ?></div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <label for="domain_controllers"><?= lang('auth:admin:form:domain_controllers'); ?></label>
                    <div class="input"><?php echo form_input('domain_controllers', isset($config[0]->domain_controllers) ? $config[0]->domain_controllers : '', 'class="width-15"'); ?></div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <label for="ad_username"><?= lang('auth:admin:form:ad_username'); ?></label>
                    <div class="input"><?php echo form_input('ad_username', isset($config[0]->ad_username) ? $config[0]->ad_username : '', 'class="width-15"'); ?></div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <label for="ad_password"><?= lang('auth:admin:form:ad_password'); ?></label>
                    <div class="input"><?php echo form_input('ad_password', isset($config[0]->ad_password) ? $config[0]->ad_password : '', 'class="width-15"'); ?></div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <label for="real_primarygroup"><?= lang('auth:admin:form:real_primarygroup'); ?></label>
                    <div class="input"><?php echo form_dropdown('real_primarygroup', $dropdown, isset($config[0]->real_primarygroup) ? $config[0]->real_primarygroup : ''); ?></div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <label for="use_ssl"><?= lang('auth:admin:form:use_ssl'); ?></label>
                    <div class="input"><?php echo form_dropdown('use_ssl', $dropdown, isset($config[0]->use_ssl) ? $config[0]->use_ssl : ''); ?></div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <label for="use_tls"><?= lang('auth:admin:form:use_tls'); ?></label>
                    <div class="input"><?php echo form_dropdown('use_tls', $dropdown, isset($config[0]->use_tls) ? $config[0]->use_tls : ''); ?></div>
                </li>
                <li class="<?php echo alternator('', 'even'); ?>">
                    <label for="recursive_groups"><?= lang('auth:admin:form:recursive_groups'); ?></label>
                    <div class="input"><?php echo form_dropdown('recursive_groups', $dropdown, isset($config[0]->recursive_groups) ? $config[0]->recursive_groups : ''); ?></div>
                </li>
            </ul>
		</div>
		
		<div class="buttons">
			<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
		</div>
       
	<?php echo form_close(); ?>
	
	</div>
</section>