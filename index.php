<html>
<head>
<title >D3 example ez</title>
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js"></script>

<style type="text/css">
body{
	font-family: "Quicksand"
}
input[type=text],  input[type=password] {
width: 100%;
font-size: 1.1rem;
font-family: "quicksand";
height: 35px;
margin-bottom: 10px;
padding-left: 15px;
border: none;
background: transparent;
color: #0478e1;
border-radius: 0px;
outline: none;
border-bottom: solid 1px #0478e1;
}
::-webkit-input-placeholder {
   color: grey;
}

:-moz-placeholder { /* Firefox 18- */
   color: grey;  
}

::-moz-placeholder {  /* Firefox 19+ */
   color: grey;  
}

:-ms-input-placeholder {  
   color: grey;  
}
.submit:hover {
	background: #bc15fe
}
.submit {
    color: white;
    background: #0478e1;
    width: 100%;
    text-align: CENTER;
    padding-top: 10px;
    padding-bottom: 10px;
    -webkit-transition: all .2s linear;
-moz-transition: all .2s linear;
-ms-transition: all .2s linear;
-o-transition: all .2s linear;
transition: all .2s linear;
}

.question {
    margin: auto;
    width: 50%;
    position: relative;   top: 50%;   -webkit-transform: translateY(-50%);   -ms-transform: translateY(-50%);   transform: translateY(-50%);
}

.container {
    height: 100%;
    width: 100%;
}
</style>
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '819539218093724',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div class="container">
	<div class="question">	 
		<input type="text" id="query" placeholder="Enter Query Here"/>
		<div class="submit"><div> SUBMIT</div></div>
	</div>
	<div class="svg-holder">
	</div>

</div>
<script type="text/javascript">
	$(".submit").click( function(){
		var info= $("#query").val();
		if( info==""|| info==null){
			$("#query").css({"border": "solid 1px red"})
		}
		else{
			var json  = query(info);
			//populateSvg(json)
		}
	});
//https://angel.co/api/oauth/token?client_id=b977571055dd8668fc96c39b5bfec3ec93211f6f03dd9ca2&client_secret=3a08f1a95ceea606c7b3775996322c7ac8dcc9e599fb2d9f&code=...& grant_type=authorization_code

	var query = function(str) {
		 //https://api.angel.co/1/search?query=barack&type=User
		 var url2 = "https://api.angel.co/1/search?query=" + str+"&type=User&callback=?";
		 var url3 = "https://angel.co/api/oauth/token?" + "client_id=" + "d36a0e785b2b1298665f60b69cc31f671d0b96c6a15349ea" + 
		 			"&client_secret=" + "a53052438e8526c07074c96c9bfbd13c7839f52ecf367048";
		 var url4="https://api.angel.co/1/startups/6702"
		 console.log(url2)
     $.getJSON(url2, null, function(data){
      console.log(data);
     })
		 
	}



/*
 I could use a library to do it but i jsut used and article off stack overflow  to get this processData code
*/

function processData(allText) {
    var record_num = 5;  // or however many elements there are in each row
    var allTextLines = allText.split(/\r\n|\n/);
    var entries = allTextLines[0].split(',');
    var lines = [];

    var headings = entries.splice(0,record_num);
    while (entries.length>0) {
        var tarr = [];
        for (var j=0; j<record_num; j++) {
            tarr.push(headings[j]+":"+entries.shift());
        }
        lines.push(tarr);
    }
    // alert(lines);
    console.log(lines);
    return lines;
}


  var parseCSV = function(file){
    var toReturn=null;
   $.ajax({
        type: "GET",
        url: file,
       
        success: function(data) {
          return processData(data);}
     });


  }

  

	</script>
<!--
	<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
     else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '819539218093724',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }


  FB.api("  /me/friends",function callback (response) {
  		console.log(response);
  })

  /user




</script>


<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status"> -->
</div>



</body>
</html>