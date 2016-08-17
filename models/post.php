<?php
    class Post
    {
    	public $id;		
		public $LexiPalID;
		public $Name;
		public $Email;
		public $OrderId;
		public $ProductId;
		public $DateActive;		
		public $ActiveCode;
						
		public function __construct($id, $LexiPalID, $Name, $Email, $OrderId, $ProductId, $DateActive, $ActiveCode)
		{
			$this->id	= $id;
			$this->LexiPalID = $LexiPalID;
			$this->Name = $Name;
			$this->Email = $Email;
			$this->OrderId = $OrderId;
			$this->ProductId = $ProductId;
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
					$post['id'], 
					$post['LexiPalID'], 
					$post['Name'],
					$post['Email'],
					$post['OrderId'],
					$post['ProductId'],
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
			$req = $db->prepare('SELECT * FROM userdatas WHERE id = :id');
			$req = exec(array('id'=>$id));
			$post = $req->fetch();
			
			return new Post(
				$post['id'], 
				$post['LexiPalID'], 
				$post['Name'],
				$post['Email'],
				$post['OrderId'],
				$post['ProductId'],
				$post['DateActive'],
				$post['ActiveCode']
			);
		}
		
    }
?>