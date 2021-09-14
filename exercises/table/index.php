<?php
declare(strict_types = 1);

require_once("ConsoleTable.php");
require_once("CountryCovidDataRow.php");
require_once("CovidTable.php");

$table = new CovidTable();
$table->load();
$table->print($table->getData());
$table->print($table->search("Latvija", "Valsts"));
