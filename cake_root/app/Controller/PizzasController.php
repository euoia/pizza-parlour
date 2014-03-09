<?php
class PizzasController extends AppController {
	private $toppings = array(
		'bacon',
		'cajun chicken',
		'chorizo',
		'honey cured ham',
		'pepperoni',
		'turkey',
		'cheddar',
		'feta',
		'gorgonzola',
		'monterey jack',
		'provolone',
		'roquefort',
		'pistachios',
		'pecans',
		'pine nuts',
		'walnuts',
	);

	public $helpers = array(
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form',
		'Js');

    public function index() {
        $this->set('pizzas', $this->Pizza->find('all'));
    }

    public function makePizza() {
		// Bind the toppings to diplay the pizza creator.
		// TODO: Move these toppings to a database table.
		$this->set('toppings', $this->toppings);

		// request->data not empty, save the pizza.
		debug($this->request->data);
    }
}
?>
