<?php

use Phalcon\Mvc\Controller;

class AuthController extends Controller
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

    public function loginAction()
    {

    }

    public function signinAction()
    {
        if ($this->security->checkToken()) 
            {
                $login    = $this->request->getPost("id");
                $password = $this->request->getPost("password");

                $user = Users::findFirst
                        (
                          [
                            "id = '" . $login . "'"
                          ]
                        );
                if ($user) 
                {
                    if ($password==$user->password) 
                    {
                        $this->session->set("login", $user->_id);
                        $this->flashSession->success("Successful login");
                        return $this->response->redirect("index");
                    }else
                    {
                        $this->security->hash(rand());
                        $this->flashSession->error("Unsuccessful login, please try again");
                        return $this->response->redirect("Auth/login");
                    }
                } else 
                {
                // To protect against timing attacks. Regardless of whether a user exists or not, the script will take roughly the same amount as it will always be computing a hash.
                    $this->security->hash(rand());
                    $this->flashSession->error("Unsuccessful login, please try again");
                    return $this->response->redirect("Auth/login");
                }
            }
    }
}
