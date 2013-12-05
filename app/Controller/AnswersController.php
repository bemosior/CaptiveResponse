<?php


class AnswersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter(); 
    }

    public function index() {
        $this->Answer->recursive = 0;
        $this->set('answers', $this->paginate());
    }

    public function view($id = null) {
        $this->Answer->id = $id;
        if (!$this->Answer->exists()) {
            throw new NotFoundException(__('Invalid answer'));
        }

        //Retrieve questions for pre-population of FK "question_id"
        $this->loadModel('Question');
        $this->set('questions', $this->Question->find('list'));

        $this->request->data = $this->Answer->read(null, $id);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Answer->create();
            if ($this->Answer->save($this->request->data)) {
                $this->Session->setFlash(__('The answer has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
        }
        //Retrieve questions for pre-population of FK "question_id"
        $this->loadModel('Question');
        $this->set('questions', $this->Question->find('list'));

    }

    public function edit($id = null) {
        $this->Answer->id = $id;
        if (!$this->Answer->exists()) {
            throw new NotFoundException(__('Invalid answer'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Answer->save($this->request->data)) {
                $this->Session->setFlash(__('The answer has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
        } else {
            //Retrieve questions for pre-population of FK "question_id"
            $this->loadModel('Question');
            $this->set('questions', $this->Question->find('list'));

            $this->request->data = $this->Answer->read(null, $id);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Answer->id = $id;
        if (!$this->Answer->exists()) {
            throw new NotFoundException(__('Invalid answer'));
        }
        if ($this->Answer->delete()) {
            $this->Session->setFlash(__('Answer deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Answer was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
