<?php
App::uses('AuthComponent', 'Controller/Component');

class UserRole extends AppModel {
    public $validate = array(
        'local_name' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('notEmpty'),
            'message'           => 'The local name field is empty',
        ),
        'external_name' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('notEmpty'),
            'message'           => 'The external name field is empty',
        ),  
    );
}
