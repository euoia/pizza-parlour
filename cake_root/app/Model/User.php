<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	// Override the default table name of 'users'.
    public $useTable = 'customers';
	public $lastErrorMessage;

	public function beforeSave($options = array()) {
		$this->lasterrorMessage = null;

		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}

		$sanitizedUsername = filter_var(
			$this->data[$this->alias]['username'],
			FILTER_SANITIZE_SPECIAL_CHARS);

		if ($this->data[$this->alias]['username'] !== $sanitizedUsername) {
			$this->lastErrorMessage = 'Invalid username - cannot contain special characters.';
			return false;
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

	public function lastErrorMessage() {
		if ($this->lastErrorMessage) {
			return $this->lastErrorMessage;
		}

		// Default.
		return 'An error occurred.';
	}
}
?>
