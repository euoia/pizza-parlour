<?php
class Pizza extends AppModel {
	// TODO: Move these toppings to the database.
	public $toppings = array(
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

	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'customer_id'
        )
    );

    public function __construct() {
		parent::__construct();

		$this->validate = array(
		'topping1' => array(
			'rule' => array('inList', $this->toppings)),
		'topping2' => array(
			'rule' => array('inList', $this->toppings)),
		'topping3' => array(
			'rule' => array('inList', $this->toppings))
		);
	}

	public $successMessage = '';

	public function afterSave($created, $options = array()) {
		$numOrders = $this->find('count', array(
			'conditions' => array('customer_id' => $this->data['Pizza']['customer_id'])
		));

		$this->successMessage = __(sprintf('Pizza #%d ordered.', $numOrders));
	}
}
?>
