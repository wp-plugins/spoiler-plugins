<?php
/*
Plugin Name: Spoiler Plugins for Wordpress 1.5
Version: 0.2rc3
Plugin URI: http://secandri.com/blog/2005/02/22/spoiler-plugins-for-wp-15/
Description: Creates a Spoiler button that will show or hide text or images on post or comments. Design for movie,comic blog.
Author: Idban Secandri
Author URI: http://secandri.com/blog/

Copyright (c) 2003
Released under the GPL license
http://www.gnu.org/licenses/gpl.txt

    This file is part of WordPress.
    WordPress is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


function smart_spoiler_tag($text) {
    $divspoil = '</p><table border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td><div style="margin-bottom:0px"><b>Spoiler Alert</b> <input type="button" value="Show!" onclick="if (this.parentNode.parentNode.getElementsByTagName(\'div\')[';
    $divspoil .= '1].getElementsByTagName(\'div\')[0].style.display != \'\') { this.parentNode.parentNode.getElementsByTagName(\'div\')[';
    $divspoil .= '1].getElementsByTagName(\'div\')[0].style.display = \'\'; this.value=\'Hide!\';} else { this.parentNode.parentNode.getElementsByTagName(\'div\')[';
    $divspoil .= '1].getElementsByTagName(\'div\')[0].style.display = \'none\'; this.value=\'Show!\';}"/></div><div style="margin: 0px; padding: 6px; border: 1px; inset;" class="tabspoil" ><div style="display: none;"><p>';
    $text = str_replace('<spoiler>', $divspoil, $text);
    $text = str_replace('</spoiler>', '</p></div></div></td></tr></table><p>', $text);
     return $text;
}


function spoiler_css() {
        echo "
<style type='text/css'>
.tabspoil {
        font-family: sans-serif, verdana, arial;
        border-top: 1px solid #809080;
        border-top-style: solid;
        border-right: 1px solid #809080;
        border-right-style: solid;
        border-left: 1px solid #809080;
        border-left-style: solid;
        border-bottom: 1px solid #809080;
        border-bottom-style: solid;
        background: #444444;
        color: #ffffff;
}
.tabspoil a {

        font-weight: bold;
        font-size:11px;
        text-decoration: none;

}

.tabspoil a:hover {
        border-bottom: 1px solid #809080;
        border-bottom-style: dotted;
        font-weight: bold;
}
</style>
";
}

add_action('wp_head', 'spoiler_css');
add_filter('the_content', 'smart_spoiler_tag', 20);
add_filter('comment_text', 'smart_spoiler_tag', 20);

// if you use the_excerpt or comment_excerpt please enable code below this
// i disable this because i dont use it on my template; and also sometime spoiler-tag doesnt complete.
//
//add_filter('the_excerpt', 'smart_spoiler_tag', 20);
//add_filter('comment_excerpt', 'smart_spoiler_tag', 20);
?>
