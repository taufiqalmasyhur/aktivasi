<?php
    class Post
    {
    	public $id;		
		public $LexiPalID;
		public $Name;
		public $Email;
		public $OrderID;
		public $ProductID;
		public $DateActive;		
		public $ActiveCode;
						
		public function __construct($id, $LexiPalID, $Name, $Email, $OrderID, $ProductID, $DateActive, $ActiveCode)
		{
			$this->ID	= $id;
			$this->LexiPalID = $LexiPalID;
			$this->Name = $Name;
			$this->Email = $Email;
			$this->OrderID = $OrderID;
			$this->ProductID = $ProductID;
			$this->DateActive = $DateActive;
			$this->ActiveCode = $ActiveCode;		
		}
		
		public static function all()
		{
			$list = array();
			$db = Db::getInstance();
			$req = $db->query('SELECT * FROM userdatas');
						
			foreach ($req -> fetchAll() as $post) 
			{
				$list[] = new Post(
					$post['ID'], 
					$post['LexiPalID'], 
					$post['Name'],
					$post['Email'],
					$post['OrderID'],
					$post['ProductID'],
					$post['DateActive'],
					$post['ActiveCode']
				);			
			}
			return $list;
		}
		
		public static function find($id)
		{
			$db = Db::getInstance();
			$id = intval($id);
			$req = $db->prepare('SELECT * FROM userdatas WHERE ID = :id');
			$req->execute(array('id' => $id));
			$post = $req->fetch();
			
			return new Post(
				$post['ID'], 
				$post['LexiPalID'], 
				$post['Name'],
				$post['Email'],
				$post['OrderID'],
				$post['ProductID'],
				$post['DateActive'],
				$post['ActiveCode']
			);
		}
		
    }
?>