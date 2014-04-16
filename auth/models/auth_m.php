<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Specials Module
 *
 * @author 		Patrick Kivits - Woodits Webbureau
 * @website		http://woodits.nl
 * @package 	PyroCMS
 * @subpackage 	Specials Module
 */
class Auth_m extends MY_Model 
{
	var $table;

	public function __construct()
	{		
		parent::__construct();
		$this->_table = 'auth_configuration';
		$this->table = 'auth_configuration';
	}
	
	public function check ($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table)->num_rows();
	}
	
	public function get_default()
	{
		$this->db->where('default_config', 1);
		return $this->db->get($this->table)->row();
	}
	
	public function update ($id, $data)
	{
		if (isset($data['default_config']))
		{
			$this->DG_reset();
		}
		$sql = array(
		
			'name' => $data['name'],
			'default_config' => isset($data['default_config']) ? 1 : 0,
			'default_group' => $data['default_group'],
			'account_suffix' => $data['account_suffix'],
			'base_dn' => $data['base_dn'],
			'domain_controllers' => $data['domain_controllers'],
			'ad_username' => $data['ad_username'],
			'ad_password' => $data['ad_password'],
			'real_primarygroup' => $data['real_primarygroup'],
			'use_ssl' => $data['use_ssl'],
			'use_tls' => $data['use_tls'],
			'recursive_groups' => $data['recursive_groups'],
		
		);
		$this->db->where('id', $id);
		$this->db->update($this->table, $sql);
	}
	
	public function insert ($data)
	{
		if (isset($data['default_config']))
		{
			$this->DG_reset();
		}
		$this->db->set('name', $data['name']);
		$this->db->set('default_config', isset($data['default_config']) ? 1 : 0);
		$this->db->set('default_group', $data['default_group']);
		$this->db->set('account_suffix', $data['account_suffix']);
		$this->db->set('base_dn', $data['base_dn']);
		$this->db->set('domain_controllers', $data['domain_controllers']);
		$this->db->set('ad_username', $data['ad_username']);
		$this->db->set('ad_password', $data['ad_password']);
		$this->db->set('real_primarygroup', $data['real_primarygroup']);
		$this->db->set('use_ssl', $data['use_ssl']);
		$this->db->set('use_tls', $data['use_tls']);
		$this->db->set('recursive_groups', $data['recursive_groups']);
		$this->db->insert($this->table);
	}
	
	public function DG_reset ()
	{
		$this->db->set('default_config', 0);
		$this->db->where('default_config', 1);
		$this->db->update($this->table);
	}
	
	public function delete ($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
}