<?php

function social_media_counter_data(){

$smcounter =array();
$smcounter['facebook'] = $_POST['facebook'];
$smcounter['twitter'] = $_POST['twitter'];
$smcounter['instagram'] = $_POST['instagram'];
$smcounter['youtube'] = $_POST['youtube'];
$smcounter['soundcloud'] = $_POST['soundcloud'];
$smcounter['dribbble'] = $_POST['dribbble'];

	
	if(update_option('social-media-counter-artoon', serialize($smcounter))){
		echo "The social api has been save changes and publish";	
	}
	exit;
}

add_action( 'wp_ajax_social_media_counter_data', 'social_media_counter_data' );
add_action( 'wp_ajax_nopriv_social_media_counter_data', 'social_media_counter_data' );


function display_settings_data(){

$smcounter =array();
$smcounter['counter_format'] = $_POST['number_counter'];
$smcounter['display_theme'] = $_POST['display_theme'];

	
	if(update_option('social-media-counter-display-settings-artoon', serialize($smcounter))){
		echo "The display settings has been save changes and publish";	
	}
	exit;
}

add_action( 'wp_ajax_display_settings_data', 'display_settings_data' );
add_action( 'wp_ajax_nopriv_display_settings_data', 'display_settings_data' );

function authorization( $user, $consumer_key, $consumer_secret, $oauth_access_token, $oauth_access_token_secret ){
   	$query = 'screen_name=' . $user;
   	$signature = signature( $query, $consumer_key, $consumer_secret, $oauth_access_token, $oauth_access_token_secret );
	return header_twiiter( $signature );
}

function signature_base_string( $url, $query, $method, $params ){
   	$return = array();
   	ksort( $params );

   	foreach ( $params as $key => $value ) {
        $return[] = $key . '=' . $value;
   	}
	return $method . "&" . rawurlencode( $url ) . '&' . rawurlencode( implode( '&', $return ) ) . '%26' . rawurlencode( $query );
}

function signature( $query, $consumer_key, $consumer_secret, $oauth_access_token, $oauth_access_token_secret ){
	$oauth = array(
		'oauth_consumer_key' => $consumer_key, 
		'oauth_nonce' => hash_hmac( 'sha1', time(), true ), 
		'oauth_signature_method' => 'HMAC-SHA1', 
		'oauth_token' => $oauth_access_token, 
		'oauth_timestamp' => time(), 
		'oauth_version' => '1.0'
	); 
	$api_url = 'https://api.twitter.com/1.1/users/show.json'; 
	$base_info = signature_base_string( $api_url, $query, 'GET', $oauth ); 
	$composite_key = rawurlencode( $consumer_secret ) . '&' . rawurlencode( $oauth_access_token_secret ); 
	$oauth_signature = base64_encode( hash_hmac( 'sha1', $base_info, $composite_key, true ) ); $oauth[ 'oauth_signature' ] = $oauth_signature; 
	return $oauth;
}

function header_twiiter( $signature ){
   	$return = 'OAuth ';
   	$values = array();

   	foreach ( $signature as $key => $value ) {
        $values[] = $key . '="' . rawurlencode( $value ) . '"';
   	}

   	$return .= implode( ', ', $values );
	return $return;
}

/* TWITTER COUNTER */

function get_twitter_count($username){

	$smcounter = unserialize(get_option('social-media-counter-artoon'));
	$twitter_consumer_key = $smcounter['twitter']['consumer_key'];
	$twitter_consumer_secret_key = $smcounter['twitter']['consumer_secret_key'];
	$twitter_access_token = $smcounter['twitter']['access_token'];
	$twitter_access_token_secret_key = $smcounter['twitter']['access_token_secret_key'];

	$user = $username;
 	$api_url = 'https://api.twitter.com/1.1/users/show.json';
   	$params = array(
       	'method' => 'GET',
       	'sslverify' => false,
      	'timeout' => 60,
       	'headers' => array(
           	'Content-Type' => 'application/x-www-form-urlencoded',
           	'Authorization' => authorization($user, $twitter_consumer_key, $twitter_consumer_secret_key, $twitter_access_token, $twitter_access_token_secret_key)
       	)
   	);

   	$connection = wp_remote_get( $api_url . '?screen_name=' . $user, $params );
   	if ( is_wp_error( $connection ) ) {
   		$count = 0; 
   	} 
   	else 
   	{
   		$_data = json_decode( $connection[ 'body' ], true );
   		if ( isset( $_data[ 'followers_count' ] ) ) 
   		{
   			$count = intval( $_data[ 'followers_count' ] ); 
   		} 
   		else
   		{
   			$count = 0; 
   		} 
   	} 
   	return $count;
   
}


/* FACEBOOK COUNTER */

