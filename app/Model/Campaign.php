<?php
App::uses('AuthComponent', 'Controller/Component');

class Campaign extends AppModel {

    public $hasMany = array(
        'CampaignsUserRole'
    );

    public $validate = array(
        'title' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('isUnique'),
            'message'           => 'A title is required',
        ),
        'html' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('notEmpty'),
            'message'           => 'The HTML field is angry',
        ),
        'active' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('boolean'),
            'message'           => 'The campaign activation boolean is required',
        ),
        'start_time' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('datetime'),
            'message'           => 'The start time is required',
        ),
        'stop_time' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('datetime'),
            'message'           => 'The stop time is required',
        ),
        'pass_percent' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('naturalNumber'),
            'message'           => 'The pass percentage is required',
        ),
        'failure_threshold'     => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('naturalNumber'),
            'message'           => 'The failure threshold (for alerting) is required',
        ),
        'questions_weighted'    => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('boolean'),
            'message'           => 'The question weighting boolean is required',
        ),
    );
}
