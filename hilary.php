<html>
    <head>
        
        
    </head>
    <body>
        


<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "2350169221-zxSNpuQ96xLdFrzPDXpw1xyoqLrYqzrRHt5h76C",
    'oauth_access_token_secret' => "2WwITmH922Aelg09h44tOj1hQJx6ZftjFOCtNLR2JkC0m",
    'consumer_key' => "drv3fZxYktWKTRAKQVmn74qWc",
    'consumer_secret' => "ykKLRreRi1vp8kqyRUD5XZvjSAjWFnwu8CII7vFT9cLgIb18Yt"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ 
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$requestMethod = 'GET';
**/
/** POST fields required by the URL above. See relevant docs as above
$postfields = array(
    'screen_name' => 'hillaryclinton', 
    'skip_status' => '1'
);
 **/
/** Perform a POST request and echo the response 
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();
**/
/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=HillaryClinton';
$getfield = '?screen_name=HillaryClinton';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

$tweetData = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(), $assoc=TRUE);

echo $tweetData;

$media_url = $tweetData->entities->media[0]->media_url;

foreach($tweetData as $items)
{
    
    echo "<div class='twitter-tweet'>Tweet: " . $items['text'] . "</div>";
    echo "When: " . $items['created_at'] . "</br>";
    echo "Name: " . $items['user']['name'] . "</br>";
    echo "<img src='" . $items['user']['profile_image_url'] . "' ></br>";   
    echo $items['entities']['media']['media_url'];
    echo "<img src='". $media_url ."'/>";
    echo ['coordinates'];
 
    
};
 

?>
    </body>
</html><?php

?>