$(document).ready(function(){

	

// start 
	function start(){
		// initial state
		window.imgNum=$('input[name=imgNum]').val();// Number of pictures exist
		if (window.imgNum<5){
			window.pageMax=window.imgNum
		} else {
			window.pageMax = 5; // Tumb pictures to display
		}

		window.x = 0 ; 
		window.y = pageMax;
		window.z = Math.floor(pageMax/2); 

		window.centerImg = z;

		
		tumborder(window.x+centerImg);
		$('.tumb').slice(pageMax).hide();

		$('.tumb').on('mouseover',function(){
			tumborder($(this).index()-2);
		});
		$('.tumb-imgs').on('mouseleave',function(){
			tumborder(window.x+window.z);
		});
	};

// change main picture
	function changeBG(name){
		var parts = name.split('/');
    	name = parts[parts.length-1];
		$("#mainImg").attr('src','/symPort/web/pictures/'+name);
	};

// highlight selected tumb img
	function tumborder(imgBorder){
		$("div.tumb-imgs").find("img").removeClass("selectedTumb");
		$("div.tumb-imgs").find("img").eq(imgBorder).addClass("selectedTumb");
	    changeBG($("div.tumb-imgs").find("img").eq(imgBorder).attr('src'));
	} ;

// next & prev functions
	function next(){
		if (window.x!=imgNum-pageMax && window.z>=window.centerImg) {
			$("div.tumb-imgs").find("img").eq(window.x).hide();
			window.x++;
			$("div.tumb-imgs").find("img").eq(window.y).show();
			window.y++;
			tumborder(window.x+window.z);
		} else if (window.x+window.z!=imgNum-1) {
			window.z++;
			tumborder(window.x+window.z);
		};
	};

	function prev(){
		if (window.y!=pageMax && window.z<=window.centerImg) {
				$("div.tumb-imgs").find("img").eq(window.y-1).hide();
				window.y--;	
				$("div.tumb-imgs").find("img").eq(window.x-1).show();
				window.x--;
		tumborder(window.x+window.z);
		} else if (window.x+window.z!=0) {
				window.z--;
				tumborder(window.x+window.z);
		};
	};

// Show arrows on main picture

	$('a.prev').mouseover(function() {
		$(this).css('background-image', 'url("/symPort/web/images/prev.png")');
	});
	$('a.next').mouseover(function() {
		$(this).css('background-image', 'url("/symPort/web/images/next.png")');
	});

	$('a.prev').mouseout(function() {
	  $(this).css('background-image', 'none');
	});
	$('a.next').mouseout(function() {
	  $(this).css('background-image', 'none');
	});

// Bind next & prev functions to:

// Main img click
	$('a.prev').on('click',prev);
	$('a.next').on('click',next);
// Keyboard right&left keys
	$('body').keydown(function(e) {
	  if(e.keyCode == 37) { // left
		prev();
	  }
	  else if(e.keyCode == 39) { // right
		next();
	  }
	  else if(e.keyCode == 27) { // esc
		close();
	  }
	});
// Mousewheel:
	$('body').bind('mousewheel', function(e){
        if(e.originalEvent.wheelDelta /120 > 0) {
            prev();
        }
        else{
            next();
        }
    });
// End of bind functions.


	function close(){
		$('div.container').fadeToggle("fast");
		$('div.overlay').fadeToggle("fast");
	}

	$('img.close').on('click',function(){
		close();
	});



	$('div.title').on('click',function(){
		name=$(this).data('name');
		if ($('input').val() != name) {
			$('div.tumb-imgs').load('/symPort/web/sets/'+name+'.set', function() {
				start();

			});
		};
		$('div.container').fadeToggle();
		$('div.overlay').fadeToggle();
	});



	$('div.title').mouseover(function() {
		$("div.titles").find("span").hide();
		$(this).find("span").show();
	});

	$('div.titles').mouseout(function() {
		$("div.titles").find("span").hide();
		
	});


});