<?php


class CampaignsUserRolesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter(); 
    }

    public function index() {
        $this->CampaignsUserRole->recursive = 0;
        $this->set('campaigns_user_roles', $this->paginate());
    }

    public function view($id = null) {
        $this->CampaignsUserRole->id = $id;
        if (!$this->CampaignsUserRole->exists()) {
            throw new NotFoundException(__('Invalid campaigns_user_role'));
        }

        //Retrieve campaigns for pre-population of FK "campaign_id"
        $this->loadModel('Campaign');
        $this->set('campaigns', $this->Campaign->find('list'));

        //Retrieve user roles for pre-population of FK "user_role_id"
        $this->loadModel('UserRole');
        $this->set('userRoles', $this->UserRole->find('list'));

        $this->request->data = $this->CampaignsUserRole->read(null, $id);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->CampaignsUserRole->create();
            if ($this->CampaignsUserRole->save($this->request->data)) {
                $this->Session->setFlash(__('The campaigns_user_role has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The campaigns_user_role could not be saved. Please, try again.'));
        }

        //Retrieve campaigns for pre-population of FK "campaign_id"
        $this->loadModel('Campaign');
        $this->set('campaigns', $this->Campaign->find('list'));

        //Retrieve user roles for pre-population of FK "user_role_id"
        $this->loadModel('UserRole');
        $this->set('userRoles', $this->UserRole->find('list'));
    }

    public function edit($id = null) {
        $this->CampaignsUserRole->id = $id;

        if (!$this->CampaignsUserRole->exists()) {
            throw new NotFoundException(__('Invalid campaigns_user_role'));
        }

        //Retrieve campaigns for pre-population of FK "campaign_id"
        $this->loadModel('Campaign');
        $this->set('campaigns', $this->Campaign->find('list'));
        
        //Retrieve user roles for pre-population of FK "user_role_id"
        $this->loadModel('UserRole');
        $this->set('userRoles', $this->UserRole->find('list'));

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->CampaignsUserRole->save($this->request->data)) {
                $this->Session->setFlash(__('The campaigns_user_role has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The campaigns_user_role could not be saved. Please, try again.'));
        } else {

            $this->request->data = $this->CampaignsUserRole->read(null, $id);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->CampaignsUserRole->id = $id;
        if (!$this->CampaignsUserRole->exists()) {
            throw new NotFoundException(__('Invalid campaigns_user_role'));
        }
        if ($this->CampaignsUserRole->delete()) {
            $this->Session->setFlash(__('CampaignsUserRole deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('CampaignsUserRole was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
