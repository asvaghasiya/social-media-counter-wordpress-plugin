<?php 

$api_settings = unserialize(get_option('social-media-counter-artoon'));
$display_settings = unserialize(get_option('social-media-counter-display-settings-artoon'));
if(empty($display_settings)){
    $counter_format = '1';
    $display_theme = '1';
}else{
    $counter_format = $display_settings['counter_format'];
    $display_theme = $display_settings['display_theme'];
}
$facebook_toggle = $api_settings['facebook']['toggle'];
$facebook_app_id = $api_settings['facebook']['app_id'];
$facebook_app_secret = $api_settings['facebook']['app_secret'];
$facebook_default_counter = $api_settings['facebook']['default_counter'];

$twitter_toggle = $api_settings['twitter']['toggle'];
$twitter_consumer_key = $api_settings['twitter']['consumer_key'];
$twitter_consumer_secret_key = $api_settings['twitter']['consumer_secret_key'];
$twitter_access_token = $api_settings['twitter']['access_token'];
$twitter_access_token_secret_key = $api_settings['twitter']['access_token_secret_key'];
$twitter_default_counter = $api_settings['twitter']['default_counter'];

$instagram_toggle = $api_settings['instagram']['toggle'];
$instagram_default_counter = $api_settings['instagram']['default_counter'];

$youtube_toggle = $api_settings['youtube']['toggle'];
$youtube_api_key = $api_settings['youtube']['api_key'];
$youtube_default_counter = $api_settings['youtube']['default_counter'];

$soundcloud_toggle = $api_settings['soundcloud']['toggle'];
$soundcloud_clinet_id = $api_settings['soundcloud']['clinet_id'];
$soundcloud_default_counter = $api_settings['soundcloud']['default_counter'];

