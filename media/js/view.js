function addLikes(id,actionlike) {
	$.post("index.php?ctl=home&act=likepost",
	{
		id: id,
		actionlike: actionlike
	},
	function(data,success){
		var likes = parseInt($('#likes-'+id).val());
		console.log(likes);
		switch(actionlike) {
			case "like":
			$('#post-'+id+' .btn-likes').html('<input type="button"  title="Unlike" class=" bt p-float p-style unlike" onClick="addLikes('+id+',\'unlike\')" />');
			likes = likes+1;
			break;
			case "unlike":
			$('#post-'+id+' .btn-likes').html('<input type="button"  title="Like" class="bt p-float p-style like"  onClick="addLikes('+id+',\'like\')" />')
			likes = likes-1;
			break;
		}
		$('#likes-'+id).val(likes);
			if(likes>0) {
				$('#post-'+id+' .label-likes').html(likes+" Like(s)");
			} else {
				$('#post-'+id+' .label-likes').html('');
			}
		})
}
$(function(){
		$(".comments-link").on("click", function( event ){
		    event.preventDefault();                                     
		    $(".comment-form-container").fadeToggle('1000','linear');
		 });
		var i = 0;
		var idx =parseInt($("#idCmt").val());
		$(".comment-form-container form").on("submit", function( event ){
		    event.preventDefault();   
		    var strP = "media/upload/profile/"+$("#photo").val();          
		    var cmt =$("#comment").val(); 
		    var id =$("#cmt-for-post").val();
		    var name =$("#id-for-cmt ").val();
		    var cnt =parseInt($("#countCmt").val());
		    $.post("index.php?ctl=detail&act=comment",
			{   
				id : id,
				cmt: cmt
			},
			function(data,success){
				var dataCmt = JSON.parse(data).comment;
				i = i+1;	
			  	$( ".iner-comments" ).prepend("<div class='media media-styles' style='margin-top:0px;'><img class='mr-3 img-thumbnail' width='4%' src='"+strP+"'><div class='media-body'><p style = 'float:left;margin-right:5px; '>"+name+" :</p><p id='cmt-"+i+"'></p></div></div>"); 		
			  	$('#cmt-'+i).html(dataCmt);	
			  	cnt = cnt +1;
			  	$('#addCnt').html(cnt);
			  	$("#countCmt").val(cnt);	
			  	$('#comment').val("");	
			})				  
		});
});