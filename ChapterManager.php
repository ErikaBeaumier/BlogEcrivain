<?php
class ChapterManager extends Model
{
	public function getChapters()
	{
		return $this->getAllwithResume('articles', 'Article');
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

	public function insertComments($post_id, $author, $comment)
	{
		$this->postComment($post_id, $author, $comment);
	}
}

?>