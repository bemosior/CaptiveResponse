<?php
App::uses('Component', 'Controller');
class CampaignManagerComponent extends Component {

    public $components = array('CampaignManager');
    
    /**
     * Determines if a user's identifier/memberships require them to complete a campaign.
     */
    public function userHasCampaigns($identifier, $memberships) {

        if ($this->getCampaigns($identifier, $this->getRelevantMemberships($memberships))) {
            return 1;
        }

        return 0;
    }


    /**
     *  Takes an array of external membership strings and finds matching internal memberships
     */
    public function getRelevantMemberships($memberships) {
        //Load the local user roles model for comparison
        $userRole = ClassRegistry::init('UserRole');

        //Find all of the user's roles that are defined.
        $relevantRoles = $userRole->find('all', array(
            'conditions' => array('UserRole.external_name' => $memberships),
            'fields'=>array('id','local_name')
        ));
        
        $memberships = array();
        foreach ($relevantRoles as $role) {
            error_log("MEMBERSHIP: " . $role['UserRole']['local_name']);
            array_push($memberships, $role['UserRole']['id']);
        }

        return $memberships;
    }

    /**
     * Determines if memberships have outstanding campaigns.
     */
    public function getCampaigns($identifier, $memberships) {

        //Load the Campaigns model
        $campaigns = ClassRegistry::init('Campaigns');

        //Complicated join to support HABTM nature of the Campaigns-UserRoles models.
        //Checks for active campaigns applicable to the user's memberships
        $availableCampaigns = $campaigns->find('all', array(
            'joins' => array(
               array('table' => 'campaigns_user_roles',
                   'alias' => 'CampaignUserRoles',
                   'type' => 'inner',
                   'conditions' => array(
                       'Campaigns.id = CampaignUserRoles.campaign_id'
                   )
               ),
               array('table' => 'user_roles',
                   'alias' => 'UserRoles',
                   'type' => 'inner',
                   'conditions' => array(
                       'CampaignUserRoles.user_role_id = UserRoles.id'
                   )
               )
            ),        
            'conditions' => array(
                'Campaigns.active' => true,
                'NOW() BETWEEN Campaigns.start_time AND Campaigns.stop_time',
                'UserRoles.id' => $memberships,

            ),
        ));

        //Check user's campaign attempts
        // --> Code

        error_log("Relevant Campaigns: " . count($availableCampaigns));

        if(count($availableCampaigns) > 0) {
            return $availableCampaigns;
        }

        return 0;
    }

}