<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo URL."grape-themes/".$this->dir_name;?>favicon.ico">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL."grape-themes/".$this->dir_name;?>3rd-party/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo URL."grape-themes/".$this->dir_name;?>3rd-party/bootstrap-select.css" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="<?php echo URL."grape-themes/".$this->dir_name;?>3rd-party/font-awesome.min.css" rel="stylesheet"/>
    <link href="<?php echo URL."grape-themes/".$this->dir_name;?>3rd-party/leaflet.css" rel="stylesheet"/>
    <link href="<?php echo URL."grape-themes/".$this->dir_name;?>3rd-party/offcanvas.css" rel="stylesheet"/>
    <link href="<?php echo URL."grape-themes/".$this->dir_name;?>grape.css?v=20" rel="stylesheet"/>
  </head>

  <body class="bg-light">
    <nav class="navbar fixed-top navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--<img src="<?php echo URL."grape-themes/".$this->dir_name;?>images/sonnenblume.svg" style="height:40px;width:auto;"/>-->
      <span class="navbar-brand"><a href="#"></a></span>


      <div class="collapse navbar-collapse" id="navbar">

        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"></a>
          </li>
        </ul>
      </div>
    </nav>

    <div id="grape_overlay" style="display: none;"><div id="map" style="width: 100%; position: absolute; left: 0px; top: 0px; bottom:0px;"></div></div>
    <div id="grape_overlay2" style="display: none;"><div id='map2' style='width: 100%; position: absolute; left: 0px; top: 0px; bottom:0px;'></div></div>
    <div id="loader_wrapper" class="bg-dark rounded" style="display: none;"><div class="loader"></div>Lade Daten...</div>
 
    <main role="main" class="container" id="main-content">
      <div id="alert_placeholder"></div>
      <div id="grape_content">
      </div>
    </main>

    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo URL."grape-themes/".$this->dir_name;?>3rd-party/jquery-3.3.1.min.js"></script>
    <script src="<?php echo URL."grape-themes/".$this->dir_name;?>3rd-party/popper.min.js"></script><!-- needed for pulldown -->
    <script src="<?php echo URL."grape-themes/".$this->dir_name;?>3rd-party/bootstrap.min.js"></script>
    <script src="<?php echo URL."grape-themes/".$this->dir_name;?>3rd-party/bootstrap-select.min.js"></script>
    <script src="<?php echo URL."grape-themes/".$this->dir_name;?>3rd-party/holder.min.js"></script>
    <script src="<?php echo URL."grape-themes/".$this->dir_name;?>3rd-party/offcanvas.js"></script>
    <script src="<?php echo URL; ?>external-js-libraries/leaflet/leaflet.js"></script>
    <script src="<?php echo URL; ?>external-js-libraries/leaflet/L.Control.Locate.js"></script>
      <script>
/**
 * Mobile Detection
 * @copyright: cc by sa 3.0 sweets-BlingBling / stackoverflow
 * @see http://stackoverflow.com/questions/3514784/what-is-the-best-way-to-detect-a-mobile-device-in-jquery
 */
var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)  || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

var last_payload = "";

var base_url = "<?php echo URL; ?>";
bootstrap_alert = function() {};

loaded_scripts = [];
scripts_to_load = [];
/**
 * success info warning danger
 */
bootstrap_alert.warning = function(type,message) {
  console.log(type+" "+message);
  $('#alert_placeholder').html('<div class="alert alert-'+type+'"><a class="close" data-dismiss="alert">&times;</a><span>'+message+'</span></div>');
};
/**
 * navbar close outside click
 * https://stackoverflow.com/questions/46736823/how-can-i-close-my-bootstrap-4-navbar-collapse-menu-when-clicking-outside-the-me?rq=1
 */
$(document).ready(function () {
    $(document).click(function (event) {
        var clickover = $(event.target);
        var _opened = $(".navbar-collapse").hasClass("show");
        if (_opened === true && !clickover.hasClass("navbar-toggler")) {
            $(".navbar-toggler").click();
        }
    });
});
/**
 *
 */
