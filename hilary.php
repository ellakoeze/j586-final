<html>
    <head>
        <meta charset="UTF-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
         <link rel="stylesheet" href="css/twitter.css">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>  
         <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="js/tweetLinkIt.js"></script>
    </head>
    <body>
       <script>

    function pageComplete(){
        $('.tweet-content').tweetLinkify();
    }
   /* 
    function removeImg(){
        var img = document.getElementsByClassName("twitter-pic");
        var noPic="";
        console.log(img);
        for (i=0; i<11; i++) {
            var noPic= img[i];
            console.log(noPic);
            var src = img[i].attributes.src.textContent;
            console.log(src);
           if (src== "") {
            replace();
              }
         }
        function replace(){
            $(noPic).parent().replaceWith("");
            console.log("removed");
         };
       }
       */
  
</script>      


<?php
/*ini_set('display_errors', 1);*/
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "2350169221-zxSNpuQ96xLdFrzPDXpw1xyoqLrYqzrRHt5h76C",
    'oauth_access_token_secret' => "2WwITmH922Aelg09h44tOj1hQJx6ZftjFOCtNLR2JkC0m",
    'consumer_key' => "drv3fZxYktWKTRAKQVmn74qWc",
    'consumer_secret' => "ykKLRreRi1vp8kqyRUD5XZvjSAjWFnwu8CII7vFT9cLgIb18Yt"
);


$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "HillaryClinton";}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 20;}
$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}


foreach($string as $items)
    {
        
        $userArray = $items['user'];
        $entitiesArray = $items['entities'];
        $mediaArray = $entitiesArray['media'];
        $tweetMedia = $mediaArray[0];
        
        echo "<div class='tweet'><div class='tweet-header'><img src='" . $items['user']['profile_image_url'] . "' >"; 
        echo "<strong> ". $items['user']['name']."</strong>";
        echo "<span class='screen-name'>   @". $items['user']['screen_name']."</span></div>";
        echo "<div class='tweet-content'><p>". $items['text']. "</p>";
       
        echo $items['place']['name']."</div>";
         echo "<a target='_blank' href='http://www.twitter.com/" . $tweetMedia['media_url'] . "'><img class='twitter-pic' target='_blank' src='" . $tweetMedia['media_url'] . "'></a></div>";
        
    }
    echo "<script>pageComplete();</script>";
    //echo "<script>removeImg();</script>";
?>


    </body>
</html>