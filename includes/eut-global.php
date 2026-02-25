<?php

/*
*	Global Parameter and functions
*
* 	@version	1.0
* 	@author		Euthemians Team
* 	@URI		http://euthemians.com
*/

$eut_social_list = array(
	'twitter' => 'Twitter',
	'facebook' => 'Facebook',
	'google-plus' => 'Google Plus',
	'instagram' => 'Instagram',
	'linkedin' => 'LinkedIn',
	'tumblr' => 'Tumblr',
	'pinterest' => 'Pinterest',
	'github' => 'Github',
	'dribbble' => 'Dribbble',
	'reddit' => 'reddit',
	'flickr' => 'Flickr',
	'skype' => 'Skype',
	'youtube' => 'YouTube',
	'vimeo-square' => 'Vimeo',
	'soundcloud' => 'SoundCloud',
	'wechat' => 'WeChat',
	'weibo' => 'Weibo',
	'renren' => 'Renren',
	'qq' => 'QQ',
	'xing' => 'XING',
	'rss' => 'RSS',
	'vk' => 'VK',
	'behance' => 'Behance',
	'foursquare' => 'Foursquare',
	'steam' => 'Steam',
	'twitch' => 'Twitch',
	'houzz' => 'Houzz',
	'yelp' => 'Yelp',

);

$eut_social_list_extended = array (
	array(
		'title' => 'Twitter',
		'url' => 'twitter_url',
		'id' => 'twitter',
		'class' => 'fa fa-twitter',
	),
	array(
		'title' => 'Facebook',
		'url' => 'facebook_url',
		'id' => 'facebook',
		'class' => 'fa fa-facebook',
	),
	array(
		'title' => 'Google+',
		'url' => 'googleplus_url',
		'id' => 'google-plus',
		'class' => 'fa fa-google-plus',
	),
	array(
		'title' => 'Instagram',
		'url' => 'instagram_url',
		'id' => 'instagram',
		'class' => 'fa fa-instagram',
	),
	array(
		'title' => 'LinkedIn',
		'url' => 'linkedin_url',
		'id' => 'linkedin',
		'class' => 'fa fa-linkedin',
	),
	array(
		'title' => 'Tumblr',
		'url' => 'tumblr_url',
		'id' => 'tumblr',
		'class' => 'fa fa-tumblr',
	),
	array(
		'title' => 'Pinterest',
		'url' => 'pinterest_url',
		'id' => 'pinterest',
		'class' => 'fa fa-pinterest',
	),
	array(
		'title' => 'GitHub',
		'url' => 'github_url',
		'id' => 'github',
		'class' => 'fa fa-github',
	),
	array(
		'title' => 'Dribbble',
		'url' => 'dribbble_url',
		'id' => 'dribbble',
		'class' => 'fa fa-dribbble',
	),
	array(
		'title' => 'reddit',
		'url' => 'reddit_url',
		'id' => 'reddit',
		'class' => 'fa fa-reddit',
	),
	array(
		'title' => 'Flickr',
		'url' => 'flickr_url',
		'id' => 'flickr',
		'class' => 'fa fa-flickr',
	),
	array(
		'title' => 'Skype',
		'url' => 'skype_url',
		'id' => 'skype',
		'class' => 'fa fa-skype',
	),
	array(
		'title' => 'YouTube',
		'url' => 'youtube_url',
		'id' => 'youtube',
		'class' => 'fa fa-youtube',
	),
	array(
		'title' => 'Vimeo',
		'url' => 'vimeo_url',
		'id' => 'vimeo-square',
		'class' => 'fa fa-vimeo-square',
	),
	array(
		'title' => 'SoundCloud',
		'url' => 'soundcloud_url',
		'id' => 'soundcloud',
		'class' => 'fa fa-soundcloud',
	),
	array(
		'title' => 'WeChat',
		'url' => 'wechat_url',
		'id' => 'wechat',
		'class' => 'fa fa-wechat',
	),
	array(
		'title' => 'Weibo',
		'url' => 'weibo_url',
		'id' => 'weibo',
		'class' => 'fa fa-weibo',
	),
	array(
		'title' => 'Renren',
		'url' => 'renren_url',
		'id' => 'renren',
		'class' => 'fa fa-renren',
	),
	array(
		'title' => 'QQ',
		'url' => 'qq_url',
		'id' => 'qq',
		'class' => 'fa fa-qq',
	),
	array(
		'title' => 'XING',
		'url' => 'xing_url',
		'id' => 'xing',
		'class' => 'fa fa-xing',
	),
	array(
		'title' => 'RSS',
		'url' => 'rss_url',
		'id' => 'rss',
		'class' => 'fa fa-rss',
	),
	array(
		'title' => 'VK',
		'url' => 'vk_url',
		'id' => 'vk',
		'class' => 'fa fa-vk',
	),
	array(
		'title' => 'Behance',
		'url' => 'behance_url',
		'id' => 'behance',
		'class' => 'fa fa-behance',
	),
	array(
		'title' => 'Foursquare',
		'url' => 'foursquare_url',
		'id' => 'foursquare',
		'class' => 'fa fa-foursquare',
	),
	array(
		'title' => 'Steam',
		'url' => 'steam_url',
		'id' => 'steam',
		'class' => 'fa fa-steam',
	),
	array(
		'title' => 'Twitch',
		'url' => 'twitch_url',
		'id' => 'twitch',
		'class' => 'fa fa-twitch',
	),
	array(
		'title' => 'Houzz',
		'url' => 'houzz_url',
		'id' => 'houzz',
		'class' => 'fa fa-houzz',
	),
	array(
		'title' => 'Yelp',
		'url' => 'yelp_url',
		'id' => 'yelp',
		'class' => 'fa fa-yelp',
	),
);

/**
 * Extract video ID from youtube url
 */
if ( ! function_exists( 'eut_extract_youtube_id' ) ) {
	function eut_extract_youtube_id( $url ) {
		$youtube_id = "";
		parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
		if ( ! isset( $vars['v'] ) ) {
			$youtube_id = '';
		}
		$youtube_id = $vars['v'];

		return apply_filters( 'eut_privacy_bg_youtube_id', $youtube_id );
	}
}

//Omit closing PHP tag to avoid accidental whitespace output errors.
