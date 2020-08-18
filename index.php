<?php
include 'functions.php';
?>
<?php
// get searching keywords
if (isset($_GET['search'])){
	$keyword_list = explode(" ", $_GET['search']);
}

$main_path = "/var/www/html/compendium/";

$final_output = array();

// search through folders selected
if (isset($_GET['folders'])) {
    foreach($_GET['folders'] as $search_folder) {
		$path = $main_path.$search_folder."/";
		$output = searchStrings($path, $keyword_list);
		foreach ($output as &$str) {
			$str = str_replace('/var/www/html', '', $str);
		}
		$final_output[$search_folder] = $output;
	}
	$folders = $_GET['folders'];
}
?>
<?php
// set API scripts
if (isset($_GET['api'])) {
	include 'api.php';
	die();
}
?>
<!DOCTYPE HTML>
<html lang="en" xml:lang="en">
<head>
	<title>data.dnd compendium</title>
	<link rel="stylesheet" href="styles/index.css">
	<script type="text/javascript">
		function toggleAll(state) {
			var checkboxes = document.getElementsByClassName('inputbox');
			var toggletext = document.getElementsByClassName('labelForButton');
			for (var i = 0; i < checkboxes.length; i++) {
				checkboxes[i].checked = state.checked;
			}
			
			toggleText();
		}
		function toggleText() {
			var checkbox = document.getElementsByClassName('toggleBox');
			var label = document.getElementsByClassName('labelForButton');
			
			label[0].innerHTML = checkbox[0].checked ? "deselect all" : "select all";		
		}
	</script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-85655994-1', 'auto');
		ga('send', 'pageview');
	</script>
</head>
<body>
<div class="topbar">
	<div class="container">
		<div class="column3"><a href="compendium">manual search</a></div>
	</div>
	<form id="SearchForm" method="get" action="index.php">
	<input type="text" name="search" value="<?php if (isset($_GET['search'])) {echo $_GET['search'];} ?>" />
	<input type="submit" value="search"/>
	<br />
	Folders:
	<input class='inputbox' id='check2' type='checkbox' name='folders[]' value='associate' <?php setCheckbox('associate', $folders); ?> /><label for='check2'>associate</label>
	<input class='inputbox' id='check3' type='checkbox' name='folders[]' value='backgrounds' <?php setCheckbox('backgrounds', $folders); ?> /><label for='check3'>backgrounds</label>
	<input class='inputbox' id='check4' type='checkbox' name='folders[]' value='class' <?php setCheckbox('class', $folders); ?> /><label for='check4'>class</label>
	<input class='inputbox' id='check5' type='checkbox' name='folders[]' value='deity' <?php setCheckbox('deity', $folders); ?> /><label for='check5'>deity</label>
	<input class='inputbox' id='check6' type='checkbox' name='folders[]' value='disease' <?php setCheckbox('disease', $folders); ?> /><label for='check6'>disease</label>
	<input class='inputbox' id='check7' type='checkbox' name='folders[]' value='epicdestiny' <?php setCheckbox('epicdestiny', $folders); ?> /><label for='check7'>epicdestiny</label>
	<input class='inputbox' id='check8' type='checkbox' name='folders[]' value='feat' <?php setCheckbox('feat', $folders); ?> /><label for='check8'>feat</label>
	<input class='inputbox' id='check9' type='checkbox' name='folders[]' value='glossary' <?php setCheckbox('glossary', $folders); ?> /><label for='check9'>glossary</label>
	<input class='inputbox' id='check10' type='checkbox' name='folders[]' value='item' <?php setCheckbox('item', $folders); ?> /><label for='check10'>item</label>
	<input class='inputbox' id='check11' type='checkbox' name='folders[]' value='monster' <?php setCheckbox('monster', $folders); ?> /><label for='check11'>monster</label>
	<input class='inputbox' id='check12' type='checkbox' name='folders[]' value='paragonpath' <?php setCheckbox('paragonpath', $folders); ?> /><label for='check12'>paragonpath</label>
	<input class='inputbox' id='check13' type='checkbox' name='folders[]' value='poison' <?php setCheckbox('poison', $folders); ?> /><label for='check13'>poison</label>
	<input class='inputbox' id='check14' type='checkbox' name='folders[]' value='power' <?php setCheckbox('power', $folders); ?> /><label for='check14'>power</label>
	<input class='inputbox' id='check15' type='checkbox' name='folders[]' value='race' <?php setCheckbox('race', $folders); ?> /><label for='check15'>race</label>
	<input class='inputbox' id='check16' type='checkbox' name='folders[]' value='ritual' <?php setCheckbox('ritual', $folders); ?> /><label for='check16'>ritual</label>
	<input class='inputbox' id='check17' type='checkbox' name='folders[]' value='terrain' <?php setCheckbox('terrain', $folders); ?> /><label for='check17'>terrain</label>
	<input class='inputbox' id='check18' type='checkbox' name='folders[]' value='theme' <?php setCheckbox('theme', $folders); ?> /><label for='check18'>theme</label>
	<input class='inputbox' id='check19' type='checkbox' name='folders[]' value='traps' <?php setCheckbox('traps', $folders); ?> /><label for='check19'>traps</label>
	<input id='checkAll' class='toggleBox' type='checkbox' name='checkAll' <?php setCheckbox('checkAll', $folders); ?> onClick='toggleAll(this)'/><label class='labelForButton' for='checkAll'>deselect all</label>
	<script>
	toggleText();
	</script>
	
	</form>
</div>
<div class="container">
	<div class="resultview">
		<iframe height="100%" width="100%" frameBorder="0" name="result"></iframe>
	</div>
	<div class="resultlist">
<?php
foreach($final_output as $key => $output) {
    echo "<b> - $key</b><br>";
    if (count($output) > 0) {
        foreach($output as $result_url) {	
            $result_name = getName($result_url);
            echo "<a href=\"$result_url\" target=\"result\">$result_name</a><br>";
        }
    } else {
        echo "<font>No result</font><br>";
    }
    echo "<br>";
}
?>
	</div>
</div>
