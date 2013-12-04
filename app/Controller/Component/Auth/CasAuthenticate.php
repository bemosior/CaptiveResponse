<?php

/** 
 * We're working from a base file in Tom Dalling's CAS4Cake 
 * (https://github.com/jcu-eresearch/CAS4Cake)
 */

App::uses('BaseAuthenticate', 'Controller/Component/Auth');

App::import('Vendor', 'CAS/CAS');

class CasAuthenticate {
    private $_Collection = NULL;

    function __construct($collection, $settings) {
        $this->_Collection = $collection;

        if(Configure::read('CAS.debug_log_enabled')){
            phpCAS::setDebug(TMP . 'phpCas.log');
        }

        phpCAS::client(CAS_VERSION_2_0,
                       Configure::read('CAS.hostname'),
                       Configure::read('CAS.port'),
                       Configure::read('CAS.uri'));
	    phpCAS::setNoCasServerValidation();

//        phpCAS::setCasServerCACert(Configure::read('CAS.cert_path'));
    }

    public function unauthenticated(CakeRequest $request, CakeResponse $response) {
        $this->authenticate($request, $response);
    }

    public function authenticate(CakeRequest $request, CakeResponse $response) {
        phpCAS::forceAuthentication();
        return array('username' => phpCAS::getUser());
    }

    public function getUser($request) {
        return FALSE;
        /* Not sure if this makes sense yet.

            $username = env('PHP_AUTH_USER');
        
            if (empty($username)) {
                return false;
            }
            return $this->_findUser($username);
        */
    }

    public function logout($user) {
        if(phpCAS::isAuthenticated()){
            //Step 1. When the client clicks logout, this will run.
            //        phpCAS::logout will redirect the client to the CAS server.
            //        The CAS server will, in turn, redirect the client back to
            //        this same logout URL.
            //
            //        phpCAS will stop script execution after it sends the redirect
            //        header, which is a problem because CakePHP still thinks the
            //        user is logged in. See Step 2.
            $current_url = Router::url(null, true);
            phpCAS::logout(array('url' => $current_url));
        } else {
            //Step 2. This will run when the CAS server has redirected the client
            //        back to us. Do nothing in this method, then after this method
            //        returns CakePHP will do whatever is necessary to log the user
            //        out from its end (destroying the session or whatever).
        }
    }
}
