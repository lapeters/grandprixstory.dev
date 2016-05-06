<?php

/**
* shortcodes
*/
class SKGravityShortcodes
{
	//register
	public function register(){
		//row
		add_shortcode('sk_row', array($this, 'sk_row'));
		add_shortcode('sk_one_third', array($this, 'one_third'));		
		add_shortcode('sk_two_thirds', array($this, 'two_thirds'));
		add_shortcode('sk_one_half', array($this, 'one_half'));
	}

	/* sk row
	================================================== */	
	public function sk_row($atts, $content = null){
		return '<div class="row">'.do_shortcode($content).'</div>';
	}
	
	/* one third
	================================================== */	
	public function one_third($atts, $content = null){
		return '<div class="col-md-4">'.do_shortcode($content).'</div>';
	}
	
	/* two third
	================================================== */	
	public function two_thirds($atts, $content = null){
		return '<div class="col-md-8">'.do_shortcode($content).'</div>';
	}
	
	/* one half
	================================================== */	
	public function one_half($atts, $content = null){
		return '<div class="col-md-6">'.do_shortcode($content).'</div>';
	}


}

?>