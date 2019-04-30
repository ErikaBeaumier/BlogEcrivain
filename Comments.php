<?php
class Comments extends Model
{
	private $_id;
	private $_post_id;
	private $_author;
	private $_comment;
	private $_comment_date;
	private $_is_signal;
	private $_is_signal_date;

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}

	public function hydrate(array $data)
	{
		foreach ($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);

			if(method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}

	public function setId($id)
	{
		$id = (INT) $id;

		if($id > 0)
			$this->_id = $id;
	}

	public function setPost_id($post_id)
	{
		$post_id = (INT) $post_id;

		if($post_id > 0)
			$this->_post_id = $post_id;
	}

	public function setAuthor($author)
	{
		if (is_string($author))
			$this->_author = $author;
	}

	public function setComment($comment)
	{
		if (is_string($comment))
			$this->_comment = $comment;
	}

	public function setComment_date($comment_date)
	{
		$this->_comment_date = $comment_date;
	}

	public function setIs_signal($is_signal)
	{
		$this->_is_signal = $is_signal;
	}
	public function setIs_signal_date($is_signal_date)
	{
		$this->_is_signal_date = $is_signal_date;
	}

	public function id()
	{
		return $this->_id;
	}

	public function post_id()
	{
		return $this->_post_id;
	}
	
	public function author()
	{
		return $this->_author;
	}

	public function comment()
	{
		return $this->_comment;
	}

	public function comment_date()
	{
		return $this->_comment_date;
	}

	public function is_signal()
	{
		return $this->_is_signal;
	}

	public function is_signal_date()
	{
		return $this->_is_signal_date;
	}

}
?>