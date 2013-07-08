<!DOCTYPE html>
<html>
<head>
<title>傳閱喵喵</title>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/index.css" rel="stylesheet" media="screen">

<style type="text/css"> 
.ui-helper-hidden-accessible {
	display: none;
}
/*
#q {
	width: 300px;
}
#data {
	width: 500px;
	height: 400px;
} 

#serial_num {
	width: 30px;
} */

</style> 

</head>

<body>
<div class="container">
	<div class="logo">
		<h1>傳閱<img src="img/cat.png" class="img-circle"></img>喵喵</h1>	
		<legend></legend>
	</div>

	<form action="gen_pdf.php" method="POST">
		<table>
			<tr>
				<td><textarea class="span6" rows="20" id="data" name="data"></textarea></td>	
				<td valign="top"> <input type="text" class="span4" id="q" name="q" autocomplete=off  autofocus="autofocus" placeholder="我聞到了傳閱的味道~喵~"></input>

					<a href="#" type="button" id="q_btn" value="Add" class="btn" class="span1"  onclick="add_one()"><i class="icon-plus"></i></a>
					<input type="submit" value="產生" class="span1 btn btn-primary"></input>

				</td>
			</tr>
		</table>
	</form>
</div>



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/ac_utf8.js"></script>
<script>

$("#q").typeahead({source: ac_data, items: 15 }) ;

function sort_textarea( text ){
	var tmp = text.split("\n").sort().join("\n").trim();	
	return tmp 

}


function add_one(){
	var tmp_text= "";
	//var serial_num = parseInt( $("#serial_num").val() );
	//tmp_text += (serial_num +".\t" );
	//$("#serial_num").val( serial_num + 1 ) ;
    var book_title = $("#q").val() ;
	tmp_text += book_title ;
	
	$("#data").val( $("#data").val() +"\n" + tmp_text  );
	$("#data").val( sort_textarea( $("#data").val() ) ) ;
	$("#q").val("");
}

//$("#q").bind('keypress', false);

$("#q").keypress( function( e ){
 	var code = (e.keyCode ? e.keyCode : e.which);

	if( code == 13){
//	e.preventDefault();

		e.preventDefault();
		add_one();
	}
});

</script>


</body>
</html>
