<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Events_Auth {
    
    protected $ci;
    
    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('auth/auth_m');
        $this->ci->load->model('users/user_m');
        
        $data = $this->ci->auth_m->get_default();
		if (!empty($data))
		{
	        $config['account_suffix']	= $data->account_suffix;
			$config['base_dn']		= $data->base_dn;
			$config['domain_controllers']	= array($data->domain_controllers);
			$config['ad_username']		= $data->ad_username;
			$config['ad_password']		= $data->ad_password;
			$config['real_primarygroup'] = ($data->real_primarygroup == 1) ? TRUE : FALSE;
			$config['use_ssl']		= ($data->use_ssl == 1) ? TRUE : FALSE;
			$config['use_tls'] 		= ($data->use_tls == 1) ? TRUE : FALSE;
			$config['recursive_groups']	= ($data->recursive_groups == 1) ? TRUE : FALSE;
	        $this->ci->load->library('auth/adldap', $config);
	        Events::register('before_user_login', array($this, 'run'));
		}
    }
    
    public function run()
    {
    	$data = $this->ci->auth_m->get_default();
		$user = (object) array(
			'email' => $this->ci->input->post('email'),
			'password' => $this->ci->input->post('password')
		);
		
		if (strpos($user->email, '@') != FALSE)
		{
			$userTemp = explode('@', $user->email);
			$user->email = $userTemp[0];
		}
    	
    	$eresult = $this->ci->ion_auth->get_user_by_email($user->email);
    	$uresult = $this->ci->ion_auth->get_user_by_username($user->email);
    	
    	if (is_null($eresult) and is_null($uresult))
    	{
			$ad_check = $this->ci->adldap->authenticate($user->email, $user->password);
			if ($ad_check == TRUE)
			{
				$user_info = $this->ci->adldap->user_info($user->email, array('displayName', 'givenName', 'mail', 'sAMAccountName', 'sn', 'company', 'telephoneNumber'));
				$email = isset($user_info[0]['mail'][0]) ? $user_info[0]['mail'][0] : 'fake@fake.fake';
				$display_name = isset($user_info[0]['displayname'][0]) ? $user_info[0]['displayname'][0] : $user_info[0]['samaccountname'][0];
				$first_name = isset($user_info[0]['givenname'][0]) ? $user_info[0]['givenname'][0] : $user_info[0]['samaccountname'][0];
				$last_name = isset($user_info[0]['sn'][0]) ? $user_info[0]['sn'][0] : $user_info[0]['samaccountname'][0];
				$company = isset($user_info[0]['company'][0]) ? $user_info[0]['company'][0] : '';
				$phone = isset($user_info[0]['telephonenumber'][0]) ? $user_info[0]['telephonenumber'][0] : '';
				
				$profile_data['display_name'] = $display_name;
				$profile_data['first_name'] = $first_name;
				$profile_data['last_name'] = $last_name;
				$profile_data['company'] = $company;
				$profile_data['phone'] = $phone;
				
				$id = $this->ci->ion_auth->register($user_info[0]['samaccountname'][0], $user->password, $email, $data->default_group, $profile_data);
				$this->ci->ion_auth->activate($id);
			}
		}
    }
    
}