function load_content(payload="",div='#grape_content'){
  $("#loader_wrapper").show();
  last_payload = payload;
  /*if(typeof(payload) == 'string'){
    payload = JSON.parse(payload);
  }
  console.log("payload: "+payload);
  payload = $(payload).serialize();*/
  //console.log("payload: "+payload+" ("+typeof(payload)+", serialized: "+$(payload).serialize()+")");
  $('#navbar').collapse('hide');
    // Assign handlers immediately after making the request,
    // and remember the jqxhr object for this request
    var jqxhr = $.post( base_url+"ajax.php", payload, function(data, status, xhr) {
        data = $.parseJSON( data );
        $("#alert_placeholder").html("");
        if(data.result != ""){
          if(data.message == ""){
            data.message = "Hui, jetzt habe ich glatt vergessen, was ich Dir sagen wollte...";
          }
          bootstrap_alert.warning(data.result, data.message);
        }
        console.log("data.content_type: "+data.content_type);

        var oldBodyClass = $( 'body' ).attr('class');
        $( 'body' ).removeClass("grape_login");
        $( 'body' ).removeClass("grape_map");
        $( 'body' ).removeClass("grape_focus");
        $( 'body' ).removeClass("grape_standard");
        switch(data.content_type) {
            case "login":
                $( 'body' ).addClass("grape_login");
                break;
            case "map":
                $( 'body' ).addClass("grape_map");
                break;
            case "focus":
                $( 'body' ).addClass("grape_focus");
                break;
            case "embedded_map":
                $( 'body' ).addClass(oldBodyClass);
                break;
            default:
                $( 'body' ).addClass("grape_standard");
        }
        // Content
        if(!$.isEmptyObject(data.content.json)){
          
        }
        else{
          //console.log("data.content.html: "+data.content.html);
          $( div ).html(data.content.html);
        }
        // Menu
        menu_payloads = [];
        if(!$.isEmptyObject(data.menu.json)){
          //console.log(data.menu.json);
          var menu = "";
          for(i=0;i<data.menu.json.length;i++){
            url = data.menu.json[i].url;
            direct_call_result = url.indexOf("job=login");
            if(direct_call_result==-1){
              direct_call_result = url.indexOf("job=logout");
            }
            if(direct_call_result==-1){
              direct_call_result = url.indexOf("job=dump_");
            }
            //console.log("searching for login in "+url+": "+login_logout_result);
            if(direct_call_result==-1){
              url = url.replace(base_url,"");
              url = url.replace("?","");
              menu_payloads[i] = url;
              menu += '<li class="nav-item"><a class="nav-link" href="javascript:load_menu_item('+i+');">'+data.menu.json[i].name+'</a></li>';
            }
            else{
              menu += '<li class="nav-item"><a class="nav-link" href="'+url+'">'+data.menu.json[i].name+'</a></li>';
            }
          }
          
          $( '.navbar-collapse .navbar-nav' ).html(menu);
        }
        else{
          console.log("data.menu.html: "+data.menu.html);
          $( '.navbar-collapse' ).html(data.menu.html);
        }
        // Title
        if(!$.isEmptyObject(data.title.json)){
          if(!$.isEmptyObject(data.title.json.link)){
            $( '.navbar-brand' ).html('<a href="'+data.title.json.link+'">'+data.title.json.text+'</a>');
          }
          else{
            $( '.navbar-brand' ).html(data.title.json.text);
          }
          $( 'title' ).html(data.title.json.text);
        }
        else{
          console.log("data.title.html: "+data.title.html);
          $( '.navbar-brand' ).html(data.title.html);
          $( 'title' ).html('Content');
        }
        var i = 0;
        // load additional styles
        for(i=0;i<data.styles.length;i++){
            if (document.createStyleSheet){
                document.createStyleSheet(data.styles[i]);
            }
            else {
                $("head").append($("<link rel='stylesheet' href='"+data.styles[i]+"' type='text/css'/>"));
            }
        }
        // load additional scripts
        scripts_to_load = data.scripts;
        console.log(data.scripts);
        for(i=0;i<data.scripts.length;i++){
          // extract file name from url
          var file_name = data.scripts[i].url;
          var file_name_end = file_name.indexOf(".js")+3;
          file_name = file_name.substring(0,file_name_end);
          var file_name_start = file_name.lastIndexOf("/");
          file_name = file_name.substring(file_name_start+1);
          scripts_to_load[i].file_name = file_name;
          // is script already loaded?
          if(jQuery.inArray(file_name, loaded_scripts) != -1) {
            console.log("script "+file_name+" already loaded; just execute "+scripts_to_load[i].call);
            eval(scripts_to_load[i].call);
          } else {
            // remove in production
            $.ajaxSetup({
              cache: false
            });
            console.log("loading script "+data.scripts[i].url);
            $.getScript(data.scripts[i].url)
              .done(function( script, textStatus ) {
                console.log(textStatus+" script loaded" );
                var identifier_search_string = "/* script identifier:";
                var identifier_position = script.indexOf(identifier_search_string);
                if(identifier_position > -1){
                  var identifier = script.substring(identifier_position+identifier_search_string.length);
                  var identifier_end_position = identifier.indexOf("*/");
                  identifier = identifier.substring(0,identifier_end_position);
                  identifier = identifier.replace(/ /g,'');
                  console.log("loaded script is "+identifier);
                  loaded_scripts.push(identifier);
                  for(var k=0;k<scripts_to_load.length;k++){
                    if(scripts_to_load[k].file_name == identifier){
                      console.log(scripts_to_load[k]);
                      // execute script
                      console.log("execute "+scripts_to_load[k].call);
                      eval(scripts_to_load[k].call);
                    }
                  }
                }
              })
              .fail(function( jqxhr, settings, exception ) {
                console.log( "failed to load script");
              })
            ;
          }
        }
        apply_rendering_stuff();

      })
      .done(function() {
        //alert( "second success" );
          $(div).show();
          $("#loader_wrapper").hide();
      })
      .fail(function() {
        bootstrap_alert.warning("danger","<strong>Fehler!</strong> Ich habe keine Verbindung zum Server.");
        $("#loader_wrapper").hide();
        //alert( "error" );
      })
      .always(function() {
        $('html, body').animate({
            scrollTop: $("body").offset().top
        }, 0);
      });
     
    // Perform other work here ...
     
    // Set another completion function for the request above
    jqxhr.always(function() {
      //alert( "second finished" );
    });
}
/**
 *
 */
