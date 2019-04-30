<?php
class Signal extends Model
{
	public function __construct()
	{

	}
	
	public function signal_comment($id)
	{
		return $this->signalComment($id);
	}

}
?>