<?php

class UsersController extends AppController {
	public $helpers = array(
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form',
		'Js');

	public $uses = array('User', 'Pizza');

	public function auth() {
		// User is already logged in.
		if ($this->Auth->user()) {
			return $this->redirect('/');
		}

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
			} else {

				// Try to login.
				$login = $this->Auth->login();

				if ($login === false) {
					$this->Session->setFlash(__('Invalid password, try again'));
					return $this->redirect($this->Auth->redirect());
				}
			}

			// If the customer has a pending order then process it.
			$order = $this->Session->read('order');

			$user = $this->Auth->user();
			if ($order) {
				$order = array_merge(
					$order,
					array('customer_id' => $user['id']));

				$this->Pizza->save($order);
				$this->Session->delete('order');
				$this->Session->setFlash($this->Pizza->success_message);
			} else {
				$this->Session->setFlash(__('Successfully logged in'), 'success');
			}

			return $this->redirect('/');
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
}
