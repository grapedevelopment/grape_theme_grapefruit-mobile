<?php

// no direct call
if(!defined('GRAPE')) die('Direct access not permitted');

class grape_theme{
	public $name = "Grapefruit Mobile";
	public $dir_name = "grapefruit-mobile/";
	public $result = "";
	public $message = "";
	public $content_type = "standard";
	public $content = "";
	public $menu = "";
	public $title = "";
	public $emotion = "";
	public $help = false;
	var $scripts = array();
	var $stylesheets = array();
	public $icon = false;
	public $homeURL = "homeURL";
	var $menuitems = array();
	public $path = "";
	var $campaignitems = array();
	var $users_online = 0;
	public $module_statistics = false;
	
	/**
	 *
	 */
	function __construct(){
		new stdClass();
		$this->content = new stdClass();
		$this->content->json = new stdClass();
		$this->content->html = "";
		$this->menu = new stdClass();
		$this->menu->json = new stdClass();
		$this->menu->html = "";
		$this->title = new stdClass();
		$this->title->json = new stdClass();
		$this->title->html = "Grape";
		$this->help = new stdClass();
		$this->help->title = "Help Title";
		$this->help->html = "Wow! So much help!";
		$this->path = str_replace(ABSPATH,"",dirname( __FILE__ ))."/";
		foreach($this->scripts as &$script){
			$script = $this->path.$script;
		}
		foreach($this->stylesheets as &$stylesheet){
			$stylesheet = $this->path.$stylesheet;
		}
	}
	/**
	 * @description Echoes output as JSON / Communication
	 */
	public function ajax_out(){
		$json_result = new stdClass();
		$json_result->result = $this->result;
		$json_result->message = $this->message;
		$json_result->content_type = $this->content_type;
		$json_result->content = $this->content;
		$json_result->menu = new stdClass();
		$json_result->menu->json = $this->menuitems;
		$json_result->title = $this->title;
		$json_result->scripts = $this->scripts;
		$json_result->styles = $this->stylesheets;
		$json_result->users_online = $this->users_online;
		$json_result->module_statistics = $this->module_statistics;
		$json_result->help = $this->help;
		echo json_encode($json_result, JSON_PRETTY_PRINT);
	}
	/**
	 * @description Main template
	 */
	public function html_out(){
		include_once("template.php");
	}
	/**
	 * @description Loads a JS file incl. init function
	 * @param string $item
	 * @param string $function
	 */
	public function add_javascript($item,$function=""){
		$script = new stdClass();
		$script->url = $item;
		$script->call = $function;
		//print_r($script);
		array_push($this->scripts,$script);
	}
	/**
	 * @description Loads CSS file
	 */
	public function add_css($item){
		array_push($this->stylesheets,$item);
	}
	/**
	 * @description Adds item to menue
	 * @param object $item
	 */
	public function add_menu_item($item){
		array_push($this->menuitems,$item);
	}
	/**
	 * @description Adds multiple menue items / Wrapper for add_menu_item
	 * @param array $items
	 */
	public function add_menu_items($items){
		foreach($items as $item){
			array_push($this->menuitems,$item);
		}
	}
	/**
	 * @description Adds campaign button(s)
	 * @param array or object
	 */
	public function add_campaign_button($items){
		if(!is_array($items)) {
			$items = array($items);
		}
		foreach($items as $item){
			array_push($this->campaignitems,$item);
		}
	}
	/**
	 * @description Builds campaign buttons
	 */
	public function build_campaign_buttons(){
		$result = "";
		foreach($this->campaignitems as $item){
			$url = $item->url;
			if(strpos($url,"Logout")!==false||strpos($url,"Login")!==false){
				$url = $url;
			}
			elseif(OUTPUT=="HTML"){
				$url = 'document.location.href="'.$url.'"';
			}
			else{
				$url = str_replace("?","",$url);
				$url = explode("&",$url);
				$new_url = new stdClass();
				foreach($url as &$url_item){
					$url_item = explode("=",$url_item);
					$new_url->{trim($url_item[0])} = trim($url_item[1]);
				}
				$url = json_encode($new_url);
				$url = "load_content($url)";
	
			}
			$background = false;
			if(strlen($item->image)>0){
				$background = $item->image;
			}
			elseif(strlen($item->background)>0){
				$background = $item->background;
			}
			$result.= $this->build_card($url,$item->name,$item->message,"Mitmachen!",$background);
		}
		return '<div class="row">'.$result.'</div>';
	}
	/**
	 * @description Builds custom frontpage
	 */
	public function build_frontpage(){
		global $grape;
		$this->result = "info";
		$this->message = "Bitte authentifiziere".((SALUTATION=="Sie")?"n Sie sich":" Dich").".";
		$this->content_type = "focus";
		$this->add_menu_item(array("url"=>URL."?job=login","name"=>"Login"));
		$this->add_menu_item(array("url"=>URL,"name"=>"Übersicht"));
		$html = '<img src="'.URL."grape-themes/".$this->dir_name.'images/logo.svg" style="height: 80px;width: auto;margin-bottom: 2em;margin-top: 1em;"/><br/>';
		$html.= '<div class="btn-group-vertical">'.$grape->auth->html_login_button().'</div>';
		//$html.= $grape->output->dump_var($grape->settings->title);
		if(isset($grape->settings->authentification)&&$grape->settings->authentification->account_creation){
			$html.= '<p>&nbsp;</p><p>'.((SALUTATION=="Sie")?"Sie sind":"Du bist").' noch nicht dabei?<br/>Hier für die <strong>Schatzsuche</strong> registrieren:</p>
					<a href="#" onclick="load_content(\'job=account_creation\');" class="btn btn-primary">BUND-BaWü-Account erstellen</a>';
		}
		$html.= '<p>&nbsp;</p>';
		$this->content->html.= $this->wrap_div($html);
	}
	/**
	 * @description Card layout
	 * @param string $url
	 * @param string $title
	 * @param string $message
	 * @param string $button_text
	 * @param string $background
	 * @return string HTML of the card
	 */
	public function build_card($url,$title,$message,$button_text,$background=false){
		$result = '
				<div class="col-sm-6">
					<div class="card rounded box-shadow" onclick=\''.$url.'\'>
						'.($background?'<div class="card-img-top" style="background:'.$background.'" onclick=\''.$url.'\'>&nbsp;</div>':'').'
						<div class="card-body">
						  <h5 class="card-title" onclick=\''.$url.'\'>'.$title.'</h5>
						  <p class="card-text" onclick=\''.$url.'\'>'.$message.'</p>
						  <a href="#" onclick=\''.$url.'\' class="btn btn-primary">'.$button_text.'</a>
						</div>
					</div>
				</div>';
		return $result;
	}
	/**
	 * @description Div for content
	 * @param string $stuff
	 * @param string $background_right
	 */
	function wrap_div($stuff,$background_right=false){
		$result = "";
		if($background_right!==false){
			$image = $background_right;
		}
		elseif($this->emotion!==""){
			switch ($this->emotion){
				case "curious":
					$image = URL."grape-themes/".$this->dir_name.'images/side_curious.jpg';
					break;
				case "open":
					$image = URL."grape-themes/".$this->dir_name.'images/side_open.jpg';
					break;
				case "ready":
					$image = URL."grape-themes/".$this->dir_name.'images/side_ready.jpg';
					break;
				case "excited":
					$image = URL."grape-themes/".$this->dir_name.'images/side_excited.jpg';
					break;
				default:
					$image = false;
			}
		}
		else{
			$image = false;
		}
		if($image!==false){
			$result = '<div class="my-3 p-3 bg-white rounded box-shadow background-right" style="background-image: url('.$image.');">'.$stuff.'</div>';
		}
		else{
			$result = '<div class="my-3 p-3 bg-white rounded box-shadow">'.$stuff.'</div>';
		}
		return $result;
	}
	/**
	 * @description Formats a variable & wraps div
	 * @param every $var
	 * @result string HTML representation
	 */
	function dump_var($var){
		return $this->wrap_div($this->dump_var_simple($var));
	}
	/**
	 * @description Formats a variable
	 * @param every $var
	 * @result string HTML representation
	 */
	function dump_var_simple($var){
		return "<code>".str_replace(array("\t","    "),"&nbsp;&nbsp;&nbsp;&nbsp;",nl2br(print_r($var,true)))."</code>";
	}
}
?>