$dribbble_toggle = $api_settings['dribbble']['toggle'];
$dribbble_default_counter = $api_settings['dribbble']['default_counter'];
?>
<div class="social_media_counter">
	<div class="container-fluid">
		<div class="row">
            <div class="col-xs-12">
                <div class="plugin-title">
                    <h3>Social Media Counter</h3>
                </div>
            </div>
        </div>
        <div class="row">
			<div class="col-xs-12 ">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Social Profile</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Display Settings</a>
						<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">How To Use</a>
						<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>
					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					    <form action="#"	name="social_api_settings" id="social_api_settings" method="post">
                            <input type="hidden" name="action" value="social_media_counter_data">
                            <div class="social-theme-settings">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="toggle-btn">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h4>Facebook</h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <button type="button" name="facebook-btn" id="facebook-btn" class="btn btn-lg btn-toggle <?php if($facebook_toggle!=0){ echo "active"; }?>" data-toggle="button" aria-pressed="<?php if($facebook_toggle!=0){ echo "true"; }?>" autocomplete="off">
                                                        <div class="handle"></div>
                                                    </button>
                                                    <input type="hidden" name="facebook[toggle]" id="facebook" class="hidden-field-text" value="<?php echo $facebook_toggle;?>">
                                                </div>
                                            </div>
                                            <div class="facebook-settings">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="facebook_app_id">Facebook App ID</label>
                                                            <input type="text" name="facebook[app_id]" class="form-control" id="facebook_app_id" value="<?php echo $facebook_app_id;?>">
                                                            <small class="form-text text-muted">Please go to <a href="https://developers.facebook.com/" target="_blank">https://developers.facebook.com/</a> and create an app and get the App ID</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="facebook_app_secret">Facebook App Secret</label>
                                                            <input type="text" name="facebook[app_secret]" class="form-control" id="facebook_app_secret" value="<?php echo $facebook_app_secret;?>">
                                                            <small class="form-text text-muted">Please go to <a href="https://developers.facebook.com/" target="_blank">https://developers.facebook.com/</a> and create an app and get the App Secret</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="counterfacebook">Facebook Default Counter</label>
                                                            <input type="text" name="facebook[default_counter]" class="form-control" id="counterfacebook" value="<?php echo $facebook_default_counter;?>">
                                                            <small class="form-text text-muted">Please enter the default count for facebook to show whenever the APi is unavailable.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="toggle-btn">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h4>Twitter</h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <button type="button" name="twitter-btn" id="twitter-btn" class="btn btn-lg btn-toggle <?php if($twitter_toggle!=0){ echo "active"; }?>" data-toggle="button" aria-pressed="<?php if($twitter_toggle!=0){ echo "true"; }?>" autocomplete="off">
                                                        <div class="handle"></div>
                                                    </button>
                                                    <input type="hidden" name="twitter[toggle]" id="twitter" class="hidden-field-text" value="<?php echo $twitter_toggle;?>">
                                                </div>
                                            </div>
                                            <div class="twitter-settings">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="twitter_consumer_key">Twitter Consumer Key</label>
                                                            <input type="text" name="twitter[consumer_key]" class="form-control" id="twitter_consumer_key" value="<?php echo $twitter_consumer_key;?>">
                                                             <small class="form-text text-muted">Please create an app on Twitter through this link:<a href="https://dev.twitter.com/app" target="_blank">https://dev.twitter.com/app</a> and get this information.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="twitter_consumer_secret_key">Twitter Consumer Secret</label>
                                                            <input type="text" name="twitter[consumer_secret_key]" class="form-control" id="twitter_consumer_secret_key" value="<?php echo $twitter_consumer_secret_key;?>">
                                                            <small class="form-text text-muted">Please create an app on Twitter through this link:<a href="https://dev.twitter.com/app" target="_blank">https://dev.twitter.com/app</a> and get this information.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="twitter_access_token">Twitter Access Token</label>
                                                            <input type="text" name="twitter[access_token]" class="form-control" id="twitter_access_token" value="<?php echo $twitter_access_token;?>">
                                                            <small class="form-text text-muted">Please create an app on Twitter through this link:<a href="https://dev.twitter.com/app" target="_blank">https://dev.twitter.com/app</a> and get this information.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="twitter_access_token_secret">Twitter Access Token Secret</label>
                                                            <input type="text" name="twitter[access_token_secret_key]" class="form-control" id="twitter_access_token_secret" value="<?php echo $twitter_access_token_secret_key;?>">
                                                            <small class="form-text text-muted">Please create an app on Twitter through this link:<a href="https://dev.twitter.com/app" target="_blank">https://dev.twitter.com/app</a> and get this information.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="counterfacebook">Twitter Default Counter</label>
                                                            <input type="text" name="twitter[default_counter]" class="form-control" id="counterfacebook" value="<?php echo $twitter_default_counter;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="toggle-btn">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h4>Instagram</h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <button type="button" name="instagram-btn" id="instagram-btn" class="btn btn-lg btn-toggle <?php if($instagram_toggle!=0){ echo "active"; }?>" data-toggle="button" aria-pressed="<?php if($instagram_toggle!=0){ echo "true"; }?>" autocomplete="off">
                                                        <div class="handle"></div>
                                                    </button>
                                                    <input type="hidden" name="instagram[toggle]" id="instagram" class="hidden-field-text" value="<?php echo $instagram_toggle;?>">
                                                </div>
                                            </div>
                                            <div class="instagram-settings">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="counterinstagram">Instagram Default Counter</label>
                                                            <input type="text" name="instagram[default_counter]" class="form-control" id="counterinstagram" value="<?php echo $instagram_default_counter;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="toggle-btn">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h4>Youtube</h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <button type="button" name="youtube-btn" id="youtube-btn" class="btn btn-lg btn-toggle <?php if($youtube_toggle !=0 ){ echo "active"; }?>" data-toggle="button" aria-pressed="<?php if($youtube_toggle !=0 ){ echo "true"; }?>" autocomplete="off">
                                                        <div class="handle"></div>
                                                    </button>
                                                    <input type="hidden" name="youtube[toggle]" id="youtube" class="hidden-field-text" value="<?php echo $youtube_toggle;?>">
                                                </div>
                                            </div>
                                            <div class="youtube-settings">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="youtube_api_key">Youtube Api Key</label>
                                                            <input type="text" name="youtube[api_key]" class="form-control" id="youtube_api_key" value="<?php echo $youtube_api_key; ?>">
                                                             <small class="form-text text-muted">To get your API Key, first create project/app in <a href="https://console.developers.google.com/" target="_blank">https://console.developers.google.com/</a> project and then turn on both Youtube Data and Analytics API from "APIs & auth > Api inside your project. Then again go to "API & auth > APIs > Credentials > Public API access" and then Click "CREATE A NEW KEY" button, select the "Browser Key" option and click in the "CREATE" button, and then copy your API key and paste in above field.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="counteryoutube">Youtube Default Subscribers Count</label>
                                                            <input type="text" name="youtube[default_counter]" class="form-control" id="counteryoutube" value="<?php echo $youtube_default_counter;?>">
                                                            <small class="form-text text-muted">Please enter total number of subscribers that your youtube channel has in case the API fetching is failed for automatic update.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="toggle-btn">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h4>Sound Cloud</h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <button type="button" name="sound-cloud-btn" id="sound-cloud-btn" class="btn btn-lg btn-toggle <?php if($soundcloud_toggle!=0){ echo "active"; }?>" data-toggle="button" aria-pressed="<?php if($soundcloud_toggle!=0){ echo "true"; }?>" autocomplete="off">
                                                        <div class="handle"></div>
                                                    </button>
                                                    <input type="hidden" name="soundcloud[toggle]" id="sound-cloud" class="hidden-field-text" value="<?php echo $soundcloud_toggle;?>">
                                                </div>
                                            </div>
                                            <div class="soundcloud-settings">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="sound_cloud_clinet_id">Sound Cloud Client ID</label>
                                                            <input type="text" name="soundcloud[clinet_id]" class="form-control" id="sound_cloud_clinet_id" value="<?php echo $soundcloud_clinet_id;?>">
                                                            <small class="form-text text-muted">Please enter SoundCloud APP Clinet ID. You can get this information from <a href="http://soundcloud.com/you/apps/new">http://soundcloud.com/you/apps/new</a> after creating a new app</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="countersoundcloud">Sound Cloud Default Counter</label>
                                                            <input type="text" name="soundcloud[default_counter]" class="form-control" id="countersoundcloud" value="<?php echo $soundcloud_default_counter;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       <?php /* <div class="toggle-btn">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h4>Dribbble</h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <button type="button" name="bribbble-btn" id="bribbble-btn" class="btn btn-lg btn-toggle <?php if($dribbble_toggle != 0 ){ echo "active"; }?>" data-toggle="button" aria-pressed="<?php if($dribbble_toggle != 0 ){ echo "true"; }?>" autocomplete="off">
                                                        <div class="handle"></div>
                                                    </button>
                                                    <input type="hidden" name="dribbble[toggle]" id="dribbble" class="hidden-field-text" value="<?php echo $dribbble_toggle;?>">
                                                </div>
                                            </div>
                                            <div class="dribbble-settings">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="counterdribbble">Dribbble Default Counter</label>
                                                            <input type="text" name="dribbble[default_counter]" class="form-control" id="counterdribbble" value="<?php echo $dribbble_default_counter;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> */ ?>
                                    </div>
                                </div>
                                <div class="social-media-submit">
                                    <input type="submit" class="btn btn-primary sm-submit" value="Save" >
                                </div>
                            </div>
                        </form>
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <!-- pankaj -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="#" name="social_display_settings" id="social_display_settings" method="post">
                                <input type="hidden" name="action" value="display_settings_data">
                                <div class="social-theme-settings">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div>
                                                <h6>Counter Format</h6>
                                                <label class="mrg_left"><input type="radio" class="number_counter" id="number_counter_1" <?php echo ($counter_format == '1')? 'checked="checked"':''; ?> name="number_counter" value="1">10110</label>
                                                <label class="mrg_left"><input type="radio" class="number_counter" id="number_counter_2" <?php echo ($counter_format == '2')? 'checked="checked"':''; ?> name="number_counter" value="2">10,110</label>
                                                <label class="mrg_left"><input type="radio" class="number_counter" id="number_counter_3" <?php echo ($counter_format == '3')? 'checked="checked"':''; ?> name="number_counter" value="3">10.1K</label>
                                            </div>
                                            <div class="theme-settings">
                                                <div class="theme number_counter_1 <?php echo ($counter_format == '1')? 'active':''; ?>">
                                                    <h6>Choose Theme</h6>
                                                    <div class="theme-list">
                                                      <label>
                                                        <input type="radio" name="display_theme" value="1" <?php echo ($counter_format == '1' && $display_theme == '1')? 'checked="checked"':''; ?>>
                                                        <div class="radio-btn"></div>
                                                        <b class="theme-label">Theme 1</b>
                                                        <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_1/3.png') ?>" alt="">
                                                      </label>
                                                    </div>
                                                    <div class="theme-list">

                                                    <label>
                                                      <input type="radio" name="display_theme" value="2" <?php echo ($counter_format == '1' && $display_theme == '2')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                        <b class="theme-label">Theme 2</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_2/2.png') ?>">
                                                    </label>
                                                     </div>
                                                    <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="3" <?php echo ($counter_format == '1' && $display_theme == '3')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 3</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_3/3.png') ?>">
                                                    </label>
                                                     </div>
                                                    <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="4" <?php echo ($counter_format == '1' && $display_theme == '4')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 4</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_4/1.png') ?>">
                                                    </label>
                                                     </div>
                                                    <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="5" <?php echo ($counter_format == '1' && $display_theme == '5')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 5</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_5/1.png') ?>">
                                                    </label>
                                                     </div>
                                                </div>
                                                <div class="theme number_counter_2 <?php echo ($counter_format == '2')? 'active"':''; ?>">
                                                    <h6>Choose Theme</h6>
                                                    <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="1" <?php echo ($counter_format == '2' && $display_theme == '1')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 1</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_1/2.png') ?>" alt="">
                                                    </label>
                                                </div>
                                                <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="2" <?php echo ($counter_format == '2' && $display_theme == '2')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 2</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_2/1.png') ?>">
                                                    </label>
                                                </div>
                                                <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="3" <?php echo ($counter_format == '2' && $display_theme == '3')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 3</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_3/1.png') ?>">
                                                    </label>
                                                </div>
                                                <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="4" <?php echo ($counter_format == '2' && $display_theme == '4')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 4</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_4/2.png') ?>">
                                                    </label>
                                                </div>
                                                <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="5" <?php echo ($counter_format == '2' && $display_theme == '5')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 5</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_5/2.png') ?>">
                                                    </label>
                                                </div>
                                                </div>
                                                <div class="theme number_counter_3 <?php echo ($counter_format == '3')? 'active':''; ?>">
                                                    <h6>Choose Theme</h6>
                                                    <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="1" <?php echo ($counter_format == '3' && $display_theme == '1')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 1</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_1/1.png') ?>" alt="">
                                                    </label>
                                                </div>
                                                <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="2" <?php echo ($counter_format == '3' && $display_theme == '2')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 2</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_2/3.png') ?>">
                                                    </label>
                                                </div>
                                                <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="3" <?php echo ($counter_format == '3' && $display_theme == '3')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 3</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_3/2.png') ?>">
                                                    </label>
                                                </div>
                                                <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="4" <?php echo ($counter_format == '3' && $display_theme == '4')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 4</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_4/3.png') ?>">
                                                    </label>
                                                </div>
                                                <div class="theme-list">
                                                    <label>
                                                      <input type="radio" name="display_theme" value="5" <?php echo ($counter_format == '3' && $display_theme == '5')? 'checked="checked"':''; ?>>
                                                      <div class="radio-btn"></div>
                                                    <b class="theme-label">Theme 5</b>
                                                      <img src="<?= plugins_url('social-media-counter/asstes/images/Social_Media_5/3.png') ?>">
                                                    </label>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="social-media-submit">
                                        <input type="submit" class="btn btn-primary btn-design sm-display-settings-submit" value="Save" >
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- pankaj -->
                    </div>
					<div class="tab-pane fade description-tab" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <h3>How to Use?</h3>
						<p>After the plugin is installed, one can easily activate it by clicking on the “Social media counter” tab found on the left of the menu bar in the admin panel. </p>
                        <p>To start with, go under the “Social Profile”. Here, you will be needed to put the App ID and App secret code of your each respective social media account. The App ID and the App secret code can be easily accessed from the Facebook, Twitter, Sound Cloud and YouTube developer’s account. Click on the “on or off” tab to get the results.</p>
                        <p>After entering these information, you will have to click on the “Display setting”, in which you can select the counter format and theme. Click “Save” button.</p>
                        <p><strong>You can effortlessly get the individual count from each social media account of yours. Take a look at the sample shortcode below:</strong></p>
                        <p><code>[asmcounter facebook="artoonsolutions" twitter="facebook" instagram="instagram" soundcloud="martingarrix" youtube="UCa1chgnw4IKF4rr01IYgruQ"]</code></p>
                        <p>Here, you will be required to use the username of your respective social account ( Facebook, Instagram, Sound Cloud and twitter).  In case of YouTube, you will be required to put the channel name. </p>
					</div>
					<div class="tab-pane fade description-tab" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
						<h3>About</h3>
                        <p>Social Media Counter - is a FREE WordPress Plugin created by Artoon Solutions Pvt. Ltd .</p>
                        <p>Social Media Counter is a Free WordPress plugin that lets your website to display your social media account fans, subscribers, and followers. This is an easy plugin that allows you and your website visitors to know your current social media stats. This plugin requires you to use the shortcode which allows you to display current statistics of all the major social media account that your company has. Currently available social media in FREE version includes: Facebook, Twitter, Instagram, Sound Cloud and YouTube.</p>
					</div>
				</div>
                <div class="display-message">

                </div>
			</div>
		</div>
	</div>
</div>
