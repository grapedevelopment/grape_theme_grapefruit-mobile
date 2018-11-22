<?php
function frontpage(){
	global $grape;
	$grape->output->result = "info";
	//$grape->output->message = "Bitte authentifiziere".((SALUTATION=="Sie")?"n Sie sich":" Dich").".";
	$grape->output->content_type = "focus";
	$grape->output->add_menu_item(array("url"=>URL."?job=login","name"=>"Login"));
	$grape->output->add_menu_item(array("url"=>URL,"name"=>"Übersicht"));
	$grape->output->message = "Wir machen Energiewende!";
	$html = '<h3>Solar aufs Dach!</h3>
			 <p>Welche öffentlichen Dächer in meinem Ort haben Solar-Potential?
			 Z.B. Schule, Rathaus, Schwimmbad?
			 Wir schlagen Gebäude vor - <strong>nur Sie vor Ort</strong> sehen, welche Dächer wirklich passen.</p>
			 <p>Lassen Sie uns gemeinsam diesen Schatz heben<br/>und Ihre Gemeinde anstupsen!</p>
			 <!--Jetzt den Schatz heben:
			 <p>Im Ländle haben kommunale Dächer ein enormes Potential für Solar-Anlagen. Lasst uns diesen Schatz gemeinsam heben! Mitmach-Aktion exklusiv für BUND-Mitglieder.</p>
			 <p>Mit dieser WebApp können Sie als BUND-Mitglied recherchieren, welches Potential für Solarstrom-Anlagen in Ihrer Kommune besteht und Ihre Kommune darum bitten, die geeigneten kommunalen Dächer mit Photovoltaik-Anlagen zu bestücken.</p>-->
			 <!--<p>Offizieller Start der Aktion ist der 17. August 2018.</p>-->';
	$grape->output->content->html.= $grape->output->wrap_div($html);
	$html = '<img src="'.URL."grape-themes/".$grape->output->dir_name.'images/logo.svg" style="height: 80px;width: auto;margin-bottom: 2em;margin-top: 1em;"/><br/>';
	$html.= '<div class="btn-group-vertical">'.$grape->auth->html_login_button().'</div>';
	//$html.= $grape->output->dump_var($grape->settings->title);
	if(isset($grape->settings->authentification)&&$grape->settings->authentification->account_creation){
		$html.= '<p>&nbsp;</p><p>'.((SALUTATION=="Sie")?"Sie sind":"Du bist").' noch nicht dabei?<br/>Hier für die <strong>Schatzsuche</strong> registrieren:</p>
				<a href="#" onclick="load_content(\'job=account_creation\');" class="btn btn-primary">BUND-BaWü-Account erstellen</a>';
	}
	$html.= '<p>&nbsp;</p>';
}
?>