<?php
App::uses('Component', 'Controller');
class CampaignManagerComponent extends Component {

	/**
	 * Determines if a user's identifier/memberships require them to complete a campaign.
	 */
    public function hasCampaigns($identifier, $memberships) {

        //Load the local user roles defined for comparison
        $userRole = ClassRegistry::init('UserRole');

        //Find all of the user's roles that are defined.
        $relevantRoles = $userRole->find('all', array(
            'conditions' => array('UserRole.external_name' => $memberships)
        ));

        error_log('IDENTIFIER: ' . $identifier . ', MEMBERSHIPS: ' . count($relevantRoles));
        foreach ($relevantRoles as $role) {
            error_log("MEMBERSHIP: " . $role['UserRole']['local_name']);
        }

        if ($identifier == "someidentifier") {
            return 1;
        }

        return 0;
    }

}