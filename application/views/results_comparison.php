<?php
$title = "Pinnakisa";
$script = "
	<script src=\"http://biomi.kapsi.fi/tools/tringa-eko/include/highcharts.js\"></script>
	<script src=\"http://biomi.kapsi.fi/tools/tringa-eko/include/exporting.js\"></script>
";
include "page_elements/header.php";

//echo "<pre>"; print_r ($species); echo "</pre>"; // debug

echo "<h1><a href=\"" . site_url("/results/summary/" . $contest['id']) . "\">&laquo;</a> " . htmlspecialchars($contest['name'], ENT_COMPAT, 'UTF-8') . "</h1>";

echo "<h3>Vertailu viime vuoteen</h3>";

if (! empty($scriptData))
{
	echo "<div id=\"container\" style=\"min-width: 400px; height: 800px; margin: 0 auto\"></div>";
	echo $scriptData;
}
else
{
	echo "<p>Kukaan ei ole vielä osallistunut tähän kisaan.</p>";
}


include "page_elements/footer.php";

?>