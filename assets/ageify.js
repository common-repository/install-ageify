var protocol = "https";
//var host = "replaceHost";
//var port = "replacePort";
//var host = "localhost";
var host = "api-prod.age-ify.com";
var port = "8081";
var context = "/v1/api/accessToken";

//var url = protocol + "://" + host + ":" + port + context;
var url = protocol + "://" + host + context;
(function() {
	jQuery(document).ready(function() {		 
		 ageify();
	});	
}());

function ageify() {
	var cookie = get_cookie(function(result){
		if (!result)
			initiateVerification();
		else {

		}
	});
}

function showAlert() {
    $(".modal").fadeTo(2000, 500).slideUp(500, function(){
    	$(".modal").slideUp(500);
    });
}

function initiateVerification() {
	jQuery.ajax({
		type: 'GET',
		url: url + "?trackingId=" +  jQuery("#trackingIdentifier").val(),
		success : function(data){
			//console.log(data);
			jQuery("#ageifyWrapper").html(data);
		},
		error: function(result) {
			//console.log(result);
		}
	});
}

function initAGEifyVerification() {
	var reqData = '{"trackingId" : "' + jQuery("#trackingIdentifier").val() +'"}';
	jQuery.ajax({
		type: 'POST',
		url: url,
		contentType : 'application/json',

		data: reqData,
		success : function(data){
			console.log(data);
			jQuery("#options").hide();
			jQuery("#qrCodeWrapper").html(data);
		},
		error: function(result) {
			//console.log(result);
		}
	});
}

function checkStatus() {            	
	var tokenStatusUrl = url + "/" + $("#accessToken").val() + "/status"; 
    jQuery.ajax({
		url: tokenStatusUrl, 
		type: 'GET',
		success: function(data) {
			if (data.status == "SUCCESS") 
			{
		        clearInterval(timer);
		        handleSuccess(data.cookieValue);
		        
		    } 
			else if (data.status == "FAILURE" || data.status == "EXPIRED") {
				//alert(data.status + " TODO show something!")
				clearInterval(timer);
			}
		},
		error : function(jqXHR, textStatus, errorThrown) {
		}
	});
}

function stopCheck() {
	clearInterval(timer);
	var data = "<div class='text-center'><h3>Session Expired<br/><br/><small>Please refresh your browser</small></h3><br /></div>";
	$(".modal-body").html(data);
}

function handleSuccess(cookieVal) {
	$('.modal-body').html("Thank you for verifying your age with Age Gate! <br /><br/>You will be redirected to the site now.. <br />");
	setTimeout(function(){showAlert()
		//var successRedirectUrl = window.location.origin;
		var successRedirectUrl = window.location.href;
		if(successRedirectUrl.indexOf('#')>0) {
			successRedirectUrl = successRedirectUrl.substr(0, successRedirectUrl.indexOf('#'));
		}
		set_cookie(cookieVal);
		window.location.href = successRedirectUrl;
	}, 5000);
	
	
}

function set_cookie(value) {
    var secs = 1800;
    var now = new Date();
    var exp = new Date(now.getTime() + secs*1000);
    var status = '';
    document.cookie = 'AGEifyAccessToken=' + value + '; expires='+exp.toUTCString();
    if (document.cookie && document.cookie.indexOf('AGEifyAccessToken=') != -1) {
    	
        status = 'Cookie successfully set. Expiration in '+secs+' seconds';
        
    } else {
        status = 'Cookie NOT set. Please make sure your browser is accepting cookies';
       
    }
    console.log(status);
}

function get_cookie(cb) {

	if (getSessionValue("AGEifyAccessToken") == "TRUE") {
		cb(true);
	} else {

		var status = '';
		if (document.cookie && document.cookie.indexOf('AGEifyAccessToken=') != -1) {
			var sessionStatusUrl = protocol + "://" + host + "/v1/api/session/" + getSessionValue("AGEifyAccessToken") + "/status"; 
			$.ajax({
				url: sessionStatusUrl, 
				type: 'POST',
				success: function(data) {
					if (data == true) {
						if (cb)
							cb(true);
						//return true;   
					} else  {
						if (cb)
							cb(false);
						//return false;

					}
				},
				error : function(jqXHR, textStatus, errorThrown) {
					if (cb)
						cb(false);
					//return false
				}
			});



		} else {
			if (cb)
				cb(false);
//			return false;
		}
	}
	//console.log(status);

}


function delete_cookie() {
	  document.cookie = 'AGEifyAccessToken=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';	  
}



function getSessionValue(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}