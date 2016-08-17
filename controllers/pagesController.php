<?php
    class PagesController
    {
    	public function home()
		{
			$first_name = 'Taufiq';
			$last_name = 'Almasyhur';
			require_once ('views/pages/home.php');
		}
		
		public function error()
		{
			require_once ('views/pages/error.php');
		}
		
    }
?>