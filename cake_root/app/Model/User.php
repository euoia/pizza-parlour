<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	// Override the default table name of 'users'.
    public $useTable = 'customers';

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}

	// TODO: Validate username more strictly: length, non-word characters.
	public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
				'rule' => array('minLength', '2'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
    );
}
?>
