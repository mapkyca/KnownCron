Cron support for Known
======================

This plugin provides Cron scheduling support for Known.

The plugin provides a crontab and endpoint which will trigger a ```cron/PERIOD``` 
event which will allow other plugins to listen to cron events and execute code 
accordingly.

Installation
------------

* Drop the Cron folder into the IndoPlugins folder of your idno installation.
* Log into known and click on Administration.
* Click "install" on the plugins page
* Go to the new Cron admin menu and enable to get your admin code.

Configuring Cron
----------------

There is a sample crontab in the plugin directory. 

You will need to configure your site URL in ```SITE```, and then configure your admin
code in ```CODE```.

Once configured, you will then need to add your crontab to an appropriate user.

See
---
 * Author: Marcus Povey <http://www.marcus-povey.co.uk> 

