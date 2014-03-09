<?php

class UsersController extends AppController {
	public $helpers = array(
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form',
		'Js');

	public function auth() {
		//$this->Auth->authenticate = array('Form');

		// request->data not empty, save the pizza.
		if ($this->request->is('post')) {
			$user = $this->User->find('first', array(
				'conditions' => array(
					'username' => $this->request->data['User']['username']
				)
			));

			// No user returned - create a new one.
			if ($user === array()) {
				$this->User->save($this->request->data);
				$this->Session->setFlash(__('New account created'), 'success');

				$id = $this->User->id;
				$this->request->data['User'] = array_merge(
					$this->request->data['User'],
					array('id' => $id)
				);

				$this->Auth->login($this->request->data['User']);
				return $this->redirect('/');
			}

			// Try to login.
			$loginResult = $this->Auth->login($this->request->data['User']);
			if ($loginResult === false) {
				$this->Session->setFlash(__('Invalid username or password, try again'));
				return $this->redirect($this->Auth->redirect());
			}

			$this->Session->setFlash(__('Successfully logged in'), 'success');
		}
	}
}
