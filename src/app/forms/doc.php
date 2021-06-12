<?php
namespace app\forms;

use std, gui, framework, app;


class doc extends AbstractForm
{

    /**
     * @event linkAlt.action 
     */
    function doLinkAltAction(UXEvent $e = null)
    {    
        browse('https://clck.ru/TMhfo');
    }
}
