
var candidates = ["rand+paul", "hillary+clinton", "ted+cruz", "marco+rubio"];



for (i = 0; i < candidates.length ; i++){
    

var candidate = candidates[i];
//console.log(candidate);

writeArticle();
}



function writeArticle(){
var url = "http://api.nytimes.com/svc/search/v2/articlesearch.json?callback=svc_search_v2_articlesearch&q=%22"+candidate+"%22&begin_date=20150412&sort=newest&api-key=788074c0ec3789cdaf0a2457d228fe95%3A8%3A40777465";	
$(function() {
    
   var html = ""
    
		$.ajax({
			type: "GET",
			dataType: "json",
			cache: false,
			url: url,
			success: parseData
		});
                
   
				
function parseData(json){
			//console.log(json);
			html += candidate;
			$.each(json.response.docs,function(i,docs){
                                
                                html += 'TITLE:' + docs.headline.main;
                                html += '</br>';
			});
			
			//console.log(html);
			$("#newsfeed").append(html);
			
		}
		
		
                
               
 });


}


