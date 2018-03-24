<?php
$title = "100 lajia havainneet - 100 lintulajia";
include "page_elements/header.php";

echo "<h1><a href='/'>&laquo;</a> " . $contest['name'] . "</h1>";

//echo $this->session->flashdata('login');

if (!empty($summary))
{
	// ---------------------------------------------------------------------------------
	// Kisaajat
	
//	echo "<pre>"; print_r ($contest); echo "</pre>"; // debug

	echo "<ul>";
	echo "	<li><strong><a href=\"" . site_url("/results/species/" . $contest['id']) . "\">Kokonaislajiluettelo ja omat puutteet</a></strong></li>";
	if (! empty($contest['comparison']))
	{
		echo "	<li><strong><a href=\"" . site_url("/results/comparison/" . $contest['id']) . "\">Oma lajimäärävertailu</a></strong></li>";
	}
	echo "</ul>";

	echo "<h3>Vähintään 100 lajia havainneet</h3>";
	
	echo "<table class=\"resultTable tablesorter\" id=\"participantTable\">";
	echo "<thead>";
	echo "<tr>";
	echo "	<th>Nimi</th>";
	echo "	<th>Sijainti</th>";
	echo "	<th>Lajimäärä</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";

	$rank = 0;
	$sameRank = 1;
	$previousSpeciesCount = 0;

//	echo "<pre>"; print_r ($summary); echo "</pre>"; // debug

	foreach ($summary as $partNumber => $partArray)
	{
		echo "<tr class=\"participantRow\" id=\"" . $partArray['id'] . "\">"; // id = participation id
		echo "	<td>" . htmlspecialchars($partArray['name'], ENT_COMPAT, 'UTF-8') . "</td>";
		echo "	<td>" . htmlspecialchars($partArray['location'], ENT_COMPAT, 'UTF-8') . "</td>";
		echo "	<td>" . htmlspecialchars($partArray['species_count'], ENT_COMPAT, 'UTF-8') . "</td>";
		echo "</tr>";
	}

	echo "</tbody>";
	echo "</table>";
	
}
else
{
	echo "<p>Kukaan ei ole vielä havainnut sataa lajia.</p>";
}


$end = "";


//echo "<pre>"; print_r ($locations); echo "</pre>"; // DEBUG

include "page_elements/footer.php";
?>