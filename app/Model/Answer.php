<?php
App::uses('AuthComponent', 'Controller/Component');

class Answer extends AppModel {
    public $validate = array(
        'question_id' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('naturalNumber'),
            'message'           => 'The question is required',
        ),
        'html' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('notEmpty'),
            'message'           => 'The HTML field is angry',
        ),
        'explanation' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('notEmpty'),
            'message'           => 'The explanation field is angry',
        ),
        'correct' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('boolean'),
            'message'           => 'The correct boolean is required',
        ),
        'weight' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('naturalNumber'),
            'message'           => 'The weight is required',
        ),
    );
}