function load_menu_item(i){
  load_content(menu_payloads[i]);
}
/**
 *
 */
function apply_rendering_stuff(){
    //console.log("apply_rendering_stuff");
    // styling tables
    $('table:not(.table-diagram)').addClass("table table-hover");
    // styling selects
    if(!isMobile){
      $('select').addClass("selectpicker form-control"); // show-tick
      // rerender select dropdowns
      $('select').selectpicker('render');
    }
    // prevent form interaction
    $(":submit","form").click(function(){
      console.log("submit clicked");
            if($(this).attr('name')) {
                $("form").append(
                    $("<input type='hidden'>").attr( { 
                        name: $(this).attr('name'), 
                        value: $(this).attr('value') })
                );
            }
        });
    $("form").submit(function( event ) {
      event.preventDefault();
      //alert( "Handler for .submit() called." );
      var data = $(this).serialize();
      //var data = JSON.stringify($(this));
      console.log("form.submit: "+data);
      load_content(data);
    });
}
/**
 *
 */
function load_content_return(payload){
  //console.log("last_payload: "+last_payload+" ("+typeof(last_payload)+")");
  var tmp_last_payload = "";
  var new_payload = "";
  if(typeof(last_payload) == 'object'){
    if(!$.isEmptyObject(last_payload)){
      tmp_last_payload = object_to_param(last_payload);
      //console.log(tmp_last_payload);
    }
  }
  else{
    tmp_last_payload = last_payload;
  }
  new_payload = payload+"&return="+encodeURIComponent(tmp_last_payload);
  //console.log("load_content_return: "+new_payload);
  load_content(new_payload);
}
/**
 *
 */
function object_to_param(payload_object){
  var tmp = [];
  var keys = Object.keys(payload_object);
  for(var i=0;i<keys.length;i++){
    tmp[i] = keys[i]+"="+payload_object[keys[i]];
  }
  tmp = tmp.join("&");
  return tmp;
}
/**
 *
 */
function load_overlay(payload={}){
  console.log("load_overlay");
  console.log(payload);
  var div = "#grape_overlay";
  load_content(payload,div);
}
function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}
load_content();

      </script>
  </body>
</html>
