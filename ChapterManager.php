<?php
class ChapterManager extends Model
{
	public function getChapters()
	{
		return $this->getAll('articles', 'Article');
	}

	public function getLastChap()
	{
		return $this->getLast('articles', 'Article');
	}

	//get one chapter by id
	public function getOneChap($post_id)
	{
		return $this->getPost('articles', 'Article',$post_id);
	}

	//get all comments attached to a chapter by the chapter id
	public function getComments($post_id)
	{
		return $this->getComs('comments', 'Comments',$post_id);
	}

	//get all comments signaled
	public function getModerate()
	{
		return $this->getSignal('comments', 'Comments');
	}

	public function insertChapter($title, $content, $author)
	{
		$this->postChapter($title, $content, $author);
	}

	public function supprimChapter($id)
	{
		$this->deleteChapter($id);
	}

	public function reformChapter($id, $title, $content, $author)
	{
		$this->updateChapter($id, $title, $content, $author);
	}
}

?>