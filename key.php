<html>
<head>
<script>
var times = [];
var shift_press=[];
var number_of_chars;
var total_time;
var CPS,count=0;
var error=[],error_time=[];
var sentence="The quick brown FOX jumps over the lazy DOG.";
var shift_style;
var spaces=[],spaces_diff=[];
var start_time,end_time,words_time;

function min(a,b){
	if(b==undefined)
		return a;
	else
	{
		if(a<b)
			return a;
		else
			return b;
	}
}

function max(a,b){
	if(b==undefined)
		return a;
	else
	{
		if(a>b)
			return a;
		else
			return b;
	}
}
</script>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<style>
	body{
		background-color: #1a1a1a;
	}
	
	#box{
		background-color: #595959;
		margin-left: 300px;
		margin-right: 300px;
		margin-top: 30px;
		padding: 50px;
		border-radius: 10px;
	}

	button{
		margin-top: 30px;	
	}

	@keyframes correct{
		from {background-color: green;}
		to {background-color: #1a1a1a;}
	}

	@keyframes wrong{
		from {background-color: red;}
		to {background-color: #1a1a1a;}
	}
</style>
</head>
<body id="body">
<h3 style="color:white; margin-left: 440px; margin-top: 150px;">The quick brown FOX jumps over the lazy DOG.</h3>
<div id="box">
<form class="form-horizontal">
	<input id="login" class="form-control" autocomplete="off">
	<center><button type="submit" class="btn btn-warning btn-lg">Submit</button></center>
</form>
</div>
</body>
</html>
<script src="js\jquery.js"></script>
<script>
$("#login").focus(function(){
  	
  	$('#login').keypress(function(evt) {
  		//console.log(count);
  		//console.log(String.fromCharCode(evt.which)==sentence[count]);
  		if(evt.which!=13 && String.fromCharCode(evt.which)==sentence[count])
    	{
    		times.push({"timestamp":evt.timeStamp});
//	    	key_sequence.push(evt.which);
	    	shift_press.push(evt.shiftKey);
	    	document.getElementById('body').style.animationName='correct';
			document.getElementById('body').style.animationDuration='0.8s';
	    	//console.log(evt.timeStamp);
			count++;
		}

		else if(evt.which!=13 && String.fromCharCode(evt.which)!=sentence[count])
		{
			error.push(evt.which);
			document.getElementById('body').style.animationName='wrong';
			document.getElementById('body').style.animationDuration='0.8s';
			error_time.push(evt.timeStamp);
		}

		if(evt.which==32)
		{
			spaces.push(evt.timeStamp);
			console.log(evt.timeStamp);
		}
		
	});
});

$("form").submit(function(e){
	e.preventDefault();

end_time=max(times[times.length-1].timestamp,error_time[error_time.length-1]);
start_time=min(times[0].timestamp,error_time[0]);
//alert(end_time);
//alert(start_time);
total_time=end_time-start_time;
//alert("Total time");
//alert(total_time);

spaces.push(start_time);
spaces.push(end_time);
spaces.sort(function(a, b){return a-b});
alert("Spaces array "+spaces);
number_of_chars=times.length+error.length;
CPS=number_of_chars/total_time*1000;

for(var i = 0; i < spaces.length - 1; ++i) 
{
 	spaces_diff.push(((spaces[i+1] - spaces[i])/1000).toFixed(5));
}

if(shift_press[0]==true && shift_press[16]==true && shift_press[17]==true && shift_press[18]==true && shift_press[40]==true && shift_press[41]==true && shift_press[42]==true)
{
	shift_style=1;
}

else if(shift_press[0]==false && shift_press[16]==false && shift_press[17]==false && shift_press[18]==false && shift_press[40]==false && shift_press[41]==false && shift_press[42]==false)
{
	shift_style=3;
}

else
{
	shift_style=2;
}

/*$('#CPS').val($('#CPS').val()+CPS);
$('#shift').val($('#shift').val()+shift_style);
$('#words').val($('#words').val()+words_time);*/


alert(CPS);

//alert(key_sequence);
//alert(time_diff);
//alert(shift_style);
//alert(error_time);
words_time=spaces_diff.join("_");
alert(words_time);

$.ajax({
    type: 'POST',
    url: 'key_validate.php',
    data: { 'CPS':CPS,'shift':shift_style,'words':words_time},
    success: function(response) {
    	//alert(response);
    	alert("Registration Successfull.");

    	},
    error: function(er){
    	alert("Error");
    	//alert(er);
    }
	});
//alert("GGG");
window.location.href="home.php";
});
</script>