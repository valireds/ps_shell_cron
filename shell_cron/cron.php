<?php

/**
 * Convenient class to execute cron jobs 
 **/
class Cron
{
    private $scriptFile = null;
    private $startTime = null;
    private $endTime = null;
    private $memoryPeak = null;
    
    function __construct($scriptFile = null)
    {
        if(file_exists($scriptFile)){
            $this->scriptFile = $scriptFile;
        }
        else{
            throw new Exception('Job does not exist');
        }
    }

    public function execute()
    {
        $this->startTime = time();
        include($this->scriptFile);
        $this->endTime = time();
    }

    public function getExecutionTime()
    {
        return $this->endTime-$this->startTime;
    }

    public function getMemoryPeak()
    {
        return memory_get_peak_usage();
    }
}
