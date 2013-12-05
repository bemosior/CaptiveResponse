<?php


class QuestionsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter(); 
    }

    public function index() {
        $this->Questions->recursive = 0;
        $this->set('questions', $this->paginate());
    }

    public function view($id = null) {
        $this->Questions->id = $id;
        if (!$this->Questions->exists()) {
            throw new NotFoundException(__('Invalid question'));
        }
        //$this->set('question', $this->Questions->read(null, $id));
        $this->request->data = $this->Questions->read(null, $id);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Questions->create();
            if ($this->Questions->save($this->request->data)) {
                $this->Session->setFlash(__('The question has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The question could not be saved. Please, try again.'));
        }
    }

    public function edit($id = null) {
        $this->Questions->id = $id;
        if (!$this->Questions->exists()) {
            throw new NotFoundException(__('Invalid question'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Questions->save($this->request->data)) {
                $this->Session->setFlash(__('The question has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The question could not be saved. Please, try again.'));
        } else {
            $this->request->data = $this->Questions->read(null, $id);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Questions->id = $id;
        if (!$this->Questions->exists()) {
            throw new NotFoundException(__('Invalid question'));
        }
        if ($this->Questions->delete()) {
            $this->Session->setFlash(__('Questions deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Questions was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
