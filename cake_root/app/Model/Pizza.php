<?php
class Pizza extends AppModel {
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'customer_id'
        )
    );

	// TODO: Validate toppings.

	public $success_message = '';

	public function afterSave($created, $options = array()) {
		$num_orders = $this->find('count', array(
			'conditions' => array('customer_id' => $this->data['Pizza']['customer_id'])
		));

		$this->success_message = __(sprintf('Pizza #%d ordered.', $num_orders));
	}
}
?>
