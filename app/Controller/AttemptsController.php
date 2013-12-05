<?php


class AttemptsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter(); 
    }

    public function index() {
        $this->Attempt->recursive = 0;
        $this->set('attempts', $this->paginate());
    }

    public function view($id = null) {
        $this->Attempt->id = $id;
        if (!$this->Attempt->exists()) {
            throw new NotFoundException(__('Invalid attempt'));
        }
    
        //Retrieve campaigns for pre-population of FK "campaign_id"
        $this->loadModel('Campaign');
        $this->set('campaigns', $this->Campaign->find('list'));

        //$this->set('attempt', $this->Attempt->read(null, $id));
        $this->request->data = $this->Attempt->read(null, $id);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Attempt->create();
            if ($this->Attempt->save($this->request->data)) {
                $this->Session->setFlash(__('The attempt has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The attempt could not be saved. Please, try again.'));
        }

        //Retrieve campaigns for pre-population of FK "campaign_id"
        $this->loadModel('Campaign');
        $this->set('campaigns', $this->Campaign->find('list'));
    }

    public function edit($id = null) {
        $this->Attempt->id = $id;

        if (!$this->Attempt->exists()) {
            throw new NotFoundException(__('Invalid attempt'));
        }        

        //Retrieve campaigns for pre-population of FK "campaign_id"
        $this->loadModel('Campaign');
        $this->set('campaigns', $this->Campaign->find('list'));

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Attempt->save($this->request->data)) {
                $this->Session->setFlash(__('The attempt has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The attempt could not be saved. Please, try again.'));
        } else {
            $this->request->data = $this->Attempt->read(null, $id);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Attempt->id = $id;
        if (!$this->Attempt->exists()) {
            throw new NotFoundException(__('Invalid attempt'));
        }
        if ($this->Attempt->delete()) {
            $this->Session->setFlash(__('Campaign deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Campaign was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
