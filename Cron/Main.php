<?php

namespace IdnoPlugins\Cron {

    class Main extends \Idno\Common\Plugin {

	function registerPages() {
	    \Idno\Core\site()->addPageHandler('/cron/([A-Za-z]+)/?', '\IdnoPlugins\Cron\Pages\Endpoint');

	    \Idno\Core\site()->addPageHandler('admin/cron', '\IdnoPlugins\Cron\Pages\Admin');
	    
	    // Add menu items to account & administration screens
	    \Idno\Core\site()->template()->extendTemplate('admin/menu/items','admin/cron/menu');
	}

	function generateCode() {
	    return substr(md5(rand()), 0, 10);
	}

	function getCode() {
	    if (!isset(\Idno\Core\site()->config->config['cron']))
		return false;

	    return \Idno\Core\site()->config->config['cron']['code'];
	}

	function validateCode($code) {
	    return ($code == $this->getCode());
	}

    }

}
