<?php
App::uses('AuthComponent', 'Controller/Component');

class Attempts extends AppModel {
    public $validate = array(
        'user_identifier' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('notEmpty'),
            'message'           => 'The user identifier is required',
        ),
        'campaign_id' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('naturalNumber'),
            'message'           => 'The campaign is required',
        ),
        'start_time' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('datetime'),
            'message'           => 'The start time is required',
        ),
        'last_skip' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('datetime'),
            'message'           => 'The last skip time is required',
        ),
        'score' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('naturalNumber'),
            'message'           => 'The score is required',
        ),
        'attempts' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('naturalNumber'),
            'message'           => 'The attempt number is required',
        ),
    );
}
