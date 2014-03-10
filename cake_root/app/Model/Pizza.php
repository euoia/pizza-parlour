<?php
class Pizza extends AppModel {
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'customer_id'
        )
    );

	// TODO: Validate toppings.

	public $successMessage = '';

	public function afterSave($created, $options = array()) {
		$numOrders = $this->find('count', array(
			'conditions' => array('customer_id' => $this->data['Pizza']['customer_id'])
		));

		$this->successMessage = __(sprintf('Pizza #%d ordered.', $numOrders));
	}
}
?>
