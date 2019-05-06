<?php
class Model{
	
	private static $_db;	

	//instantiates the connection
	private static function setDb()
	{
		self::$_db = new PDO('mysql:host=localhost:3306;dbname=blogkvjx_chapitres;charset=utf8', 'blogkvjx_db', 'jyTzRgUfm3tYGX1VD8');

		self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}

	//get the connection
	protected function getDb()
	{
		if(self::$_db == null)
			self::setDb();
		return self::$_db;
	}

	protected function getAll($table, $objet)
	{
		$db = $this->getDb();

		$var = [];
		$req = $db->prepare('SELECT * FROM ' .$table. ' ORDER BY id DESC');
		$req->execute();
		$i = 0;
		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$var[$i] = new $objet($data);
			$i++;
		}
		$req->closeCursor();
		return $var;		
	}

	protected function getLast($table, $objet)
	{
		$db = $this->getDb();

		$var = [];
		$req = $db->prepare('SELECT * FROM ' .$table. ' ORDER BY id DESC LIMIT 1');
		$req->execute();

		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$var = new $objet($data);
		}
		$req->closeCursor();
		return $var;		
	}

	protected function getPost($table, $objet, $post_id)
	{
		$db = $this->getDb();

		$var = [];
		$req = $db->prepare("SELECT * FROM " .$table. " WHERE id = ?");
	    $req->execute(array($post_id));
		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$var = new $objet($data);
		}
		$req->closeCursor();
		return $var;
	}

	protected function getComs($table, $objet, $post_id)
	{
		$db = $this->getDb();

		$var = [];
		$comments = $db->prepare("SELECT * FROM " .$table. " WHERE post_id = ? ORDER BY comment_date DESC");
	    $comments->execute(array($post_id));

		$i = 0;
		while($data = $comments->fetch(PDO::FETCH_ASSOC))
		{
			$var[$i] = new $objet($data);
			$i++;
		}
		$comments->closeCursor();
		return $var;	
	}

	//Get comment signaled
	protected function getSignal($table, $objet)
	{
		$db = $this->getDb();

		$var = [];
		$comments = $db->prepare("SELECT * FROM " .$table. " WHERE is_signal = TRUE ORDER BY is_signal_date DESC");
	    $comments->execute(array(""));

		$i = 0;
		while($data = $comments->fetch(PDO::FETCH_ASSOC))
		{
			$var[$i] = new $objet($data);
			$i++;
		}
		$comments->closeCursor();
		return $var;	
	}

	protected function UndoSignalComment($commentId)
	{
    
		$db = $this->getDb();
	    $comments = $db->prepare('UPDATE `comments` SET `is_signal`= FALSE  WHERE `id`= ? ');
	    $affectedLines = $comments->execute(array($commentId));

	    return $affectedLines;
	}

	protected function postComment($post_id, $author, $comment)
	{    
		$db = $this->getDb();
	    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $comments->execute(array($post_id, $author, $comment));

	    return $affectedLines;
	}

	protected function deleteComment($commentId)
	{    
		$db = $this->getDb();
	    $comments = $db->prepare('DELETE FROM `comments` WHERE `id`= ? ');
	    $affectedLines = $comments->execute(array($commentId));

	    return $affectedLines;
	}

	protected function postChapter($title, $content, $author)
	{    
		$db = $this->getDb();
	    $chapters = $db->prepare('INSERT INTO articles(title, content, author, published) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $chapters->execute(array($title, $content, $author));

	    return $affectedLines;
	}

	protected function deleteChapter($id)
	{    
		$db = $this->getDb();
	    $chapters = $db->prepare('DELETE FROM articles  WHERE id = ?');
	    $affectedLines = $chapters->execute(array($id));

	    $comments = $db->prepare('DELETE FROM `comments` WHERE `post_id`= ? ');
	    $affectedLines = $comments->execute(array($id));

	    return $affectedLines;
	}

	protected function updateChapter($id, $title, $content, $author)
	{    
		$db = $this->getDb();
	    $chapters = $db->prepare('UPDATE `articles` SET `title`= ?,`content`= ?,`author`= ?,`published`= NOW() WHERE `id`= ?' );
	    $affectedLines = $chapters->execute(array($title, $content, $author,$id));

	    return $affectedLines;
	}
}		
?>