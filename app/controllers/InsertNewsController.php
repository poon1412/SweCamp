<?php

use Phalcon\Mvc\Controller;

class InsertNewsController extends Controller
{
    public function onConstruct(){
        $this->assets->addCss('css/bootstrap.min.css');
        $this->assets->addCss('css/datepicker3.css');
        $this->assets->addCss('css/styles.css');
        

        

        $this->assets->addJs('js/jquery-1.11.1.min.js');
        $this->assets->addJs('js/bootstrap.min.js');
        $this->assets->addJs('js/chart.min.js');
        $this->assets->addJs('js/chart-data.js');

        $this->assets->addJs('js/easypiechart.js');
        $this->assets->addJs('js/easypiechart-data.js');
        $this->assets->addJs('js/bootstrap-datepicker.js');

        $this->assets->addJs('js/custom.js');
        
    }

    public function indexAction()
    {

    }
}
