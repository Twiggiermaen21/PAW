<?php
require_once dirname(__FILE__) . '/../../config.php';
require_once $conf->root_path . '/lib/smarty/Smarty.class.php';
require_once $conf->root_path . '/lib/Messages.class.php';
require_once $conf->root_path . '/app/security/LoginForm.class.php';

class login
{
    private $msgs;
    private $form;
   

    public function __construct()
    {

        $this->msgs = new Messages();
        $this->form = new LoginForm();
       
    }

    function getParamsLogin()
    {
        $this->form->login = isset($_REQUEST['login']) ? $_REQUEST['login'] : null;
        $this->form->pass = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
    }

    function validateLogin()
    {
        if (!(isset($this->form->login) && isset($this->form->pass))) {
            return false;
        }

        if ($this->form->login == "") {
            $this->msgs->addError('Nie podano loginu');
        }
        if ($this->form->pass == "") {
            $this->msgs->addError('Nie podano hasła');
        }

        if ($this->msgs->isError()) return false;

        if ($this->form->login == "admin" && $this->form->pass == "admin") {
            session_start();
            $_SESSION['role'] = 'admin';
          
            return true;
        }
        if ($this->form->login == "user" && $this->form->pass == "user") {
            session_start();
            $_SESSION['role'] = 'user';
            
            return true;
        }

        $this->msgs->addError('złe dane');
        return false;
    }

    public function process()
    {
        global $conf;
        $this->getParamsLogin();
        $smarty2 = new Smarty();
        $smarty2->assign('form', $this->form);
        $smarty2->assign('messages', $this->msgs);
       
        $smarty2->assign('conf', $conf);

        if (!$this->validateLogin()) {
            $smarty2->display($conf->root_path . '/app/security/login_view.tpl');
        } else {
            header("Location: " . $conf->action_root. 'CalcView');
        }
    }
}
