<?php

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
    
    public $name = 'User';

    public $useTable = "pessoas";
    
    public function beforeSave($options = array()) {
        if (!empty($this->data['User']['senha'])) {
            $this->data['User']['senha'] = AuthComponent::password($this->data['User']['senha']);
        }
        return true;
    }
}
?>