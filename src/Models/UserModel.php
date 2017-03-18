<?php 

namespace App\Models;

class UserModel  extends AbstractModel
{

	protected $table = 'users';
	protected $column = ['username', 'password'];

	public function signUp(array $data)
	{

		$data = [
			'username' => $data['username'],
			'name'     => $data['name'],
			'password' => password_hash($data['password'], PASSWORD_DEFAULT),
		

		];

		$this->createData($data);
	}

	public function checkDuplicate($username, $password)
	{
		$checkUsername = $this->find('username', $username);
		$checkEmail = $this->find('password', $password);
		if ($checkUsername) {
			return 1;
		} elseif ($checkPassword) {
			return 2;
		}
		return false;
	}
}

