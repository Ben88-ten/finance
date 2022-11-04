
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

.csvTable{
    font-size: 10pt;
    border-top: 1px solid #ccc;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    color: #777;
}

.csvTable th{
    text-align:left;
    border-bottom: 1px solid #ccc;
}

.csvTable td{
    border-bottom: 1px solid #ccc;
}

</style>

<?php



$hasTitle = true;

echo '<table border="0" cellspacing="0" cellpadding="5" width="500" class="csvTable">';


$handle = fopen("datenf.csv", "r");
$start = 0;
$datum = $_POST["datum"];

while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
{

    echo '<tr>' . "\n";

  for ( $x = 0; $x < count($data); $x++)
    {
    if ($start == 0 && $hasTitle == true)
        echo '<th>'.$data[$x].'</th>' . "\n";
    else
        echo '<td>'.$data[$x].'</td>' . "\n";
    }

    $start++;

    echo '</tr>' . "\n";

}

fclose($handle);

echo '</table>';

?>

<p> Gesamtausgaben: </p>

<?php


$filename = 'datenf.csv';

// The nested array to hold all the arrays
$the_big_array = [];

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE)
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  while (($data = fgetcsv($h, 1000, ";")) !== FALSE)
  {
    // Each individual array is being pushed into the nested array

    $the_big_array[] = $data[3];

  }

  // Close the file
  fclose($h);


}

$gesamt =  (array_sum($the_big_array));



?>

<h3>Die Gesatamt ausgaben sind <u><?php echo $gesamt?>EURO !</u></h3>







<p> Zurück zum Eingabeformular<a href="/Finanzen/finanzenqay321.html">Adress-Eingabe-Formular</a>