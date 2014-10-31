<?php

namespace IdnoPlugins\Cron\Pages {

    class Endpoint extends \Idno\Common\Page {

	function getContent() {
	    header('Content-Type: text/plain');

	    try {

		// Cron needs to be run with arguments
		if (empty($this->arguments[0]))
		    throw new \Exception('Sorry, you need to specify which endpoint to run!');

		// Check admin code
		$cron = \Idno\Core\site()->plugins()->get('Cron');
		if (!$cron->validateCode($this->getInput('code')))
		    throw new \Exception('Sorry, admin code doesn\'t match');

		// Now, trigger an event
		switch ($this->arguments[0]) {
		    case 'minute' :
		    case 'hourly' :
		    case 'daily'  :
		    case 'weekly' :
		    case 'monthly':
		    case 'yearly' : \Idno\Core\site()->triggerEvent("cron/{$this->arguments[0]}");
			break;
		    default:
			throw new \Exception("'{$this->arguments[0]}' is an unrecognised event.");
		}
		
	    } catch (\Exception $e) {
		echo $e->getMessage();
		\Idno\Core\site()->logging->log($e->getMessage(), LOGLEVEL_ERROR);
	    }
	}

    }

}