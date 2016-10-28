<?php   
if (!defined('_PS_VERSION_'))
    exit;


class Shell_cron extends Module
{
	/* We recommend to not set it to true in production environment. */
	const TEST_MODE = false;

    function __construct()
    {
        $this->name = 'shell_cron';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'valireds';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_); 
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Shell Cron');
        $this->description = $this->l('Shell Cron Manager');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    public function install()
    {
        if (!parent::install())
            return false;

        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall())
            return false;

        return true;
    }
}
