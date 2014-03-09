<?php
class PizzasController extends AppController {
	public $helpers = array(
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form',
		'Js');

    public function index() {
        $this->set('pizzas', $this->Pizza->find('all'));
    }

    public function makePizza() {
        $this->set('pizzas', $this->Pizza->find('all'));
		$this->set('toppings', Array(
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
		));
    }
}
?>
