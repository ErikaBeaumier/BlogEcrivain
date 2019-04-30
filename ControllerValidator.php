<?php

class ControllerValidator
{
	private $rules = [];
	private $errors =[];

	public function __construct($rules)
	{
		$this->rules = $rules;
	}

	public function check($datas)
	{
		//For all input in $datas
		foreach ($datas as $name => $value) {
			//if the name exists in the rules
			if(array_key_exists($name, $this->rules))
			{
				//get the rules associated to the input
				$rule = $this->rules[$name];
				//in case if there are many rules associated
				if(is_array($rule))
				{
					//case with many rules for the input : call validator for each rule
					foreach ($rule as $key) {
						$this->validator($key,$value,$name);
					}
				}//else if only one rules
				else
					$this->validator($rule,$value,$name);
			}
		}
	}

	private function validator($rule, $value, $name)
	{
		switch ($rule) {
			case 'required':
				$this->validate_required($value,$name);
				break;
			case 'email':
				$this->validate_email($value,$name);
				break;
			default:
				$this->validate_required($value,$name);
				break;
		}
	}

	//parameter name to test
	public function validate_required($value,$name)
	{
		if(isset($value) && !empty($value))
		{
			return true;
		}
		else
		{
			$this->errors[$name] = "Le champs $name n'a pas été rempli.";
			return false;
		}
		
	}

	public function validate_email($value,$name)
	{
		if(filter_var($value,FILTER_VALIDATE_EMAIL))
		{
			return true;
		}
		else
		{
			$this->errors[$name] = "Le champs $name n'a pas été rempli correctement.";
			return false;
		}
	}



	public function errors()
	{
		return $this->errors;
	}
}
?>