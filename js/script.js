$(document).ready(function(){
	var $intro = $('.intro');
	var $test = $('.test');
	var $tap = $('.tap');
	var $remainingTaps = $('.remaining-taps');
	var $thankYou = $('.thank-you');
	var remainingTaps = 6;
	var d;
	var loggedTimes = [];//it will be [startTime, attempt1, attempt2, attempt3, attempt4, attempt5, attemp6]

	//events
	$('.show-test').click(function(){
		$intro.slideUp();
		$test.slideDown();
	});

	$('.start-test').click(function(){
		$(this).animate({'width':0, 'padding':0}, function(){$(this).hide();});

		d = new Date();
		loggedTimes.push(d.getTime());

		$tap.removeAttr('disabled');
	});

	$('.tap').click(function(){
		//reduce the remaining tap count
		remainingTaps--;
		d = new Date();
		loggedTimes.push(d.getTime());

		if(remainingTaps===0){
			finishTest();
		}

		//display the new count
		$remainingTaps.text(remainingTaps);

		//log the current time
		console.log(d.getTime());
	});

	function finishTest(){
		$test.slideUp();
		$thankYou.slideDown();

		console.log(loggedTimes);
	}
});