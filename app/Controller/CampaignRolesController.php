<?php


class CampaignRolesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter(); 
    }

    public function index() {
        $this->CampaignRole->recursive = 0;
        $this->set('campaign_roles', $this->paginate());
    }

    public function view($id = null) {
        $this->CampaignRole->id = $id;
        if (!$this->CampaignRole->exists()) {
            throw new NotFoundException(__('Invalid campaign_role'));
        }
        //$this->set('campaign_role', $this->CampaignRole->read(null, $id));
        $this->request->data = $this->CampaignRole->read(null, $id);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->CampaignRole->create();
            if ($this->CampaignRole->save($this->request->data)) {
                $this->Session->setFlash(__('The campaign_role has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The campaign_role could not be saved. Please, try again.'));
        }
    }

    public function edit($id = null) {
        $this->CampaignRole->id = $id;
        if (!$this->CampaignRole->exists()) {
            throw new NotFoundException(__('Invalid campaign_role'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->CampaignRole->save($this->request->data)) {
                $this->Session->setFlash(__('The campaign_role has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The campaign_role could not be saved. Please, try again.'));
        } else {
            $this->request->data = $this->CampaignRole->read(null, $id);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->CampaignRole->id = $id;
        if (!$this->CampaignRole->exists()) {
            throw new NotFoundException(__('Invalid campaign_role'));
        }
        if ($this->CampaignRole->delete()) {
            $this->Session->setFlash(__('CampaignRole deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('CampaignRole was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
