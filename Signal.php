<?php

class Signal extends Model
{
	public function signal_comment($id)
	{
		return $this->signalComment($id);
	}

	public function undo_signal_comment($id)
	{
		return $this->UndoSignalComment($id);
	}

		public function delete_comment($id)
	{
		return $this->deleteComment($id);
	}
}

?>