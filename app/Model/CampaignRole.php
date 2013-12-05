<?php
App::uses('AuthComponent', 'Controller/Component');

class CampaignRole extends AppModel {
    public $validate = array(
        'campaign_id' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('naturalNumber'),
            'message'           => 'The campaign is required',
        ),
        'user_role_id' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('naturalNumber'),
            'message'           => 'The user role is required',
        ),
        'grace_period' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('time'),
            'message'           => 'The grace period is required',
        ),
        'reminder_interval' => array(
            'required'          => true,
            'allowEmpty'        => false,
            'rule'              => array('time'),
            'message'           => 'The reminder interval is required',
        ),
    );
}
