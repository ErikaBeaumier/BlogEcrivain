<?php
class Article extends Model
{
	private $_id;
	private $_author;
	private $_title;
	private $_content;
	private $_published;

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}

	public function hydrate(array $data)
	{
		foreach ($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);

			if(method_exists($this, $method))
			{
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

	public function setAuthor($author)
	{
		if (is_string($author))
			$this->_author = $author;
	}

	public function setTitle($title)
	{
		if (is_string($title))
			$this->_title = $title;
	}

	public function setContent($content)
	{
		if (is_string($content))
			$this->_content = $content;
	}

	public function setPublished($published)
	{
		$this->_published = $published;
	}

	public function id()
	{
		return $this->_id;
	}
	
	public function author()
	{
		return $this->_author;
	}

	public function title()
	{
		return $this->_title;
	}

	public function content()
	{
		return $this->_content;
	}

	public function published()
	{
		return $this->_published;
	}
}
?>