<?php

//$connectionString = "file:c:\\Users\Admin\Desktop\jordi\test\prova.log";
$connectionString = "file:parse\prova.log";

//$connectionString = "pgsql:dbname=datab;host=localhost;port=5432;user=usern;password=pass";

$urlData = parse_url($connectionString);

var_dump($urlData);

if (!isset($urlData['scheme'])) {
  throw new Exception("Invalid scheme connection.\n");
}

$fileName = 'Logger/class.' . $urlData['scheme'] . 'LoggerBackend.php';

include_once($fileName);

$className = $urlData['scheme'] . 'LoggerBackend';

print "Class Name: " . $className . "\n";

if (!class_exists($className)) {
  throw new Exception("No loggind bakend available for " . $urlData['scheme']);
}

$log = $className::getInstance();
$log->logMessage('Mensaje 1 Guardado.', $className::INFO);
$log->logMessage('Mensaje 2 Guardado.', $className::WARNING);
$log->logMessage('Mensaje 3 Guardado.', $className::DEBUG);

print "Logger " . $urlData['scheme'] . " created. [END]\n";