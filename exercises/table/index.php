<?php
declare(strict_types = 1);

require_once("ConsoleTable.php");
require_once("CountryCovidDataRow.php");
require_once("Table.php");

$table = new Table();
$table->print();
$table->print($table->search("Latvija", "Valsts"));
