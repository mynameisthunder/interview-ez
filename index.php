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
			populateSvg(json)
		}
	});
//https://angel.co/api/oauth/token?client_id=b977571055dd8668fc96c39b5bfec3ec93211f6f03dd9ca2&client_secret=3a08f1a95ceea606c7b3775996322c7ac8dcc9e599fb2d9f&code=...& grant_type=authorization_code

	var query = function(str) {
		 //https://api.angel.co/1/search?query=barack&type=User
		 var url = "https://api.angel.co/1/search?query=" + str+"&type=User"+"&client_id="+"e4a4b19626ddde7b6fadeb1851c5002215bd0b04f418e155";
		 console.log(url)
		 $.getJSON(url, function(data){
				console.log(data);
			});
		 
	}

</script>


</body>
</html>