function get_facebook_count($slug){
	
	$url='https://www.facebook.com/v3.2/plugins/like.php?href='.urlencode('https://www.facebook.com/'.$slug).'&layout=button_count&locale=en_US';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
	curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
	curl_setopt($ch, CURLOPT_HTTPHEADER,array('cookie: sb=CLNbXM9FFv9lGx4jmLf16vca; wd=1920x937; datr=VApdXOe0Lh-Ic1aWIAva16H3; c_user=100006739530932;xs=35%3AHe1VtMHE2YfI6A%3A2%3A1549601461%3A17606%3A10002; pl=n; act=1549601501963%2F5; ;spin=r.4753222_b.trunk_t.1549861834_s.1_v.2_; fr=0RZE6W4oM7lFbGk6D.AWXeuJN69ZXKMCy6wgCzvfToOvU.BcWrJR.nP.Fxd.0.0.BcYQPM.AWXie8ne;presence=EDvF3EtimeF1549863675EuserFA21B06739530932A2EstateFDutF1549863675241CEchFDp_5f1B06739530932F44CC', 'user-agent: Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36')); 
	$response = curl_exec($ch); 
	if ($response === false) 
		$response = curl_error($ch);
	curl_close($ch);
	$html = preg_split('{_5n6h _2pih">}', $response);
	$html = preg_split('{</span>}', $html[1]);
	return strip_tags($html[0]);
}


function get_instagram_count($slug){

	$api_url='https://www.instagram.com/'.$slug.'/?__a=1';
	$params = array(
        'sslverify' => false,
        'timeout' => 60,
        // 'headers' => array(
        //     'cookie' => '__cfduid=d822c2e41a06b9878b61f2787c96c5d661550029541; _ga=GA1.2.1522301236.1550048530; _gid=GA1.2.715776919.1550048530; __atuvc=2%7C7; __atuvs=5c63dd11e277072e001; __gads=ID=cfb7c64af1c54b5b:T=1550048549:S=ALNI_MZk0768Bk1dk6Lku7IIDazicVWWPA',
        //     'referer' => 'https://livecounts.org/instagram-live/'
        // )
    );
    $connection = (wp_remote_get($api_url, $params));
    $result = @json_decode($connection['body'],1);
   	$count =  (int)@$result['graphql']['user']['edge_followed_by']['count'];
   	
   	return $count;
}

//echo get_instagram_count('instagram');

function get_youtube_count($slug)
{

	$smcounter = unserialize(get_option('social-media-counter-artoon'));
	$api_key = $smcounter['youtube']['api_key'];
	

	$api_url = 'https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$slug.'&key='.$api_key;
	$connection = wp_remote_get($api_url, array('timeout'=>60));
	if (!is_wp_error($connection)) 
	{
	    $response = json_decode($connection['body'], true);
	    if (isset($response['items'][0]['statistics']['subscriberCount'])) 
	    {
	        $count = $response['items'][0]['statistics']['subscriberCount'];
	       	set_transient('apsc_youtube',$count,$cache_period);
	        set_transient('apsc_youtube_slug',$slug,$cache_period);
	    }
	    
	}
	return $count;
}

//get_youtube_count('UCqXlP7nVafB1suQ3-QvMa2A');


function get_sound_cloud_count($username){

	$smcounter = unserialize(get_option('social-media-counter-artoon'));
	

	$client_id = $smcounter['soundcloud']['clinet_id'];

	$api_url = 'https://api.soundcloud.com/users/' . $username . '.json?client_id=' . $client_id;
    $params = array(
        'sslverify' => false,
        'timeout' => 60
    );

    $connection = wp_remote_get($api_url, $params);
    if (is_wp_error($connection)) {
        $count = 0;
    } else {
        $response = json_decode($connection['body'], true);

        if (isset($response['followers_count'])) {
            $count = (intval($response['followers_count']));
            set_transient( 'apsc_soundcloud',$count,$cache_period );
            set_transient( 'apsc_soundcloud_slug',$slug,$cache_period );
        } else {
            $count = 0;
        }
    }
   return $count;
}

//echo get_sound_cloud_count('martingarrix');


function get_counter_format($count){

	if($count==''){
		$count=0;
	}

	$pareameter = substr($count, -1); 

	if(!is_numeric($pareameter)){

		if($pareameter=='k' || $pareameter == 'K'){
			$count  = str_replace($pareameter, '', $count) * 1000;
		}else if($pareameter=='m' || $pareameter == 'M'){
			$count  = str_replace($pareameter, '', $count) * 1000000;
		}else if($pareameter=='b' || $pareameter == 'B'){
			$count  = str_replace($pareameter, '', $count) * 100000000;
		}
	}


	$display_settings = unserialize(get_option('social-media-counter-display-settings-artoon'));
	
	if(!empty($display_settings['counter_format']) && $display_settings['counter_format']==3)
	{
		if($count >= 100000000) {
			// 10 crore for 1B 
			$var='B'; 
			$count=round( $count / 100000000 ,1).$var;  
			//round means after point 1 digit 
		}else if($count >= 1000000){ 
			// 10 lakhs for 1M 
			$var='M'; 
			$count=round( $count / 1000000 ,1).$var;  
			//round means after point 1 digit 
		}else if($count >= 1000){ 
			// 1 thousand  for 1K 
			$var='K'; 
			$count=round( $count / 1000 ,1).$var;  
			//round means after point 1 digit 
		}
	}
	else if(!empty($display_settings['counter_format']) && $display_settings['counter_format']==2){
		$count = number_format($count,0,".",",");

	}
	else
	{
		$count = $count; 
	}
	

	return $count;

}


