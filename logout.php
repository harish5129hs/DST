<?php 

session_start();
session_unset(); 
session_destroy();

setcookie('username','',time()-72000000);
//echo $_COOKIE['username'];

//header('Location:login.html');
?>
<!DOCTYPE html>
<html>
<head>
	<title>logout</title>
	<meta name="google-signin-client_id" content="179148926648-jjjgm0p6m6661k1stqm70ue5roqud17g.apps.googleusercontent.com">
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="https://apis.google.com/js/platform.js?onload=glogout" async defer></script>
<script type="text/javascript">

	

var gload=0;
var fload=0;

function glogout() {
	gapi.load('auth2', function() {
		gapi.auth2.init({client_id: '179148926648-jjjgm0p6m6661k1stqm70ue5roqud17g.apps.googleusercontent.com'}).then(function() {
			var auth2 = gapi.auth2.getAuthInstance();
			if( auth2.isSignedIn.get() ) {
				auth2.signOut().then(function() {
					gload=1;
					logout(1);
				});
			}
			else{
				fbout();
			}
			
		});
	});
}

function fbout(){

	window.fbAsyncInit = function() {
		FB.init({
		appId      : '261392510921227',
		cookie     : true,  // enable cookies to allow the server to access 
		                    // the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.5' // use graph api version 2.5
		});

		FB.getLoginStatus(function(response) {
			fbload=1;
			if(response.status === 'connected') {
				FB.logout(function(response){
					logout(1);
				});
			}else{
				logout(1);
			}
		});
				
			
	};



	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

}

	function logout(fl){
		window.location.href="login.html";	
	}

  
</script>

</head>
<body>

</body>
</html>