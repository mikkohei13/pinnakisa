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
		$query_array = array(
			'contest_id' => $old_contest_id,
			'meta_edited_user' => $user_id
			);

		$query = $this->db->get_where('kisa_participations', $query_array);
		
		if (! isset($query))
		{
			exit("Tietokantavirhe 2. Ota yhteyttä webmasteriin.");
		}

		$data = $query->row_array(); // return one row as an associative array

		// Ticks from JSON
		$data['ticks_day'] = json_decode($data['ticks_day_json'], TRUE);
		unset($data['ticks_day_json']);

		// Species from JSON
		$data['species'] = json_decode($data['species_json'], TRUE);
		unset($data['species_json']);


//		print_r ($data); // debug
//		echo "$old_contest_id, $user_id"; // DEBUG
//		exit("\n\n<p>DEBUG END");


		return $data;
	}

	// ------------------------------------------------------------------------

}

/* End of file */
