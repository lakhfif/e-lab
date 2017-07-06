var timer;


function up(){
	timer = setTimeout(function()
	{
		var key = $("#search").val();

		if(key.length>0){

			$("#chercher").submit();
		}
	},500);
}


function down(){

	clearTimeout(timer);
}