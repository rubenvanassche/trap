$(document).ready(function(){
	//var windowHeight = $(window).height();
	$('#header #title i').popover({'content':'<span id="dropmenu"><span id="startlink">Start</span><br/><span id="updateslink">Updates</span><br /><span id="infolink">Informatie</span><br /><span id="helplink">Help Ons</span><br /><span id="mercilink">Merci</a></li></ul></span>', 'placement':'bottom', 'html':true});
	//$('#home').css('height', windowHeight+'px');
	
	$("span.datum").text(function(){
		return $.timeago($(this).text());
	});
	
	function changeMenuTitle(title){
		var titles = Array();
		titles['Start'] = '#FF851B';
		titles['Updates'] = '#85144B';
		titles['Informatie'] = '#0074D9';
		titles['Help Ons'] = '#2ECC40';
		titles['Merci'] = '#FF4136';
		
		$('#header #title #sectiontitle').html(title);
		$('#header #title #sectiontitle').css('color', titles[title]);
		$('#header #title i').css('color', titles[title]);
	}
	
	function scrollTo(section){
		$('html, body').animate({scrollTop:$(section).offset().top}, 'slow');
	}
	
	$('#home').waypoint(function(direction) {
	  changeMenuTitle('Start')
	});
	
	$("span#infolink").click(function(e){
	    alert('test');
	});
	
	$('#updates').waypoint(function(direction) {
		if(direction == 'down'){
			changeMenuTitle('Updates');
		}else{
			changeMenuTitle('Start');
		}
	},{'offset':'40'});
	
	$('#info').waypoint(function(direction) {
		if(direction == 'down'){
			changeMenuTitle('Informatie')
		}else{
			changeMenuTitle('Updates')
		}
	},{'offset':'40'});
	
	$('#help').waypoint(function(direction) {
		if(direction == 'down'){
			changeMenuTitle('Help Ons')
		}else{
			changeMenuTitle('Informatie')
		}
	},{'offset':'40'});
	
	$('#merci').waypoint(function(direction) {
		if(direction == 'down'){
			changeMenuTitle('Merci')
		}else{
			changeMenuTitle('Help Ons')
		}
	},{'offset':'40'});
});