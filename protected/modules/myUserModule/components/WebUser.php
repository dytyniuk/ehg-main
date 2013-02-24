<?php 
class WebUser extends CWebUser
{
    public $loginUrl = array('/myUserModule/default/login'); // change to your own
    private $_model;
    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
    


    public function getRole() {
        if($user = $this->getModel()){
            // в таблице User есть поле role
            return $user->role;
        }
    }

    
    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
        }
        return $this->_model;
    }


    public function checkAccess($operation, $params=array())
    {
        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }
        $role = $this->getRole();
        if ($role === 'administrator') {
            return true; // admin role has access to everything
        }
        
        $r_checker = new RightsChecker($operation, $this->id, $role, $params);
        return $r_checker->check();
    }

}

?>