<?php


class QuestionsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter(); 
    }

    public function index() {
        $this->Question->recursive = 0;
        $this->set('questions', $this->paginate());
    }

    public function view($id = null) {
        $this->Question->id = $id;
        if (!$this->Question->exists()) {
            throw new NotFoundException(__('Invalid question'));
        }

        //Retrieve campaigns for pre-population of FK "campaign_id"
        $this->loadModel('Campaign');
        $this->set('campaigns', $this->Campaign->find('list'));

        $this->request->data = $this->Question->read(null, $id);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Question->create();
            if ($this->Question->save($this->request->data)) {
                $this->Session->setFlash(__('The question has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The question could not be saved. Please, try again.'));
        }

        //Retrieve campaigns for pre-population of FK "campaign_id"
        $this->loadModel('Campaign');
        $this->set('campaigns', $this->Campaign->find('list'));

    }

    public function edit($id = null) {
        $this->Question->id = $id;
        if (!$this->Question->exists()) {
            throw new NotFoundException(__('Invalid question'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Question->save($this->request->data)) {
                $this->Session->setFlash(__('The question has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The question could not be saved. Please, try again.'));
        } else {

            //Retrieve campaigns for pre-population of FK "campaign_id"
            $this->loadModel('Campaign');
            $this->set('campaigns', $this->Campaign->find('list'));
            
            $this->request->data = $this->Question->read(null, $id);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Question->id = $id;
        if (!$this->Question->exists()) {
            throw new NotFoundException(__('Invalid question'));
        }
        if ($this->Question->delete()) {
            $this->Session->setFlash(__('Questions deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Questions was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
