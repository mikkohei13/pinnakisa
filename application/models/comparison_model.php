<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comparison_model extends CI_Model {
	/*
	1. get old contest id (COMPARISON) from function call
	2. get old participation data from KISA_PARTICIPATIONS, using META_EDITED_USER = user id and ID = old contest id
	*/
	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	// ------------------------------------------------------------------------

	public function loadData($old_contest_id, $user_id)
	{
		echo "$old_contest_id, $user_id"; // DEBUG

		exit("\n\n<p>DEBUG END");
	}

	// ------------------------------------------------------------------------

}

/* End of file */
