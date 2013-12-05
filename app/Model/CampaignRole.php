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
            'rule-1' => array(
                'rule'              => array('timeInWords'),
                'message'           => 'The grace period must be a valid phrase, such as "12 days" or "2 hours"',
             ),
            'rule-2' => array(
                'rule'              => array('maxLength', 32),
                'message'           => 'The grace period is too lengthy',
             ),
        ),
        'reminder_interval' => array(
            'rule-1' => array(
                'rule'              => array('timeInWords'),
                'message'           => 'The reminder interval must be a valid phrase, such as "12 days" or "2 hours"',
             ),
            'rule-2' => array(
                'rule'              => array('maxLength', 32),
                'message'           => 'The reminder interval is too lengthy',
             ),
        ),
    );


    public function timeInWords($check) {
        // $check will have value: "String", such as "3 days" or "152 hours"

        $value = array_values($check);
        $phrase = split (" ", $value[0]);

        $validUnits = array('minutes', 'hours', 'days', 'months', 'years');
        return count($phrase) == 2 &&               // exactly 2 components
               is_numeric($phrase[0]) &&             // component 1 is numeric
               $phrase[0] > 0 &&                    // component 1 is positive
               in_array(strtolower($phrase[1]), $validUnits);   // component 2 is a valid unit
    }
}
