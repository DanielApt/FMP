$(document).ready(function(){
	var $intro = $('.intro');
	var $test = $('.test');
	var $tap = $('.tap');
	var $remainingTaps = $('.remaining-taps');
	var $afterSubmit = $('.after-submit');
	var remainingTaps = 6;
	var currentAttempt = 1;
	var d;

	//events
	$('.show-test').click(function(){
		$intro.slideUp();
		$test.slideDown();
	});

	$('.start-test').click(function(){
		$(this).animate({'width':0, 'padding':0}, function(){$(this).hide();});

		d = new Date();
		$('#starting-time').val(d.getTime());

		$tap.removeAttr('disabled');
	});

	$('.tap').click(function(){
		//reduce the remaining tap count
		remainingTaps--;
		d = new Date();

		$('#attempt-' + currentAttempt).val(d.getTime());

		if(remainingTaps===0){
			finishTest();
			submitTest();
		}

		//display the new count
		$remainingTaps.text(remainingTaps);

		currentAttempt++;
	});

	function submitTest(){
		$.ajax({
			url:'form.php',
			type:'post',
			dataType:'html',
			data: $('form').serialize(),
			success:function(data){
				$afterSubmit.html(data);
				$afterSubmit.slideDown();
			}
		});
	}

	function finishTest(){
		$test.slideUp();
	}
});