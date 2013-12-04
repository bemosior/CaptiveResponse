<?php


class CampaignsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter(); 
    }

    public function index() {
        $this->Campaign->recursive = 0;
        $this->set('campaigns', $this->paginate());
    }

    public function view($id = null) {
        $this->Campaign->id = $id;
        if (!$this->Campaign->exists()) {
            throw new NotFoundException(__('Invalid campaign'));
        }
        $this->set('campaign', $this->Campaign->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Campaign->create();
            if ($this->Campaign->save($this->request->data)) {
                $this->Session->setFlash(__('The campaign has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The campaign could not be saved. Please, try again.'));
        }
    }

    public function edit($id = null) {
        $this->Campaign->id = $id;
        if (!$this->Campaign->exists()) {
            throw new NotFoundException(__('Invalid campaign'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Campaign->save($this->request->data)) {
                $this->Session->setFlash(__('The campaign has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The campaign could not be saved. Please, try again.'));
        } else {
            $this->request->data = $this->Campaign->read(null, $id);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Campaign->id = $id;
        if (!$this->Campaign->exists()) {
            throw new NotFoundException(__('Invalid campaign'));
        }
        if ($this->Campaign->delete()) {
            $this->Session->setFlash(__('Campaign deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Campaign was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
