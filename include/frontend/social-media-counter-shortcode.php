<?php


$api_settings = unserialize(get_option('social-media-counter-artoon'));

// Facebook
$facebook_toggle = $api_settings['facebook']['toggle'];
$facebook_app_id = $api_settings['facebook']['app_id'];
$facebook_app_secret = $api_settings['facebook']['app_secret'];
$facebook_default_counter = $api_settings['facebook']['default_counter'];

//Twitter
$twitter_toggle = $api_settings['twitter']['toggle'];
$twitter_consumer_key = $api_settings['twitter']['consumer_key'];
$twitter_consumer_secret_key = $api_settings['twitter']['consumer_secret_key'];
$twitter_access_token = $api_settings['twitter']['access_token'];
$twitter_default_counter = $api_settings['twitter']['default_counter'];
//Instagram 
$instagram_toggle = $api_settings['instagram']['toggle'];
$instagram_default_counter = $api_settings['instagram']['default_counter'];

//Youtube
$youtube_toggle = $api_settings['youtube']['toggle'];
$youtube_api_key = $api_settings['youtube']['api_key'];
$youtube_default_counter = $api_settings['youtube']['default_counter'];

//Sound Cloud 
$soundcloud_toggle = $api_settings['soundcloud']['toggle'];
$soundcloud_clinet_id = $api_settings['soundcloud']['clinet_id'];
$soundcloud_default_counter = $api_settings['soundcloud']['default_counter'];

//Dribbble
$dribbble_toggle = $api_settings['dribbble']['toggle'];
$dribbble_default_counter = $api_settings['dribbble']['default_counter'];


$display_settings = unserialize(get_option('social-media-counter-display-settings-artoon'));

if(!empty($display_settings))
{
	$theme = $display_settings['display_theme'];	
}
else
{
	$theme = 1;
}

