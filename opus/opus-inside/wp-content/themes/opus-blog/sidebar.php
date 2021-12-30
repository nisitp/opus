<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Opus-Blog
 */
// gc change to typically show. Was previously only showing on blog posts I think.
// if(!is_active_sidebar('sidebar-1') || !is_single( '55' )) return;

// hide for anything tagged as "full-screen" in custom admin tag taxonomy
if (!is_active_sidebar('sidebar-1') || has_term('full-screen','admin-tag')) return;
//if (!is_user_logged_in()) return;
?>
        <aside class="sidebar">
          <div>
        	<?php dynamic_sidebar('sidebar'); ?>
          </div>
        </aside>
