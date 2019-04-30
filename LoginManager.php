<?php
class LoginManager extends Model
{
	public function testLogin($login, $mdp)
	{
		return $this->validateConnexion($login, $mdp);
	}


}

?>