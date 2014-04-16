<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

    protected $section = 'general';

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_m');
        $this->load->model('groups/group_m');
        $this->lang->load('auth');
	}
	
	public function index ()
	{
		$items = $this->auth_m->get_all();
		$this->template->set('items', $items)->build('admin/index');
	}
	
	public function edit ($id = NULL)
	{
		if (!is_null($id) and is_numeric($id))
		{
			$config = $this->auth_m->where('id', $id)->get_all();
			if (empty($config))
			{
				$this->session->set_flashdata('error', lang('auth:id_wrong'));
				redirect('admin/auth');
			}
			else
			{
				if ($_POST)
				{
					if ($_POST['default_group'] == 0)
					{
						$this->session->set_flashdata('error', lang('auth:default_group_error'));
						redirect('admin/auth/edit/' . $id);
					}
					
					if ($this->auth_m->check($id) == 1)
					{
						$this->auth_m->update($id, $_POST);
						$this->session->set_flashdata('success', lang('auth:updated'));
						redirect('admin/auth');
					}
					else
					{
						$this->session->set_flashdata('error', lang('auth:id_wrong'));
						redirect('admin/auth');
					}					
				}
				else
				{
					$groups = $this->group_m->where_not_in('name', 'admin')->get_all();
					$groups_select = array_for_select($groups, 'id', 'description');
					
					$dropdown = array('' => 'Выберите', 1 => 'TRUE', 0 => 'FALSE');
					$this->template->
							set('config', $config)->
							set('dropdown', $dropdown)->
							set('groups_select', $groups_select)->
							build('admin/form');
				}
			}
		}
		else
		{
			$this->session->set_flashdata('error', lang('auth:id_empty'));
			redirect('admin/auth');
		}
	}
	
	public function add ()
	{
		if ($_POST)
		{
			$this->auth_m->insert($_POST);
			$this->session->set_flashdata('success', lang('auth:added'));
			redirect('admin/auth');
		}
		else
		{
			$groups = $this->group_m->where_not_in('name', 'admin')->get_all();
			$groups_select = array_for_select($groups, 'id', 'description');
			$dropdown = array('' => lang('auth:select'), 1 => 'TRUE', 0 => 'FALSE');
			
			$this->template->
				set('dropdown', $dropdown)->
				set('groups_select', $groups_select)->
				build('admin/form');
		}
	}
	
	public function delete ($id = NULL)
	{
		if (!is_null($id) and is_numeric($id))
		{
			$this->auth_m->delete($id);
			$this->session->set_flashdata('success', lang('auth:deleted'));
			redirect('admin/auth');
		}
		else
		{
			$this->session->set_flashdata('error', lang('auth:id_wrong'));
			redirect('admin/auth');
		}
	}
}