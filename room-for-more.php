<?php
/*
Plugin Name: Room for more
Description: Insert a couple of newlines after the &lt;!--more--&gt; tag to compensate for whitespace being stripped out.
Version: 1.0
Author: David Tyler
Author URI: http://bighairydave.com/
*/

/*  Copyright 2014  David Tyler

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Add our hook into the data saving flow
add_action('wp_insert_post_data', 'bmt_modify_post_data');

function bmt_modify_post_data($data) {
	$data['post_content'] = preg_replace('/(<!--more-->)/', "$1\n\n", $data['post_content']);
	return $data;
}