=== REV - Responsive Embedded Video ===
Contributors: everardonggon
Donate link: https://www.thenextjump.com/donate/
Tags: video, embed, youtube, vimeo, responsive
Requires at least: 4.7.0
Requires PHP: 5.2.4
Tested up to: 6.5
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Easily embed Youtube and Vimeo videos responsively.

== Description ==

Use REV - Responsive Embedded Video to easily embed Youtube and Vimeo videos that are responsive to any screen size.

= Features =
* Supports Youtube and Vimeo videos
* Embed videos either in fixed size or responsive
* Maintains the 16:9 ratio even resizing the screen (if not set to fixed size)
* Video options like autoplay, start on a specific time, allow full screen, and hide/show controls (Youtube only)

= Usage: =

Copy to video ID of the Youtube or Vimeo video you want to embed (you can find it in the URL), then use the following shortcode on your page or post's content:

**For Youtube:** [rev-youtube video_id="youtube video id"]
**For Vimeo:** [rev-vimeo video_id="vimeo video id"]

**Example:**
[rev-youtube video_id="wzu6nRAA2pM"]

**Using Video URL:**
[rev-youtube video_url="https://www.youtube.com/watch?v=wzu6nRAA2pM"]
Note: If both video_id and video_url are provided, the video_url will be used.

**Example with video options:**
[rev-youtube video_id="wzu6nRAA2pM" width="560px" height="315px" controls="1" allow_full_screen="0" fixed_size="1" autoplay="0" start="30"]

[rev-youtube video_id="wzu6nRAA2pM" width="100%" controls="1" allow_full_screen="0" fixed_size="0" autoplay="0"]

== Installation ==

From your WordPress dashboard

1. **Visit** Plugins > Add New
2. **Search** for "REV" or "Responsive Embedded Video"
3. **Activate** REV - Responsive Embedded Video from your Plugins page
4. **Read** the documentation to [get started](https://www.thenextjump.com/products/rev-documentation/)

== Frequently Asked Questions ==

1. **Where to setup plugin after installation?** There is no settings menu for this plugin. Just use the shortcode to embed a Youtube or Vimeo video.

== Changelog ==

= 1.2.0 [16 January 2022] =
Added an option to use the Youtube video's URL instead of the ID. (Youtube only)

= 1.1.0 =
Added related videos attribute. You can now either enable or disable related videos after playing the video. (Youtube only)

= 1.0.1 =
Additional security feature and bug fixes.

= 1.0.0 =
Initial release

== Upgrade Notice ==

= 1.0.0 =

This is the initial release. No need to do anything prior to the installation.