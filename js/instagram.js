// JavaScript Document


//Use this url below to get your access token
//https://instagram.com/oauth/authorize/?display=touch&client_id=f0cc4935e62a491daac3fb815021a868&redirect_uri=http://ellakoeze.com/projects/j586/project4&response_type=token 

//if you need a user id for yourself or someone else use:
//http://jelled.com/instagram/lookup-user-id



var candidatesId = ["541357095", "42881220", "638343424", "180329950"];	
var access_token = location.hash.split('=')[1];

for (i = 0; i < candidatesId.length; i++){
	
var candidateId = candidatesId[i];

console.log(candidatesId[1]);

makePictures();



}

function makePictures(){
var apiurl = "https://api.instagram.com/v1/users/"+candidateId+"/media/recent?access_token=1156522138.f0cc493.4defc6018ca844dbb0f27858f8a09135&callback=?";
var pageId = candidateId;
$(function() {
	
	
	var html = ""
	//console.log(apiurl);
		$.ajax({
			type: "GET",
			dataType: "json",
			cache: false,
			url: apiurl,
			success: parseData
		});
				
		
		function parseData(json){
			console.log(json);
			
			//html+= candidateId;
			
			
			$.each(json.data,function(i,data){
				
				html += '<div class="insta"><img src ="' + data.images.low_resolution.url + '">'
				if (data.caption !== null) {
				html += '<p class="insta-caption">'+ data.caption.text+'"</p>';
				};
				html += '</div>';
			});
			
			//console.log(html);
			console.log("#"+pageId)
			$("#"+pageId).append(html);
			
		}
		
		
                
               
 });

console.log("I've run how many times?");

}



