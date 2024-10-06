$(window).load(function() {
	$(".loading").fadeOut("slow");
	$("#map_canvas").fadeIn(2000);
})
$(document).ready(function() {
$('.selectpicker').selectpicker({
  style: 'btn-danger',
  size: 4,
  iconBase: 'glyphicon',
  tickIcon: 'glyphicon-ok'
	});
});

$(document).on("click", ".open-gallery", function (e) {
    e.preventDefault();
    var _self = $(this);
	$("#myModalLabel").text("Gallery");
    var myGalId = _self.data('id');
    $("#GalId").val(myGalId);
	$(_self.attr('href')).modal('show');
	$.ajax({
        type: 'POST',
        url: 'resource/classes/gallery.php',
        data: { cust_id: myGalId },
        success: function(response) {
            $('#result').html(response);
        }
    });
});
$(document).on("click", ".open-video", function (e) {
    e.preventDefault();
    var _self = $(this);
	$("#myModalLabel").text("Video");
    var myVidId = _self.data('id');
	$(_self.attr('href')).modal('show');
	$.ajax({
        type: 'POST',
        url: 'resource/classes/video.php',
        data: { vidid: myVidId },
        success: function(response) {
            $('#result').html(response);
        }
    });
});
$(document).on("click", ".OpenComm", function (e) {
    e.preventDefault();
    var _self = $(this);
	$("#myModalLabel").text("Comments");
    var myComId = _self.data('id');
	$(_self.attr('href')).modal('show');
	$.ajax({
        type: 'POST',
        url: 'resource/classes/getcom.php',
        data: { comid: myComId },
        success: function(response) {
            $('#result').html(response);
        }
    });
});
$(document).on("click", ".getdirection", function (e) {
    e.preventDefault();
    var _self = $(this);	
    var myLocId = _self.data('id');
	$(_self.attr('href')).modal('show');
	$.ajax({
        type: 'POST',
        url: 'resource/classes/directions.php',
        data: { locateid: myLocId },
        success: function(response) {
            $('#directionservice').html(response);
        }
    });
});
$(document).on("click", ".SendMail", function (e) {
    e.preventDefault();
    var _self = $(this);
	$("#myModalLabel").text("Send Enquiry");
    var myMailId = _self.data('id');
	$(_self.attr('href')).modal('show');
	$.ajax({
        type: 'POST',
        url: 'resource/classes/contact.php',
        data: { contactid: myMailId },
        success: function(response) {
            $('#result').html(response);
        }
    });
});
$(function(){
    $('.close').click(function(){      
        $('iframe').attr('src', $('iframe').attr('src'));
    });
});