?>	<div class="theam">
		<?php 
		if((!empty($facebook_toggle) && $facebook_toggle !=0) && !empty($attr['facebook']))
		{
			$count = get_facebook_count($attr['facebook']);
			if((!empty($facebook_default_counter)) && ($count == ''))
			{
				$count = $facebook_default_counter;
			}
			$count = get_counter_format($count);

			
			?>
			<div class="social_media_theam<?php echo $theme;?>">
				<div class="fb">
				<svg class="facebook" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="15.8 15.8 25 25"><path d="M32.8 24.7h-3.2v-2.1c0-0.8 0.5-1 0.9-1s2.3 0 2.3 0v-3.5l-3.1 0c-3.5 0-4.3 2.6-4.3 4.3v2.3h-2v3.6h2c0 4.6 0 10.2 0 10.2h4.2c0 0 0-5.6 0-10.2h2.8L32.8 24.7z"/></svg>
				
				</div>
				<div class="fbtext">Facebook</div>
				<div class="theam_content">
				<p>(<?php echo $count;?>)</p>
				</div>
			</div>
			<?php
		}
		?>

		<?php 
		if((!empty($twitter_toggle) && $twitter_toggle!=0) && !empty($attr['twitter']))
			{
				$count =  get_twitter_count($attr['twitter']);
				if((!empty($twitter_default_counter)) && ($count == '')){
					$count = $twitter_default_counter;	
				}
				$count = get_counter_format($count);

				?>
				<div class="social_media_theam<?php echo $theme;?>_twitter">
					<div class="twit">
					 <svg class="twitter" fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" /></svg>
						
					</div>
					<div class="fbtext">Twitter</div>
					<div class="theam_content">
					<p>(<?php echo $count;?>)</p>
					</div>
				</div>
				<?php
			}
		?>
		
		<?php 
		if((!empty($instagram_toggle) && $instagram_toggle!=0) && !empty($attr['instagram']))
			{
				$count = get_instagram_count($attr['instagram']);
				if((!empty($instagram_default_counter)) && ($count == '')){
					$count = $instagram_default_counter;
				}
				$count = get_counter_format($count);

				?>
				<div class="social_media_theam<?php echo $theme;?>_insta">
					<div class="intsa">
					<svg class="instagram" fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" /></svg>
					</div>
					<div class="fbtext">Instagram</div>
					<div class="theam_content">
					<p>(<?php echo $count;?>)</p>
					</div>
				</div>
				<?php
			}
		?>
		
		<?php 
		if((!empty($youtube_toggle) && $youtube_toggle!=0) && !empty($attr['youtube']))
		{
			$count = get_youtube_count($attr['youtube']);
			if((!empty($youtube_default_counter)) && ($count == '')){
				$count = $youtube_default_counter;
			}
			$count = get_counter_format($count);

			?>
			<div class="social_media_theam<?php echo $theme;?>_youtube">
				<div class="_youtube">
				<svg width="64" version="1.1" xmlns="http://www.w3.org/2000/svg" height="64" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 64 64">
	        <path d="m37.635,41.44c-0.542,0-1.088,0.257-1.635,0.79v10.999c0.547,0.544 1.093,0.806 1.635,0.806 0.941,0 1.423-0.806 1.423-2.434v-7.698c0.001-1.632-0.482-2.463-1.423-2.463z"/>
	        <path d="m49.601,41.44c-1.093,0-1.642,0.831-1.642,2.502v1.671h3.274v-1.671c0.001-1.671-0.546-2.502-1.632-2.502z"/>
	          <path d="m56.396,29.049c-2.055-2.139-4.357-2.148-5.414-2.271-7.556-0.54-18.889-0.54-18.889-0.54h-0.025c0,0-11.333,0-18.896,0.54-1.054,0.123-3.352,0.133-5.409,2.271-1.618,1.632-2.147,5.327-2.147,5.327s-0.536,4.343-0.536,8.685v4.073c0,4.341 0.536,8.686 0.536,8.686s0.529,3.695 2.147,5.321c2.057,2.139 4.753,2.072 5.952,2.295 4.324,0.413 18.365,0.538 18.365,0.538s11.347-0.016 18.903-0.562c1.057-0.121 3.359-0.133 5.414-2.271 1.619-1.626 2.147-5.321 2.147-5.321s0.536-4.345 0.536-8.686v-4.073c0-4.342-0.536-8.685-0.536-8.685s-0.529-3.695-2.148-5.327zm-39.417,27.706h-3.642v-20.802h-3.851v-3.406h11.414v3.406h-3.92v20.802zm12.912,0h-3.278v-1.969c-1.299,1.489-2.54,2.221-3.742,2.221-1.054,0-1.781-0.432-2.112-1.346-0.178-0.546-0.286-1.409-0.286-2.683v-14.261h3.275v13.28c0,0.765 0,1.164 0.024,1.27 0.083,0.507 0.336,0.769 0.771,0.769 0.658,0 1.341-0.507 2.069-1.533v-13.786h3.278v18.038zm12.44-5.409c0,1.663-0.11,2.866-0.331,3.631-0.438,1.344-1.313,2.03-2.613,2.03-1.168,0-2.294-0.647-3.387-1.999v1.747h-3.277v-24.208h3.277v7.905c1.056-1.299 2.179-1.956 3.387-1.956 1.299,0 2.174,0.688 2.613,2.036 0.221,0.729 0.331,1.918 0.331,3.628v7.186zm12.179-3.016h-6.55v3.199c0,1.671 0.549,2.506 1.673,2.506 0.806,0 1.275-0.44 1.463-1.311 0.029-0.178 0.073-0.908 0.073-2.219h3.341v0.479c0,1.051-0.043,1.776-0.071,2.106-0.108,0.723-0.368,1.378-0.766,1.955-0.906,1.312-2.25,1.96-3.963,1.96-1.711,0-3.014-0.618-3.96-1.853-0.696-0.902-1.051-2.326-1.051-4.241v-6.319c0-1.927 0.318-3.333 1.012-4.249 0.946-1.234 2.249-1.849 3.922-1.849 1.643,0 2.947,0.614 3.863,1.849 0.685,0.916 1.015,2.322 1.015,4.249v3.738z"/>
	          <path d="m23.436,24.434v-9.908l4.412-14.552h-3.71l-2.503,9.605-2.605-9.605h-3.863c0.777,2.268 1.581,4.544 2.356,6.816 1.174,3.411 1.91,5.982 2.244,7.735v9.908h3.669z"/>
	          <path d="m32.047,24.685c1.656,0 2.942-0.624 3.858-1.864 0.692-0.91 1.029-2.346 1.029-4.287v-6.387c0-1.945-0.337-3.367-1.029-4.289-0.917-1.25-2.202-1.87-3.858-1.87-1.654,0-2.943,0.62-3.854,1.87-0.707,0.922-1.034,2.344-1.034,4.289v6.387c0,1.941 0.327,3.377 1.034,4.287 0.911,1.24 2.2,1.864 3.854,1.864zm-1.581-13.199c0-1.686 0.514-2.529 1.581-2.529 1.062,0 1.573,0.844 1.573,2.529v7.669c0,1.687-0.511,2.53-1.573,2.53-1.067,0-1.581-0.844-1.581-2.53v-7.669z"/>
	          <path d="m48.988,24.434v-18.231h-3.308v13.935c-0.733,1.034-1.427,1.548-2.088,1.548-0.445,0-0.708-0.265-0.777-0.773-0.042-0.109-0.042-0.51-0.042-1.285v-13.425h-3.299v14.418c0,1.289 0.108,2.161 0.293,2.711 0.332,0.92 1.068,1.353 2.133,1.353 1.204,0 2.46-0.732 3.781-2.24v1.989h3.307z"/>
			</svg>
				</div>
				<div class="fbtext">Youtube</div>
				<div class="theam_content">
				<p>(<?php echo $count;?>)</p>
				</div>
			</div>
			<?php
		}

		?>
		
		<?php 
		if((!empty($soundcloud_toggle) && $soundcloud_toggle!=0 ) && !empty($attr['soundcloud']))
		{
			$count = get_sound_cloud_count($attr['soundcloud']);
			if((!empty($soundcloud_default_counter)) && ($count == '')){
				$count = $soundcloud_default_counter;
			}
			$count = get_counter_format($count);
			?>
			<div class="social_media_theam<?php echo $theme;?>_sound">
				<div class="_sound">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	     width="90px" height="90px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">
	    <path id="SoundCloud" d="M0,54.023c0,3.043,1.385,5.764,3.568,7.598V46.43C1.385,48.259,0,50.982,0,54.023 M7.342,44.432v19.183
	        C8.233,63.861,9.174,64,10.143,64h0.974V44.094c-0.325-0.027-0.65-0.045-0.98-0.045C9.165,44.049,8.23,44.184,7.342,44.432
	         M15.678,45.677c-0.258-0.165-0.515-0.317-0.789-0.457V64h3.773V38.881C17.16,40.841,16.113,43.155,15.678,45.677 M22.437,35.349
	        V64h3.774V33.491C24.862,33.945,23.596,34.577,22.437,35.349 M29.984,32.71V64h3.774V32.825c-0.773-0.115-1.569-0.175-2.38-0.175
	        C30.906,32.65,30.441,32.673,29.984,32.71 M39.612,34.916c-1.232-0.73-2.558-1.306-3.966-1.69V64h5.66V32.646
	        C40.688,33.359,40.12,34.12,39.612,34.916 M43.195,30.754V64h35.852v-0.044C86.596,63.473,90,58.79,90,53.075
	        c0-6.035-4.562-10.925-10.703-10.925c-1.576,0-2.874,0.325-4.245,0.913C74.07,33.481,65.941,26,55.932,26
	        C51.036,26,46.586,27.793,43.195,30.754"/>
	</svg>
				</div>
				<div class="fbtext">Sound Cloud</div>
				<div class="theam_content">
				<p>(<?php echo $count;?>)</p>
				</div>
			</div>
			
			<?php
		}
		?>

		<?php
			if(!empty($dribbble_toggle) && $dribbble_toggle!=0)
			{

				?>
				<a href="#" class="smcounter dribbble">
					<span><i class="fa fa-dribbble" aria-hidden="true"></i></span>
					<p>Dribbble</p>
				</a>
				<?php
			}
		?>
		
	</div>
	
	
		
	<?php
?>