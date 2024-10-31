<?php
/**
 * Plugin Name: REV - Responsive Embedded Video
 * Plugin URI: https://www.thenextjump.com/
 * Description: Easiest way to embed Youtube and Vimeo videos in responsive way.
 * Version: 1.2.0
 * Author: The Next Jump
 * Author URI: https://www.thenextjump.com
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!function_exists('add_action')) exit; // additional protection if accessed directly

add_action('plugins_loaded', 'tnj_rev');

function tnj_rev() {
	add_shortcode('rev-youtube', 'tnj_rev_youtube_shortcode');
	add_shortcode('rev-vimeo', 'tnj_rev_vimeo_shortcode');
}

function tnj_rev_load_styles() {
	wp_register_style('rev_styles', plugins_url('includes/css/styles.css', __FILE__ ));
	wp_enqueue_style('rev_styles');
}
add_action( 'init', 'tnj_rev_load_styles');

function tnj_rev_youtube_shortcode($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'video_id' => '',
			'video_url' => '',
			'class' => '',
			'width' => '100%',
			'height' => '0',
			'allow_full_screen' => '1',
			'controls' => '1',
			'autoplay' => '0',
			'start' => '0',
			'loop' => '0',
			'fixed_size' => '0',
			'rel' => '1'
		), $atts);

	$allowFullScreen = '';
	if ($atts['allow_full_screen'] == '1') {
		$allowFullScreen = 'allowfullscreen';
	}

	$video_id = $atts['video_id'];
	if ($atts['video_url'] != '') {
		// Extract the video ID from the URL. Both Long and Short Youtube URLs are supported.
		$shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
    $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

		if (preg_match($longUrlRegex, $atts['video_url'], $matches)) {
			$video_id = $matches[count($matches) - 1];
		}

		if (preg_match($shortUrlRegex, $atts['video_url'], $matches)) {
			$video_id = $matches[count($matches) - 1];
		}
	}

	if ($atts['fixed_size'] == '1') {
		if ($atts['height'] == "0") {
			$atts['height'] = "315px";
		}

		return '<div class="tnjVideoWrapper '.$atts['class'].'" style="width: '.$atts['width'].'; height: '.$atts['height'].';">'.
			   '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video_id.'?rel='.$atts['rel'].'&amp;controls='.$atts['controls'].'&amp;autoplay='.$atts['autoplay'].'&amp;start='.$atts['start'].'&amp;loop='.$atts['loop'].'" frameborder="0" allow="accelerometer;autoplay;encrypted-media;gyroscope;picture-in-picture" '.$allowFullScreen.'></iframe>'.
			   '</div>';
	} else {
		return '<div style="position: relative; width: '.$atts['width'].'; max-width: 100%;">'.
			   '<div class="tnjVideoWrapper '.$atts['class'].'" style="height: 0; padding-bottom: 52%;">'.
			   '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video_id.'?rel='.$atts['rel'].'&amp;controls='.$atts['controls'].'&amp;autoplay='.$atts['autoplay'].'&amp;start='.$atts['start'].'&amp;loop='.$atts['loop'].'" frameborder="0" allow="accelerometer;autoplay;encrypted-media;gyroscope;picture-in-picture" '.$allowFullScreen.'></iframe>'.
			   '</div></div>';
	}
}

function tnj_rev_vimeo_shortcode($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'video_id' => '',
			'class' => '',
			'width' => '100%',
			'height' => '0',
			'allow_full_screen' => '1',
			'controls' => '1',
			'autoplay' => '0',
			'start' => '0',
			'loop' => '0',
			'fixed_size' => '0'
		), $atts);

	$allowFullScreen = '';
	$fullScreen = '';
	if ($atts['allow_full_screen'] == '1') {
		$allowFullScreen = 'allowfullscreen';
		$fullScreen = 'fullscreen';
	}

	$start = '';
	$minute = '';
	$second = '';
	if ($atts['start'] < 60) {
		$start = $atts['start'].'s';
	} else {
		$minute = intdiv((int)$atts['start'], 60);
		$seconds = ((int)$atts['start']) % 60;
		$start = $minute.'m'.$seconds.'s';
	}

	if ($atts['fixed_size'] == '1') {
		if ($atts['height'] == "0") {
			$atts['height'] = "315px";
		}

		return '<div class="tnjVideoWrapper '.$atts['class'].'" style="width: '.$atts['width'].'; height: '.$atts['height'].';">'.
			   '<iframe width="560" height="315" src="https://player.vimeo.com/video/'.$atts['video_id'].'?autoplay='.$atts['autoplay'].'#t='.$start.'&amp;loop='.$atts['loop'].'" frameborder="0" allow="autoplay;'.$fullScreen.'" '.$allowFullScreen.'></iframe>'.
			   '</div>';
	} else {
		return '<div style="position: relative; width: '.$atts['width'].'; max-width: 100%;">'.
			   '<div class="tnjVideoWrapper '.$atts['class'].'" style="height: 0; padding-bottom: 57%;">'.
			   '<iframe width="560" height="315" src="https://player.vimeo.com/video/'.$atts['video_id'].'?autoplay='.$atts['autoplay'].'#t='.$start.'&amp;loop='.$atts['loop'].'" frameborder="0" allow="autoplay;'.$fullScreen.'" '.$allowFullScreen.'></iframe>'.
			   '</div></div>';
	}
}