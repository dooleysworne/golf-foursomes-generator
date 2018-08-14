<?php //include("userauth.php"); 
session_start();
$SESSION["radios"] = $_REQUEST["radios"];
$d=$SESSION["radios"];
?>
<html>
<head>
<title>Disc Golf Player Foursomes/Threesomes/Twosomes Randomizer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
.input_fields_wrap{
max-width: 350px;
}
.input_fields_wrap input[type=text]{
 width:100%;
 margin:2px 0;
}
H4 {
   color: red;
   font-size: 20px;
   font-weight: bold;
   font-family: arial,tahoma,verdana,sans-serif;
 }
</style>
</head>
<body>
<?php

$radio_options = array('3' => 'Threesomes/Twosomes','4' => 'Foursomes/Threesomes',);

if (count($_REQUEST, 1) > 0) {
	unset($_SESSION['form']);

foreach ($_REQUEST as $key=>$value) {
	$_SESSION['form'][$key] = $value;
}

foreach ($_SESSION['form'] as $key=>$value) {
	$$key = $value;
	
  }
}
?>

<div class="w3-responsive w3-margin">
[ Go To <a href="doubles.php" target="_blank">Doubles Randomizer</a> ]
<H4>FOURSOMES/THREESOMES/TWOSOMES RANDOM GENERATOR</H4>
<hr>
<form name="form" method="REQUEST" action="<?php echo $_SESSION['PHP_SELF'] ?>">
<table>
<tr>
<td valign="top"><b>Choose One</b></td>
<td>
<?php
foreach ($radio_options as $k=>$v) {
echo '<tr><td>' . $v . '</td><td>';
if ($radios == $k) {
echo '<input name="radios" type="radio" value="' . $k . '" checked="checked" />';
}
else {
echo '<input name="radios" type="radio" value="' . $k . '" />';
}
echo '</td></tr>';
}
?>
</table>
</form>
<?php 
if($d != '') {
echo "<fieldset>Your groups will have a maximimum number of " . $d . " players in them</fieldset>"; 
}

?>
<?php
if(!$_REQUEST["checkbox"]) {
echo "<b>Use The Checkboxes Below To Select Players For Groups To Play Today</b>";
echo "<fieldset>";
?>
<form name="form2" action="<?php echo $_SESSION['PHP_SELF'] ?>" method="REQUEST" id="panelone">
<input name="max" type="hidden" value="<?php echo $d; ?>">

<table border="0" class="w3-table-all">
<tr class="w3-red">
<th>SELECT</th>
<th>PLAYER</th>
</tr>
<?php
$i = 0;
$csv = array();
$enclosure = '"';
$row = file('players.txt', FILE_IGNORE_NEW_LINES);
    $num = count($row);

echo "There are ".$num." players in the listing<br/>";

foreach ($row as $key => $value) {
    $csv[$key] = str_getcsv($value,$enclosure);

?>
<tr>
<td align="center" bgcolor="#FFFFFF">
<input class="w3-check" name="checkbox[]" type="checkbox" value="<?php echo $csv[$key][0];?>" />
</td>
<td align="center">
<input name="user[]" type="hidden" id="user" value="<?php echo $csv[$key][0];?>"><?php echo $csv[$key][0]; ?>
</td>
</tr>
<?php
 $i++;
 }
?>

<button type="button" class="add_field_button">Add Player Field</button>
<button type="button" class="remove_field_button">Remove Player Field</button>
<br/>
<label><input type="checkbox" name="checkbox" class="selectall"/> Select All Players</label>
<div class="input_fields_wrap">
</div>

<?php
echo "</table>";
echo "<br><input type=\"submit\" value=\"Group These Players\" \>";
echo "</form>";
}

if($_REQUEST['checkbox']) {
echo "<br/>";
echo "<div class='w3-responsive w3-margin-left'>";
echo "<a href=\"foursomes.php\" class='w3-button w3-red'>Reset</a>";
echo "&nbsp;&nbsp;";
echo "<button class='w3-button w3-red' onclick=\"myFunction()\">Mix This List Again</button>";
echo "<br><br>\n";
echo "</div>";
if(!$_REQUEST["radios"] && $_REQUEST["max"]=='') {
echo "<fieldset><b>Oops! Please Click the Reset Button and Select Threesomes/Twosomes or Foursomes/Threesomes First</fieldset>"; 
die();
}
echo "<fieldset class='w3-responsive w3-margin'>";
echo "<legend><b>RESULTS</b></legend>\n";

// Get values from form and put them in an array
$players = $_REQUEST['checkbox'];
$addplayers = $_REQUEST['user2'];

if($addplayers != '') {
  $players = array_merge($players,$addplayers);
}

if (in_array('',$players,true)) {
  echo "Hmmm . . . your list contains empty spaces.<br/>";
  echo "You better <a href='foursomes.php'>go back</a> and try it again.<br/>";
  die();
}

// Randomize the values in the array
shuffle($players);

// Count the elements in the array
$howmany = count($players);

echo "<i>There are ".$howmany." golfers arranged in ";

if(!$_SESSION['$radios'] || $d = '') {
$d = $_REQUEST['max'];
}
if($howmany<'6') { $numgroups = '1'; } else {
$numgroups = ceil($howmany/$d);
}
echo $numgroups." groups</i><br/><br/>";

$groups = array();

for ($index=0; $index < $numgroups; $index++) {
	array_push($groups,array());
}

for ($index = 0; $index < $howmany; $index++) {
	array_push($groups[$index%$numgroups],$players[$index]);
    }

for ($index=0; $index < $numgroups; $index++) {
	$count = $index+1;
	echo "<b><font color='#F44336'>Group ".$count."</font></b><br/>";
	for ($index2=0; $index2 < count($groups[$index]); $index2++) {
		echo "<li>".$groups[$index][$index2]."</li>";
	}
}

echo "</fieldset>";
echo "<div class='w3-container w3-margin-left'>";
echo "<br/>";
echo "Click the asterisk at the lower left to manage the player listing. The management panel will open in a new window or tab.";
echo "<br/>";
echo "</div>";
echo "</div>";
 }
?>
<div class='w3-margin-left'><a href="manage.php" target="_blank">*</a></div>
</body>
<script>
function myFunction() {
    location.reload();
}

$('input[type=radio]').on('change', function() {
    $(this).closest("form").submit();
});

</script>

<script>
var max_fields      = 16;
var wrapper         = $(".input_fields_wrap");
var add_button      = $(".add_field_button");
var remove_button   = $(".remove_field_button");

$(add_button).click(function(e){
	e.preventDefault();
	var total_fields = wrapper[0].childNodes.length;
	if(total_fields < max_fields){
		$(wrapper).append('<tr><td align="center" bgcolor="#FFFFFF">NEW PLAYER:</td><td align="center"><input type="text" name="user2[]" id="user" class="field-long"></td></tr>');
	}
});
$(remove_button).click(function(e){
	e.preventDefault();
	var total_fields = wrapper[0].childNodes.length;
	if(total_fields>1){
		wrapper[0].childNodes[total_fields-1].remove();
	}
});

$('.selectall').click(function() {
    if ($(this).is(':checked')) {
        $('input:checkbox').attr('checked', true);
    } else {
        $('input:checkbox').attr('checked', false);
    }
});
</script>
</html>
