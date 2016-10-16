<?php
class Lists extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if(!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('no_access','You are not logged in');
			redirect('home/index');
		}
	}

	public function index() {
		if($this->session->userdata('logged_in')) {
			$user_id = $this->session->userdata('user_id');
			$data['lists'] = $this->List_model->get_all_lists($user_id);
			$data['tasks'] = $this->Task_model->get_users_tasks($user_id);
		}

		$data['main_content'] = 'lists/index';
		$this->load->view('layouts/main',$data);
	}

	public function show($id) {

	
		$data['list'] = $this->List_model->get_list($id);
			//Get all completed task for the list
		$data['completed_tasks'] = $this->List_model->get_list_tasks($id, true);
		//Get all Incomplete task for the list
		$data['incomplete_tasks'] = $this->List_model->get_list_tasks($id, false);


		//load view and layout
		$data['main_content'] = 'lists/show';
		$this->load->view('layouts/main',$data);

	}

	public function add(){
		$this->form_validation->set_rules('list_name','List Name','trim|required');
		$this->form_validation->set_rules('list_body','List Body','trim|required');

		if($this->form_validation->run() == FALSE) {
			//load view and layout
			$data['main_content'] =  'lists/add_list';
			$this->load->view('layouts/main',$data);
		} else {
			//post values to array
			$data = array(
							'list_name' => $this->input->post('list_name'),
							'list_body'	=> $this->input->post('list_body'),
							'list_user_id' => $this->session->userdata('user_id')
						);
			if($this->List_model->create_list($data)){
				$this->session->set_flashdata('list_created','Your task list has been created');
				redirect('lists/index');
			}
		}
	}

	public function edit($list_id){
		$this->form_validation->set_rules('list_name','List Name','trim|required');
		$this->form_validation->set_rules('list_body','List Body','trim|required');

		if($this->form_validation->run() == FALSE) {
			//get the current list info
			$data['this_list'] = $this->List_model->get_list_data($list_id);
			//load view and layout
			$data['main_content'] = 'lists/edit_list';
			$this->load->view('layouts/main',$data);
		} else {
			//post values to array
			$data = array(
							'list_name' => $this->input->post('list_name'),
							'list_body'	=> $this->input->post('list_body'),
							'list_user_id' => $this->session->userdata('user_id')
						);
			if($this->List_model->edit_list($list_id,$data)){
				$this->session->set_flashdata('list_updated','Your task list has been updated');
				redirect('lists/index');
			}
		}

	}

	public function delete($list_id) {
		//delete list
		$this->List_model->delete_list($list_id);
		$this->session->set_flashdata('list_deleted','The List has been deleted successfully..');
		redirect('lists/index');
	}
}