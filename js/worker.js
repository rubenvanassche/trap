	function scrollTo(section){
		$('html, body').animate({scrollTop:$(section).offset().top}, 'slow');
		document.location.hash = section;
	}

$(document).ready(function(){
	//var windowHeight = $(window).height();
	$('#header #title i').popover({'content':'<span id="dropmenu"><span id="startlink">Start</span><br/><span id="updateslink">Updates</span><br /><span id="infolink">Informatie</span><br /><span id="helplink">Help Ons</span><br /><span id="mercilink">Merci</a></span>', 'placement':'bottom', 'html':true});
	//$('#home').css('height', windowHeight+'px');
	
	$("span.datum").text(function(){
		return $.timeago($(this).text());
	});
	
	function changeMenuTitle(titleNew, titleOld){
		var titles = Array();
		titles['Start'] = '#FF851B';
		titles['Updates'] = '#85144B';
		titles['Informatie'] = '#0074D9';
		titles['Help Ons'] = '#2ECC40';
		titles['Merci'] = '#FF4136';
		
		var selectors = Array();
		selectors['Start'] = 'startlink';
		selectors['Updates'] = 'updateslink';
		selectors['Informatie'] = 'infolink';
		selectors['Help Ons'] = 'helplink';
		selectors['Merci'] = 'mercilink';
		
		$("#menu ul li#"+selectors[titleNew]).addClass('active');
		$("#menu ul li#"+selectors[titleOld]).removeClass('active');
	}
	
	$('#home').waypoint(function(direction) {
	  changeMenuTitle('Start', '')
	});
	
	$("span#infolink").click(function(e){
	    alert('test');
	});
	
	$('#updates').waypoint(function(direction) {
		if(direction == 'down'){
			changeMenuTitle('Updates','Start');
		}else{
			changeMenuTitle('Start','Updates');
		}
	},{'offset':'40'});
	
	$('#info').waypoint(function(direction) {
		if(direction == 'down'){
			changeMenuTitle('Informatie','Updates')
		}else{
			changeMenuTitle('Updates','Informatie')
		}
	},{'offset':'40'});
	
	$('#help').waypoint(function(direction) {
		if(direction == 'down'){
			changeMenuTitle('Help Ons','Informatie')
		}else{
			changeMenuTitle('Informatie','Help Ons')
		}
	},{'offset':'40'});
	
	$('#merci').waypoint(function(direction) {
		if(direction == 'down'){
			changeMenuTitle('Merci','Help Ons')
		}else{
			changeMenuTitle('Help Ons','Merci')
		}
	},{'offset':'40'});
});