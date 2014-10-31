<?php

    namespace IdnoPlugins\Cron\Pages {

        /**
         * Default class to serve Buffer settings in administration
         */
        class Admin extends \Idno\Common\Page
        {

            function getContent()
            {
                $this->adminGatekeeper(); // Admins only
                $t = \Idno\Core\site()->template();
                $body = $t->draw('admin/cron');
                $t->__(['title' => 'Cron', 'body' => $body])->drawPage();
            }

            function postContent() {
                $this->adminGatekeeper(); // Admins only
		
		$cron = \Idno\Core\site()->plugins()->get('Cron');
		
		if (!$cron->getCode()) {
		    // Create new code
		    
		    \Idno\Core\site()->config->config['cron'] = [
			'code' => $cron->generateCode()
		    ];
		}
		else
		{
		    // Unset cron
		    \Idno\Core\site()->config->config['cron'] = [
			'code' => false
		    ];
		}
		
                \Idno\Core\site()->config()->save();
                \Idno\Core\site()->session()->addMessage('Your Cron details were saved.');
                $this->forward('/admin/cron/');
            }

        }

    }