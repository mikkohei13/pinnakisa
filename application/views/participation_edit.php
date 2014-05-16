<?php
$title = "Pinnakisa";
$script = "
<script>
	//	$.datepicker.formatDate('ISO_8601', date, settings)
	$(function() {
		$.datepicker.setDefaults( $.datepicker.regional[ 'fi' ] );
		$('.datepicker').datepicker({
			maxDate: '0' // tämä sivukohtaiseksi
		});
	});
	// DATE FIELD: datepicker
	$(function() {
	  $('.datepicker').click(function() {
		$(this).css('border', 'none');
		$(this).parent().find('.del').css('display', 'inline');
		$(this).parent().find('.sp').css('font-weight', 'bold');
		event.preventDefault(); // Prevents keyboard in mobile; this has to be the last rule b/c Firefox 24.0 won't apply (CSS) rules after this.
	  });
	});
	// SPECIES NAME: today's date
	$(function() {
	  $('.sp').click(function() {
		$(this).parent().find('.datepicker').datepicker('setDate', new Date()).css('border', 'none');
		$(this).parent().find('.del').css('display', 'inline');
		$(this).parent().find('.sp').css('font-weight', 'bold');
	  });
	});
	// DELETE: remove date
	$(function() {
	  $('.del').click(function() {
		$(this).parent().find('.datepicker').val('').css('border', '1px solid #ccc');
		$(this).parent().find('.del').css('display', 'none');
		$(this).parent().find('.sp').css('font-weight', 'normal');
	  });
	});


	$(document).ready(function() {

		// Add action to form so that submit works
		$('#participation-form').attr({
		  action: '" . base_url() . "index.php/participation/edit/" . @$editableData['id'] . "'
		});

		// Enable submit button
		$('.submit-button').prop('disabled', false);

		// Fade info message out
		$( '#infoMessage' ).delay(4000).fadeOut(1000, function() {
			// Animation complete.
		});
	});





 </script>
";
include "page_elements/header.php";
?>

<div id="contestToTakePart">

<h1>
<em>Osallistuminen kisaan</em> 
<?php
echo $contest['name'];
echo " (<a href=\"" . site_url("results/summary") . "/" . $contest['id'] . "\">tulokset</a>)";

?>
</h1>

<?php
if (@$alreadyTakenPart)
{
	echo "<p id=\"alreadyParticipated\">Olet jo osallistunut tähän kisaan. Voit kuitenkin osallistua uudelleen toisella alueella, mikäli kisan säännöt sen sallivat.</p>";
}
?>

<p>
<?php
// echo "Kilpailuaika: " . $contest['date_begin'] . "&ndash;" . $contest['date_end'];
// echo "<a href=\"" . $contest['url'] . "\" target=\"_blank\">Lue lisää &raquo;</a>";
?>
 
</p>

<?php
$flash = $this->session->flashdata('flash');
if (! empty($flash))
{
	echo "<div id=\"infoMessage\">" . $flash . " " . validation_errors() . "</div>";
}
?>

</div>

<?php
// echo "<pre>ARRAY: "; print_r ($editableData); echo "</pre>"; // debug

$submitButton = "";
if ("published" == $contest['status'])
{
//	echo form_open("foo", array('id' => 'participation-form'));
	echo "<form action method=\"post\" accept-charset=\"utf-8\" id=\"participation-form\"> ";

	$submitButton = "<p><input type=\"submit\" class=\"submit-button\" value=\"Tallenna\"  disabled=\"disabled\" /></p>";
}
elseif ("archived" == $contest['status'])
{
	echo "<p id=\"notification\">Tähän kisaan osallistuminen on päättynyt, eikä kilpailutietoja voi enää muokata.</p>";
}
else
{
	echo "<p id=\"notification\">Tämä kisa ei ole nyt käynnissä, eikä kilpailutietoja voi muokata.</p>";
}

?> 

<input type="hidden" name="contest_id" value="<?php echo @$editableData['contest_id']; ?>" />

<p class="required">Nimesi (Etu- ja sukunimi)<!-- tai joukkueesi jäsenten nimet--></p>
<input type="text" name="name" class="required" value="<?php echo @$editableData['name']; ?>" size="50" />

<p class="required"><!--Kilpailualue (ks. kisan tiedoista mitä tarkoittaa)-->Kotipesä (Kunta, Paikka)</p>

<?php
if (@$locationArray)
{
	$dropdown = form_dropdown('location', $locationArray, @$editableData['location']);
	echo str_replace("<select", "<select class=\"required\"", $dropdown);
}
else
{
	echo "<input type=\"text\" name=\"location\" value=\"" . @$editableData['location'] . "\" size=\"30\" />";
}

?>

<p>Kuljetut kilometrit</p>
<input type="text" name="kms" value="<?php echo @$editableData['kms']; ?>" size="10" /> km
<?php
if ($editableData['kms'] > 0)
{
	echo "<span class=\"myStats\"> = " . round(($editableData['kms'] / $editableData['species_count']), 1) . " km/pinna</span>";
}
?>

<p>Retkeillyt tunnit</p>
<input type="text" name="hours" value="<?php echo @$editableData['hours']; ?>" size="10" /> h
<?php
if ($editableData['hours'] > 0)
{
	echo "<span class=\"myStats\"> = " . round(($editableData['hours'] / $editableData['species_count']), 1) . " h/pinna</span>";
}
?>

<p>Spontaanien lajien määrä</p>
<?php
// TODO: tämä elegantimmin, modelissa?
$sponde = @$editableData['spontaneous'];
if (0 == $sponde)
{
	$sponde = "";
}

?>
<input type="text" name="spontaneous" value="<?php echo $sponde; ?>" size="10" /> 

<?php
echo $submitButton;

echo "<h4>Havaitut lajit ";
if (isset($editableData['species_count']))
{
	echo "(" . $editableData['species_count'] . ")";
}
echo "</h4>";
echo "<p>Klikkaa lajin nimeä jos havaitsit lajin tänään, tai päivämääräkenttää jos havaitsit sen aiemmin.</p>";

include "application/views/includes/birds.php";
echo "<div id=\"speciesList\">\n";
foreach ($bird as $key => $arr)
{
	if (@$arr['sc'])
	{
		$setClass = "";
		if (!empty($editableData['species'][$arr['abbr']])) // TODO: pitäisikö tyhjät solut kokonaan poistaa (modelissa)
		{
			$setClass = " isSet";
		}
		echo "<p class=\"$setClass\"><em class=\"sp\">" . $arr['fi'];
		$vn = "species[" . $arr['abbr'] . "]";
		echo "</em> <input type=\"text\" class=\"datepicker\" name=\"$vn\" value=\""	. set_value($vn, @$editableData['species'][$arr['abbr']]) . "\" size=\"8\" readonly />";
		echo "<span class=\"del\">X</span>\n";
		echo "</p>\n";
	}
	else
	{
		echo "<h5>" . $arr['abbr'] . "</h5>";
	}
}
echo "</div>";

echo $submitButton;
if ("published" == $contest['status'])
{
	echo "</form>";
}

include "page_elements/footer.php";
?>