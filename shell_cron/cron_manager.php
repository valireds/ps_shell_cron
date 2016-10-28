<?php
$shortopts  = "";
$shortopts .= "m:";  // Module
$shortopts .= "j:";  // Job
$shortopts .= "p:";  // Prestashop dir

$longopts  = array(
    "module:",     // module
    "job:",    // job
    "prestashop:",    // prestashop dir
);
$options = getopt($shortopts, $longopts);
if(!empty($options["p"])) $options["prestashop"] = $options["p"];
if(!empty($options["j"])) $options["job"] = $options["j"];
if(!empty($options["m"])) $options["module"] = $options["m"];

if(
    isset($options['job']) && !empty($options['job'])
    && isset($options['module']) && !empty($options['module'])
    && isset($options['prestashop']) && !empty($options['prestashop'])
){
    require($options['prestashop'].'/config/config.inc.php');
    require('cron.php');

    $script = $options['prestashop'].DS."modules".DS.$options['module'].DS.$options['job'].".cron";

    try{
        $cron = new Cron($script); 
        $cron->execute();

        echo "SUCCESS: ".$cron->getExecutionTime()." seconds\n";
    } catch (Exception $e) {
        echo 'ERROR: '.$e->getMessage()."\n";
        echo 'STACK: '.$e->getTraceAsString()."\n";
        exit(1);
    }

}
else{
    echo "ERROR: Insufficient parameters\n";
    exit(1);
}
