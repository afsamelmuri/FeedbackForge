/*
// ------------------------------------------------------------------------
 * MapFun - An premium application
 *
 * @package		MapFun Ver 1.0
 * @author		Sachin Ghare
 * @copyright	Copyright (c) 2016 - Sachin Ghare
 * @link		http://www.sachinghare.com
 * @since		Version 1.0
// ------------------------------------------------------------------------
*/

//Loading
$(window).load(function() {
	$(".loading").fadeOut("slow");
	$("#site-content").fadeIn(3000);
});
$('input.gads[type="radio"]').checkboxpicker({html: true, onLabel:"ON",offLabel:"OFF"});

//Menu Function
$(document).ready(function(){		
$('button#addmap').on("click", function (e) {
      var location = $('#flapt').val(); 
      if ( location != "" && location > -90 && location < 90) {
    }
  else {
       alert("Invalid Latitude");
	   return false;
    }
});
$('button#addmap').on("click", function (e) {
      var location = $('#flngtude').val(); 
      if ( location != "" && location > -90 && location < 175) {
    }
  else {
       alert("Invalid Longitude");
	   return false;
    }            
});
$("i").tooltip({
    'selector': '',
    'placement': 'top',
    'container':'body'
  });
var url = window.location.href;
    $('.nav li a[href="'+url+'"]').addClass('current');
		$(".submenu > a").click(function(e) {
			e.preventDefault();
			var $li = $(this).parent("li");
			var $ul = $(this).next("ul");
		
			if($li.hasClass("open")) {
			  $ul.slideUp(350);
			  $li.removeClass("open");
			} else {
			  $(".nav > li > ul").slideUp(350);
			  $(".nav > li").removeClass("open");
			  $ul.slideDown(350);
			  $li.addClass("open");
			}
	 });
			$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	$("select#infoanim").change(function(e){
        $('#showanim').show();
		e.preventDefault();
		var selectedClass = $("#infoanim option:selected").val();
		//alert('animated ' + "" + selectedClass);
		$('#showanim').removeClass().addClass('animated ' + "" + selectedClass);
    });
	$('#showanim').hide();
	return false;
});

//Password Check Function
function checkPass()
    {
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field 
        //and the confirmation field
        if(pass1.value == pass2.value){
            //The passwords match. 
            //Set the color to the good color and inform
            //the user that they have entered the correct password 
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
			document.getElementById("update-profile").style.visibility = "visible";
            message.innerHTML = "Passwords Match!"
        }else{
            //The passwords do not match.
            //Set the color to the bad color and
            //notify the user.
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
			document.getElementById("update-profile").style.visibility = "hidden";
            message.innerHTML = "Passwords Do Not Match!"
       }
}  

//Open Feedback Modal
	$(document).on("click", ".open-feed", function (e) {
    e.preventDefault();
    var _self = $(this);
    var FeedId = _self.data('id');
	$(_self.attr('href')).modal('show');
	$.ajax({
        type: 'POST',
        url: 'resource/classes/feeds.php',
        data: { feedid: FeedId },
        success: function(response) {
            $('#feed-show').html(response);
        }
    });
});
//
