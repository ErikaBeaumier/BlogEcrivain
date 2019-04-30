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

	protected function getAllwithResume($table, $objet)
	{
		$db = $this->getDb();

		$var = [];
		$req = $db->prepare('SELECT `id`,`title`, CONCAT(SUBSTRING(`content`,1,200),"...") as \'content\',`author`,`published` FROM ' .$table. ' ORDER BY id DESC');
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

	protected function postComment($post_id, $author, $comment)
	{
    
		$db = $this->getDb();
	    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $comments->execute(array($post_id, $author, $comment));

	    return $affectedLines;
	}

	protected function signalComment($commentId)
	{
    
		$db = $this->getDb();
	    $comments = $db->prepare('UPDATE `comments` SET `is_signal`= TRUE ,`is_signal_date`= NOW() WHERE `id`= ? ');
	    $affectedLines = $comments->execute(array($commentId));

	    return $affectedLines;
	}

	protected function validateConnexion($login, $mdp)
	{
		$mdp = hash('sha256', $mdp);
		$db = $this->getDb();
		$var = '';
		$req = $db->prepare('SELECT id FROM `users` WHERE `username` = ? AND `password` = ?');
		$req->execute(array($login, $mdp));

		while($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$var = 'success';
		}
		$req->closeCursor();
		if(strlen($var) >0)
			return true;
		else
			return false;	
	}


}		
?>