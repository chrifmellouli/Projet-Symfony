<?php

namespace CovoiturageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Covoiturage/Default/index.html.twig');
    }
    
    public function exceptionAction(){
    	return $this->render('@Covoiturage/Default/exception.html.twig');
    }
}
