<?php
class Tasks extends CI_Controller {
	public function show($id) {
		if($this->session->userdata('logged_in')) {
		$data['task'] = $this->Task_model->get_task($id);
		//	Check if complete
		$data['is_complete'] = $this->Task_model->check_if_complete($id);
		}
		else {
			$this->session->set_flashdata('no_access','You are not logged in!');
				redirect('home/index');
		}
		//load view and layout
		$data['main_content'] = 'tasks/show';
		$this->load->view('layouts/main',$data);
	}

	public function add($list_id = null){
		$this->form_validation->set_rules('task_name','Task Name','trim|required');
		$this->form_validation->set_rules('task_body','Task Body','trim|required');

		if($this->form_validation->run() == FALSE) {
			// Get list name for view
			$data['list_name'] = $this->Task_model->get_list_name($list_id);
			//load view and layout
			$data['main_content'] =  'tasks/add_task';
			$this->load->view('layouts/main',$data);
		} else {
			//post values to array
			$data = array(
							'task_name' 	=> $this->input->post('task_name'),
							'task_body'		=> $this->input->post('task_body'),
							'due_date' 		=> $this->input->post('due_date'),
							'list_id'		=> $list_id
						);
			if($this->Task_model->create_task($data)){
				$this->session->set_flashdata('task_created','Your task has been created');
				redirect('lists/show/'.$list_id.'');
			}
		}
	}

	public function edit($task_id){
		$this->form_validation->set_rules('task_name','Task Name','trim|required');
		$this->form_validation->set_rules('task_body','Task Body','trim|required');

		if($this->form_validation->run() == FALSE) {
			//get list id
			$data['list_id'] = $this->Task_model->get_task_list_id($task_id);
			//get list name for view
			$data['list_name'] = $this->Task_model->get_list_name($data['list_id']);
			// get the current task info
			$data['this_task'] = $this->Task_model->get_task_data($task_id);
			//load view and layout
			$data['main_content'] = 'tasks/edit_task';
			$this->load->view('layouts/main',$data);
		} else {
			// get list id
			$list_id = $this->Task_model->get_task_list_id($task_id);
			//post values to array
			$data = array(
							'task_name' 	=> $this->input->post('task_name'),
							'task_body'		=> $this->input->post('task_body'),
							'due_date' 		=> $this->input->post('due_date'),
							'list_id'		=> $list_id
						);
			if($this->Task_model->edit_task($task_id,$data)){
				$this->session->set_flashdata('task_updated','Your task has been updated');
				redirect('lists/show/'.$list_id.'');
			}
		}

	}

	public function delete($list_id, $task_id) {
		//delete Task
		$this->Task_model->delete_task($task_id);
		$this->session->set_flashdata('task_deleted','The Task has been deleted successfully..');
		redirect('lists/show/'.$list_id.'');
	}

	public function mark_complete($task_id) {
		if($this->Task_model->mark_complete($task_id)){
			$list_id = $this->Task_model->get_task_list_id($task_id);
			$this->session->set_flashdata('marked_complete','Task has been Marked \'Complete\'');
			redirect('lists/show/'.$list_id.'');
		}
	}

	public function mark_new($task_id) {
		if($this->Task_model->mark_new($task_id)){
			$list_id = $this->Task_model->get_task_list_id($task_id);
			$this->session->set_flashdata('marked_new','Task has been Marked \'Inomplete\'');
			redirect('lists/show/'.$list_id.'');
		}
	}

}