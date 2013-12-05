<?php
App::uses('AuthComponent', 'Controller/Component');

class Question extends AppModel {
    public $validate = array(
        'campaign_id' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('naturalNumber'),
            'message'           => 'The campaign is required',
        ),
        'html' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('notEmpty'),
            'message'           => 'The HTML field is angry',
        ),
        'answers_weighted' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('boolean'),
            'message'           => 'The answers weighted boolean is required',
        ),
        'weight' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('naturalNumber'),
            'message'           => 'The weight is required',
        ),
        'multiple_answers'    => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('boolean'),
            'message'           => 'The multiple answers boolean is required',
        ),
    );
}
