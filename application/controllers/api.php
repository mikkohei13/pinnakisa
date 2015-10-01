<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function contests()
	{
		$viewdata = Array();

		// Basic data about the contest
		$this->load->model('contest_model');
		$viewdata['data'] = $this->contest_model->listing();
	
		$this->load->view('api', $viewdata);
	}

}


/* End of file */