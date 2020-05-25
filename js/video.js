function video(url,titulo){ 
        $.ajax({
                data: {url1:url,titulo1:titulo},
                method:"GET",
				url:'controles/video.php',
				success:function(data){
					$("#video").html(data).fadeIn(6000);	
				}
			})
}

function videotoshiba(url,titulo){ 
        $.ajax({
                data: {url1:url,titulo1:titulo},
                method:"GET",
				url:'controles/video-toshiba.php',
				success:function(data){
					$("#video").html(data).fadeIn(6000);	
				}
			})
}

