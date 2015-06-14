// focus ¤ blur effekt på textarea - Overall script

	$(document).ready(function(){
	$("input, textarea").focus(function(){
	$(this).css("background-color","#cccccc");
		});
	$("input, textarea").blur(function(){
	$(this).css("background-color","#ffffff");
		});
		});
		
// Beställa dricka med Ajax Post, PHP Script - Ajax.php
function ajax_post(){

    // Skapa ett XMLHttpRequest objekt
    var hr = new XMLHttpRequest();
   
    // Skapar variabler för att skicka till våran AjaxPost.php fil, ligger i www mappen.
    var url = "AjaxPost.php";
    var fn = document.getElementById("namn").value;
    var ln = document.getElementById("dricka").value;
    var vars = "namn="+fn+"&dricka="+ln;
	// Kör en open
    hr.open("POST", url, true);
	
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
    // Skickar data
    hr.onreadystatechange = function() {
  	if(hr.readyState == 4 && hr.status == 200) {

  	var return_data = hr.responseText;
	document.getElementById("output").innerHTML = return_data;
   }
 }
	
    // Kör send.
    hr.send(vars); // Actually execute the request
    document.getElementById("output").innerHTML = "processing...";
}

// Mouseenter & mouseleave script - Ajax.php
	$(".rubrik").mouseenter(function(){
	  $("#content").css({
		"background-color":"blue", 
		"border-color":"red"})
	  $("#wrapper").animate({width:'1000px'})
	});

	$(".rubrik").mouseleave(function(){
	  $("#content").css({
		"background-color":"#1F1F1F", 
		"border-color":"#eee"})
	  $("#wrapper").animate({width:'900px'})
	});

// Ta fram lite storlekar - Ajax.php
	function showWidth( ele, w ) {
	$( ".showWidth" ).text( "Bredden på " + ele + " är " + w + "px." );
	}
	$( "#getp" ).click(function() {
	showWidth( "text innehållet", $( "#content" ).width() );
	});
	$( "#getd" ).click(function() {
	showWidth( "hemsidan", $( "#wrapper" ).width() );
	});
	$("#getw").click(function() {
	showWidth( "webb fönstret", $( window ).width() );
	});

//Slider script för header bilderna

$(document).ready(function Slider(){
	$("#header #1").show("fade",50);
	$("#header #1").delay(3000).hide("slide",{direction: 'left'},50);
	
	var sc = $("#header img").size();
	var count = 2;
	
	setInterval(function (){
		$("#header #"+count).show("slide",{direction: 'right'},50);
		$("#header #"+count).delay(3000).hide("slide",{direction: 'left'},50);
		
		if(count == sc){
			count = 1;
		}else{
			count = count + 1;	
		}
	},3050);
});
 
 