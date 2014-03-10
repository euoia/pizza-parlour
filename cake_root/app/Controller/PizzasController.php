<?php
class PizzasController extends AppController {
	public $helpers = array(
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form',
		'Js');

	public function beforeFilter() {
		parent::beforeFilter();

		// Allow users to make a pizza before logging in.
		// TODO: Only allow admins to viewOrders.
		$this->Auth->allow('viewOrders', 'makePizza');
	}

    public function makePizza() {
		// Bind the toppings to diplay the pizza creator.
		$this->set('toppings', $this->Pizza->toppings);
		$this->set('title_for_layout', 'Pizza Builder');

		// request->data is empty - no more to do.
		if ($this->request->is('post') === false) {
			return;
		}

		// Save the pizza.

		// Check whether the user is logged in.
		// If the user is logged in, we can order the pizza right away. If
		// not, we'll save it in their session and prompt them to login.
		$user = $this->Auth->user();

		if($user) {
			$this->request->data['Pizza'] = array_merge(
				$this->request->data['Pizza'],
				array('customer_id' => $user['id']));

			$this->Pizza->save($this->request->data);
			$this->Session->setFlash($this->Pizza->successMessage);
		} else {
			$this->Session->write('order', $this->request->data['Pizza']);

			$this->Session->setFlash(__(
				'Order saved - login or register to complete order.'),
			'success');

			return $this->redirect($this->Auth->loginAction);
		}
    }

	public function viewOrders() {
		$this->set('pizzas', $this->Pizza->find('all', array(
			'contain' => array('User'),
			'order' => array('Pizza.id'),
		)));
	}
}
?>
