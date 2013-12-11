<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'membership' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Memberships are required'
            )
        )
    );
}
