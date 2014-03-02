<?php
$title = "Pinnakisa";
include "page_elements/header.php";

echo "<h1>" . $contest['name'] . "</h1>";

//echo $this->session->flashdata('login');

if (!empty($summary))
{
/*
	// TODO: siirrä muualle
	// Location contests
	if (!empty($locations['speciesCounts']))
	{
		// ---------------------------------------------------------------------------------
		// Alueet


		echo "<table class=\"resultTable\">";
		echo "<tr>";
		echo "	<th>Alue</th>";
		echo "	<th>Pinnat</th>";
		echo "</tr>";

		foreach ($locations['speciesCounts'] as $loc => $count)
		{
			echo "<tr>";
			echo "	<td>" . $loc . "</td>";
			echo "	<td>" . $count . "</td>";
			echo "</tr>";
		}

		echo "</table>";



		// ---------------------------------------------------------------------------------
		// Lajit

		require "includes/birds.php";

		echo "<table class=\"resultTable locations\">";
		echo "<tr>";
		echo "	<th>Laji</th>";
		foreach ($locations['locations'] as $loc => $tickArr)
		{
			echo "<th class=\"locationHeader\">$loc</th>";
		}
		echo "	<th>Yht.</th>";
		echo "</tr>";

		$ticksTotal = 0;
		foreach ($bird as $number => $birdArr)
		{
			$row = "";
			if (@$birdArr['sc'])
			{
				$row .= "<tr>
							<td>" . $birdArr['fi'] . "</td>";

				$ticksTotal = 0;
				foreach ($locations['locations'] as $loc => $tickArr)
				{
					if (1 == @$tickArr[$birdArr['abbr']])
					{
						$row .= "<td>X</td>";
						$ticksTotal++;
					}
					else
					{
						$row .= "<td>&nbsp;</td>";
					}
				}
				
				$row .= "	<td>" . $ticksTotal . "</td>";
				$row .= "</tr>";
			}
			
			// Print only rows with observation(s)
			if ($ticksTotal > 0)
			{
				if (1 == $ticksTotal)
				{
					$row = str_replace("<tr", "<tr class=\"ace\"", $row);
				}
				echo $row;
			}
		}

		echo "</table>";
		
	}
*/
	// ---------------------------------------------------------------------------------
	// Kisaajat
	
//	echo "<pre>"; print_r ($summary); echo "</pre>"; // debug

	echo "<ul>";
	echo "	<li><strong><a href=\"" . site_url("/results/species/" . $contest['id']) . "\">Kisan lajiluettelo ja omat puutteet</a></strong></li>";
	echo "	<li><strong>Pinnakertymä: <a href=\"" . site_url("/results/graph/" . $contest['id'] . "/50") . "\">Top 50</a> | <a href=\"" . site_url("/results/graph/" . $contest['id'] . "/1000") . "\">Kaikki</a></strong></li>"; // limit to 1000 = everyone
	echo "</ul>";
	
	echo "<p>Klikkaamalla osallistujan nimeät näen hänen pinnalistansa.</p>";

	echo "<table class=\"resultTable\" id=\"participantTable\">";
	echo "<tr>";
	echo "	<th>Sija</th>";
	echo "	<th>Nimi</th>";
	echo "	<th>Sijainti</th>";
	echo "	<th>Pinnat</th>";
	echo "	<th title=\"Osallistujan ilmoittama spontaanien lajien määrä.\">Spondet</th>";
	echo "</tr>";

	$rank = 1;
	$previousSpeciesCount = 0;
	foreach ($summary as $partNumber => $partArray)
	{
		echo "<tr class=\"participantRow\" id=\"" . $partArray['id'] . "\">"; // id = participation id
		if ($previousSpeciesCount == $partArray['species_count'])
		{
			echo "<td>&nbsp;</td>";
		}
		else
		{
			echo "<td>$rank.</td>";
		}
		echo "	<td>" . htmlspecialchars($partArray['name'], ENT_COMPAT, 'UTF-8') . "</td>";
		echo "	<td>" . htmlspecialchars($partArray['location'], ENT_COMPAT, 'UTF-8') . "</td>";
		echo "	<td>" . htmlspecialchars($partArray['species_count'], ENT_COMPAT, 'UTF-8') . "</td>";
		if ($partArray['spontaneous'] > 0)
		{
			echo "	<td>" . htmlspecialchars($partArray['spontaneous'], ENT_COMPAT, 'UTF-8') . "</td>";
		}
		else
		{
			echo "	<td>&nbsp;</td>";
		}
		echo "</tr>";
		
		$previousSpeciesCount = $partArray['species_count'];
		$rank++;
	}

	echo "</table>";
	
	echo "<div id=\"tickList\"></div>";
	
	

}
else
{
	echo "<p>Kukaan ei ole vielä osallistunut tähän kisaan.</p>";
}


$end = "
<script>

$( '.participantRow' ).click(function()
{
	var id = $(this).attr('id');

	jQuery.ajax({
		url:'<?php echo base_url(); ?>index.php/results/participation_html/'+id,
	})
	.done(function(html) {
			$('.selectedRow').removeClass('selectedRow');
			$('#tickList').html(html);
			$('#'+id).addClass('selectedRow');
	});
});

</script>
";


//echo "<pre>"; print_r ($locations); echo "</pre>"; // DEBUG

include "page_elements/footer.php";
?>