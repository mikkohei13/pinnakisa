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

	public function contest_participations($contest_id)
	{
		$viewdata = Array();

		// Results...
		$this->load->model('results_model');

		// Location ticks
		$viewdata['data'] = $this->results_model->summary($contest_id);
	
		$this->load->view('api', $viewdata);
	}

}


/* End of file */