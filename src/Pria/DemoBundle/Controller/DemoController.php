<?php
namespace Pria\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DemoController extends Controller {

    public function indexAction(){
        return $this->redirect($this->generateURL('home'));
    }

    public function loginAction(){
        return $this->redirect($this->generateURL('home'));
    }

    public function homeAction(){
        return $this->render('PriaDemoBundle:Home:index.html.twig');
    }

    public function securedAction(){
        $roles = $this->get('security.context')->getToken()->getRoles();
        $role = strtolower(trim(str_replace("ROLE_", "", $roles[0]->getRole())));
        return $this->redirect($this->generateURL($role.'_area'));
        //return $this->render('PriaDemoBundle:Secured:index.html.twig', array('role' => $role));
    }

    public function userAction(){
        return $this->render('PriaDemoBundle:User:index.html.twig');
    }

    public function adminAction(){
        return $this->render('PriaDemoBundle:Admin:index.html.twig');
    }
}