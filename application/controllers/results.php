<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends CI_Controller {

	public function summary($contest_id)
	{
		$viewdata = Array();

		// Basic data about the contest
		$this->load->model('contest_model');
		$viewdata['contest'] = $this->contest_model->load($contest_id);
		
		// Results...
		$this->load->model('results_model');
		
		// Ticks per participant
		$viewdata['summary'] = $this->results_model->summary($contest_id);

		// Location ticks
//		$viewdata['locations'] = $this->results_model->areaTicks();

		
		$this->load->view('results_summary', $viewdata);
	}
	
	// ------------------------------------------------------
	// Shows the total species list of a contest
	
	public function species($contest_id)
	{
		$viewdata = Array();
		$this->load->helper('pinna');

		// Basic data about the contest
		$this->load->model('contest_model');
		$viewdata['contest'] = $this->contest_model->load($contest_id);
		
		// Results...
		$this->load->model('results_model');
		
		// Get & count species
		$summary = $this->results_model->summary($contest_id);
		
//echo "<pre>"; print_r ($summary); echo "</pre>"; // debug
		
		$species = Array();
		$participantCount = 0;
		foreach ($summary as $participationNumber => $participation)
		{
			$partSpecies = json_decode($participation['species_json'], TRUE);
			foreach ($partSpecies as $abbr => $date)
			{
				@$species[$abbr]['count']++;
				$species[$abbr]['oneObserver'] = $participation['name']; // Set the observer name to array, replacing previous one. This data should only be used for species observed by only one person. 
			}
			$participantCount++;
		}
		
		$species = abbrKeys2Finnish($species);
		arsort($species);
		
		$viewdata['species'] = $species;
		$viewdata['participantCount'] = $participantCount;
		
		// Get my species
		if ($this->ion_auth->logged_in())
		{
			$myParticipationSummary = $this->results_model->user_summary($contest_id, $this->ion_auth->user()->row()->id);
			if (! empty($myParticipationSummary)) // if I have participated
			{
				$mySpeciesList = json_decode($myParticipationSummary[0]['species_json'], TRUE);
				$viewdata['mySpeciesAbbrs'] = $mySpeciesList; // todo: sisältää nyt countin ja henkilöänimen, näitä ei tarvita
				$mySpeciesList = abbrKeys2Finnish($mySpeciesList);
				$viewdata['mySpecies'] = $mySpeciesList;
			}
		}
		else
		{
			$viewdata['mySpecies'] = Array();
		}
		
		$this->load->view('results_species', $viewdata);
	}
	
	// ------------------------------------------------------
	// Shows a species list of one participant from a contest
	
	public function participation_html($participation_id)
	{
		$viewdata = Array();
		$this->load->model('results_model');
		$this->load->helper('pinna');
		
		$participation = $this->results_model->participation_summary($participation_id);
		
		$viewdata['participation'] = participationAbbrs2Finnish($participation);
		
		$this->load->view('results_participation_html', $viewdata);
	}
	
	// ------------------------------------------------------
	// Shows a graph of species accumulation
	
	public function graph($contest_id, $top)
	{
		$viewdata = Array();
		$this->load->model('results_model');
		$this->load->helper('pinna');
		
		// Basic data about the contest
		$this->load->model('contest_model');
		$viewdata['contest'] = $this->contest_model->load($contest_id);
		$viewdata['top'] = $top;

		$viewdata['scriptData'] = $this->results_model->ticks_js_data($contest_id, $top);
		
//		echo "<pre>";	print_r ($viewdata); // debug
		
		$this->load->view('results_graph', $viewdata);
	}

	// ------------------------------------------------------
	// Shows comparison to previous years
	
	public function comparison($contest_id)
	{
		$viewdata = Array();
		$this->load->model('results_model');
		$this->load->helper('pinna');
		
		// Basic data about the contest
		$this->load->model('contest_model');
		$viewdata['contest'] = $this->contest_model->load($contest_id);

		$viewdata['scriptData'] = $this->results_model->comparison_js_data($contest_id, $this->ion_auth->user()->row()->id);
		
//		echo "<pre>";	print_r ($viewdata); // debug
		
		$this->load->view('results_comparison', $viewdata);
	}
}


/* End of file */