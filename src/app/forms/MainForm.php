<?php
namespace app\forms;

use std, gui, framework, app;
use bundle\windows\WindowsException;
use bundle\windows\Windows;


class MainForm extends AbstractForm
{

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {    
        unlink('start.bat');
        $this->label3->text = 'Файл удалён.';
        $fn = "start.bat";
        $this->label3->text = 'Создание файла.';
        $file = fopen($fn, "a+");
        $this->label3->text = 'Открытие файла.';
        $size = filesize($fn);
        fwrite($file, 'avrdude -v -patmega328p -c arduino -P com');
        fwrite($file, $this->editAlt->text);
        fwrite($file, ' -b 57600 -D -U flash:w:"');
        fwrite($file, $this->edit->text);
        fwrite($file, '":i');
        fclose($file);
        $this->label3->text = 'Запись файла.';
        execute('start.bat');
        $this->label3->text = 'Запуск AVRDude. Программа выполнена.';
        $this->systemTray->displayMessage("AGWrite 1.3", "Программа выполнена");
    }

    /**
     * @event link.action 
     */
    function doLinkAction(UXEvent $e = null)
    {    
        
    }

    /**
     * @event close 
     */
    function doClose(UXWindowEvent $e = null)
    {    
        
    }

    /**
     * @event construct 
     */
    function doConstruct(UXEvent $e = null)
    {
        if (!Windows::isAdmin()) {
            alert("Программа бла открыта с обычными правами, но ей нужны права администратора. Разрешите открыть программу с правами администратора для продолжения.");
            Windows::requireAdmin();
        }
    }
}
