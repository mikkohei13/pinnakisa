<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

function participationAbbrs2Finnish($participation)
{
	if (! isset($participation[0]))
	{
		return FALSE;
	}
	
	$abbrArray = json_decode($participation[0]['species_json'], TRUE);
	
	$finnishArray = abbrKeys2Finnish($abbrArray);
	
	// remove abbr, fill in finnish
	unset($participation[0]['species_json']);
	$participation[0]['species_finnish'] = $finnishArray;
	
	return $participation;
}

function abbrKeys2Finnish($abbrArray)
{
	// Generate reference list
	// TODO: species list into database, or a fast reference list
	require "application/views/includes/birds.php";
	$birdList = Array();
	
	foreach ($bird as $speciesNumber => $arr)
	{
		if (isset($arr['sc'])) // if species
		{
			$birdList[$arr['abbr']] = $arr['fi'];
		}
	}
		
	
	$finnishArray = Array();
	foreach ($abbrArray as $abbr => $something)
	{
		$finnishArray[$birdList[$abbr]] = $something;
	}
	
	
	return $finnishArray;

}



