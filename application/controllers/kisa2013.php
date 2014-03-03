<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kisa2013 extends CI_Controller {

	// ------------------------------------------------------------------------
	
	public function index()
	{
		$this->load->model('kisa2013_model');
		$speciesArray = $this->kisa2013_model->loadParticipation($this->ion_auth->user()->row()->id);

		echo "<pre>";
		print_r ($speciesArray);
	}
	
	// ------------------------------------------------------------------------

}

/* End of file */