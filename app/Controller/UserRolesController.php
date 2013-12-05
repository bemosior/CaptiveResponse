<?php


class UserRolesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter(); 
    }

    public function index() {
        $this->UserRole->recursive = 0;
        $this->set('user_roles', $this->paginate());
    }

    public function view($id = null) {
        $this->UserRole->id = $id;
        if (!$this->UserRole->exists()) {
            throw new NotFoundException(__('Invalid user_role'));
        }
        //$this->set('user_role', $this->UserRole->read(null, $id));
        $this->request->data = $this->UserRole->read(null, $id);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->UserRole->create();
            if ($this->UserRole->save($this->request->data)) {
                $this->Session->setFlash(__('The user_role has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user_role could not be saved. Please, try again.'));
        }
    }

    public function edit($id = null) {
        $this->UserRole->id = $id;
        if (!$this->UserRole->exists()) {
            throw new NotFoundException(__('Invalid user_role'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->UserRole->save($this->request->data)) {
                $this->Session->setFlash(__('The user_role has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user_role could not be saved. Please, try again.'));
        } else {
            $this->request->data = $this->UserRole->read(null, $id);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->UserRole->id = $id;
        if (!$this->UserRole->exists()) {
            throw new NotFoundException(__('Invalid user_role'));
        }
        if ($this->UserRole->delete()) {
            $this->Session->setFlash(__('UserRole deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('UserRole was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
}
