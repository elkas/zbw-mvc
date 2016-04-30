<?php
class View {
	public function __construct() {
	}
	
	public function showContent($data){
		
		ob_start();
		include('./template/header.php');
		include('./template/nav.php');
		include('./template/index.main.php');
		include('./template/footer.php');
		$output = ob_get_contents();  
		ob_end_clean();
		return $output;
	}	
}
?>
