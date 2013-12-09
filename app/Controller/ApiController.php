<?php
/**
 * CAS User Campaign API Controller
 */
class ApiController extends AppController {

	public $components = array('RequestHandler', 'CampaignManager');
	public $layout = 'api';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view');
    }

    public function index() {	

    }

    public function view($identifier = null, $membership = null) {
        
        $identifier = utf8_decode($identifier);
        $membership = utf8_decode($membership);

        $memberships = explode('|', $membership);

        $intercept = $this->CampaignManager->hasCampaigns($identifier, $memberships);

        $this->set(array(
            'intercept' => $intercept,
            '_serialize' => array('intercept')
        ));

    }
    
}
