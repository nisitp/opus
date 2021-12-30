<?php
/*
Plugin Name:Simple Org Chart
Version:2.0.1
Plugin URI: #
Description: Build Org chart by dragging users in required order.
Author: Gangesh Matta
Author URI: #
*/


add_action('admin_init', 'org_chart_init');
add_action('admin_menu', 'org_chart_add_page');


add_action('admin_init', 'orgchart_scripts');
add_action('admin_enqueue_scripts', 'orgchart_enqueue');


function orgchart_scripts()
{
    wp_enqueue_style('orgchart-style1', plugin_dir_url(__FILE__) . 'css/jquery.jOrgChart.css');
    wp_enqueue_style('orgchart-style2', plugin_dir_url(__FILE__) . 'css/custom.css');

}


function orgchart_enqueue()
{

    // Use `get_stylesheet_directory_uri() if your script is inside your theme or child theme.

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-draggable');
    wp_enqueue_script('jquery-ui-droppable');
    wp_enqueue_media();

    wp_enqueue_script('org_cha', plugin_dir_url(__FILE__) . 'js/jquery.jOrgChart.js');
    wp_enqueue_script('org_cha1', plugin_dir_url(__FILE__) . 'js/custom.js');


}


// Init plugin options to white list our options
function org_chart_init()
{
    register_setting('org_chart_options', 'org_chart_sample', 'org_chart_validate');
}

// Add menu page
function org_chart_add_page()
{
    add_options_page('Org Chart Builder', 'Org Chart', 'manage_options', 'org_chart', 'org_chart_do_page');
}

// Draw the menu page itself
function org_chart_do_page()
{
    ?>
    <div class="wrap">
        <?php
        echo '<div class="wrap orgchart">';
        echo '<h2>SIMPLE ORG CHART Builder</h2>';

        if (isset($_POST['osubmit'])) {
            orgchart_remove_meta();
            update_user_meta($_POST['user_dropdown'], "top_org_level", 1);

        }


        ?>
        <span class="oblock">Drag and Drop users in order to set levels and Save Changes.<br>Use shortcode
                    <b>[orgchart]</b> to display on any page or post.
                </span>
        <span class="oinline"> <?php _e('Select Top Level:'); ?> </span>

          <span class="oinline">          <form action="<?php echo admin_url(); ?>options-general.php?page=org_chart"
                                                name="select_top_level"
                                                method="post">

                  <?php

                  $user_query0 = new WP_User_Query(array('meta_key' => 'top_org_level', 'meta_value' => 1));

                  if (!empty($user_query0->results)) {

                      foreach ($user_query0->results as $user) {
                          $top_level_id = $user->ID;
                          $top_level = $user->display_name;

                      }
                  }


                  $args = array(
                      'meta_key' => 'team_member',
                      'meta_value' => 'yes',
                  );

                  $users = get_users($args);

                  // now make your users dropdown

                  if ($users) { ?>

                      <select name="user_dropdown">
                          <?php foreach ($users as $userz) {

                              $top_user = '';
                              if ($userz->ID == $top_level_id) {
                                  $top_user = "selected";
                              }

                              echo '<option ' . $top_user . ' value="' . $userz->ID . '">' . $userz->display_name . '</option>';
                          } ?>
                      </select>
                      <?php
                  }

                  // now get selected user id from $_POST to use in your next function
                  if (isset($_POST['user_dropdown'])) {
                      $userz_id = $_POST['user_dropdown'];

                      $user_data = get_user_by('id', $userz_id);
                  }


                  // get user data


                  /*echo $user_data->display_name;
                  echo $user_data->user_nicename;
                  echo $user_data->user_email;
                    */

                  /*  wp_dropdown_users(array('name' => 'users', 'selected'=> $top_level_id)); */

                  ?>


                  <input type="submit" name="osubmit" id="oreset" value="Reset"/>
              </form>
               </span>




        <?php

        if ($top_level_id != '') {

            ?>
            <?php

            $options = get_option('org_chart_sample');

            if (isset($_POST['osubmit'])) {
                $otree = '';

                $uimg = get_user_meta($top_level_id, 'shr_pic', true);
                $image = wp_get_attachment_image_src($uimg, 'thumbnail');

                $org_role = get_user_meta($top_level_id, 'org_job_title', true);

                $org_date = date("m Y", strtotime(get_userdata($top_level_id)->user_registered));


                $user_b = '<div id="" data-id="bio' . $top_level_id . '" class="overlay1">
<div class="popup1">
		<a class="close1" href="#">&times;</a>
		<div class="content1">

' . nl2br(get_the_author_meta('description', $top_level_id)) . '
</div></div>
</div><a href="#bio' . $top_level_id . '" class="bio' . $top_level_id . '">';

                if (get_the_author_meta('description', $top_level_id) != '') {

                    $user_b = $user_b;
                } else {
                    $user_b = '';
                }

                echo '<ul id="org" style="display:none">';

                if (!empty($uimg)) {

                    $otree .= '<li id="' . $top_level_id . '">  ' . $user_b . ' <img src="' . $image[0] . '">' . $user_data->display_name . '<small> ' . $org_role . ' </small></a><ul>';


                } else {

                    $otree .= '<li id="' . $top_level_id . '"> ' . $user_b . ' ' . get_avatar($top_level_id) . $user_data->display_name . '<small> ' . $org_role . ' </small></a><ul>';


                }


                $user_query1 = new WP_User_Query(array('exclude' => array($top_level_id), 'meta_key' => 'team_member',
                    'meta_value' => 'yes'));


                if (!empty($user_query1->results)) {

                    $user_b = '';
                    foreach ($user_query1->results as $user) {
                        $org_job_title = get_user_meta($user->ID, 'org_job_title', true);
                        $uimg = get_user_meta($user->ID, 'shr_pic', true);
                        $image = wp_get_attachment_image_src($uimg, 'thumbnail');

                        $user_b = '<div id="" data-id="bio' . $user->ID . '" class="overlay1">
                                        <div class="popup1">
	                                	<a class="close1" href="#">&times;</a>
	                                         	<div class="content1">

                                            ' . nl2br(get_the_author_meta('description', $user->ID)) . '
                                         </div></div>
                                        </div><a href="#bio' . $user->ID . '" class="bio' . $user->ID . '">';
                        $user_data = get_user_by('id', $user->ID);
                        $org_role = get_user_meta($user->ID, 'org_job_title', true);

                        $org_date = date("m Y", strtotime(get_userdata($user->ID)->user_registered));;
                        $user_b = '<div id="" data-id="bio' . $user->ID . '" class="overlay1">
<div class="popup1">
		<a class="close1" href="#">&times;</a>
		<div class="content1">

' . nl2br(get_the_author_meta('description', $user->ID)) . '
</div></div>
</div><a href="#bio' . $user->ID . '" class="bio' . $user->ID . '">';

                        if (get_the_author_meta('description', $user->ID) != '') {

                            $user_b = $user_b;
                        } else {
                            $user_b = '';
                        }

                        if (!empty($uimg)) {

                            $otree .= '<li id="' . $user->ID . '">  ' . $user_b . '<img src="' . $image[0] . '">' . $user_data->display_name . '<small> ' . $org_role . ' </small></a><a class="rmv-nd close" href="javascript:void(0);">Remove</a><span class="name_c" id="' . $user->ID . '"></span></li>';


                        } else {

                            $otree .= '<li id="' . $user->ID . '">  ' . $user_b . ' ' . get_avatar($user->ID) . $user_data->display_name . '<small> ' . $org_role . ' </small></a><a class="rmv-nd close" href="javascript:void(0);">Remove</a><span class="name_c" id="' . $user->ID . '"></span></li>';



                        }


                    }
                }


                $otree .= '</ul> </li></ul>';

                echo $otree;

            } elseif (get_option('org_array') != '') {

                $org_array = get_option('org_array');
                $tree = unserialize($org_array);
                $result = parseTree($tree);
                newPrintTree($result);

            } ?>


            <div id="chart" class="orgChart"></div>


            <script>

            </script>

            <?php

        } else {
            echo 'Select Top Level User';
        }

        ?>

        <!-- Old code. To be removed in next version. Just for reference. -->

        <!-- <form method="post" action="options.php">
            <?php settings_fields('org_chart_options'); ?>
            <?php $options = get_option('org_chart_sample'); ?>
            <table class="form-table">

                <tr style="visibility:hidden" valign="top">
                    <th scope="row">Some text</th>
                    <td><textarea id="chart_html" name="org_chart_sample[sometext]">

            <?php if ($_POST['osubmit']) {
            echo $otree;
        } else {
            // echo $options['sometext'];
        }
        ?>
            </textarea></td>
                </tr>
            </table> </form> -->
        <p class="submit">
            <input type="button" onClick="makeArrays();" class="button-primary"
                   value="<?php _e('Save Changes') ?>"/>
        <div class="chart_saved" style="display: none"><span>Changes Saved!</span></div>
        </p>



        <?php

        $org_array = get_option('org_array');
        $org_array = unserialize($org_array);


        $rest = array();
if(!empty($org_array)) {
    foreach ($users as $user) {
        if (array_key_exists($user->ID, $org_array)) {

        } else {

            $rest[] = $user->ID;

        }
    }
}

        //var_dump($differences);
        ?>
        <form class="pending_user" name="opending" action="">

            <select id="comboBox">
                <option value="">Select User</option>
                '
                <?php


                foreach ($rest as $rid) {
                    $ud = get_userdata($rid);
                    echo '<option value="' . $rid . '">' . $ud->display_name . '</option>';


                } ?>


            </select>
            <button id="btnAddOrg" type="button">Add</button>
        </form>



        <div id="mja"></div>


    </div>
    <?php
}


// Sanitize and validate input. Accepts an array, return a sanitized array.
function org_chart_validate($input)
{
    // Our first value is either 0 or 1
    $input['option1'] = ($input['option1'] == 1 ? 1 : 0);

    return $input;
}


function parseTree($tree, $root = null)
{
    $return = array();
    # Traverse the tree and search for direct children of the root
    foreach ($tree as $child => $parent) {
        # A direct child is found
        if ($parent == $root) {
            # Remove item from tree (we don't need to traverse this again)
            unset($tree[$child]);
            # Append the child into result array and parse its children
            $return[] = array(
                'name' => $child,
                'children' => parseTree($tree, $child)
            );
        }
    }
    return empty($return) ? null : $return;
}

function printTree($tree, $count = 0)
{

    if (!is_null($tree) && count($tree) > 0) {

        if ($count == 0) echo '<ul id="org" style="display:none">'; else echo '<ul>';
        foreach ($tree as $node) {


            $userid = (int)$node['name'];
            $user_info = get_userdata($userid);
            //$ojt = get_user_meta($userid, 'org_job_title', true);

            $user_data = get_user_by('id', $userid);

            $org_role = get_user_meta($userid, 'org_job_title', true);

            $user_b = '<div id="" data-id="bio' . $userid . '" class="overlay1">
<div class="popup1">
		<a class="close1" href="#">&times;</a>
		<div class="content1">

' . nl2br(get_the_author_meta('description', $userid)) . '
</div></div>
</div><a href="#bio' . $userid . '" class="bio' . $userid . '">';

            if (get_the_author_meta('description', $userid) != '') {

                $user_b = $user_b;
            } else {
                $user_b = '';
            }


            $org_date = date("m Y", strtotime(get_userdata($userid)->user_registered));;


            $uimg = get_user_meta($userid, 'shr_pic', true);
            $image = wp_get_attachment_image_src($uimg, 'thumbnail');
            if (!empty($uimg)) {

                echo '<li id="' . $userid . '">  ' . $user_b . '<img src="' . $image[0] . '">' . $user_data->display_name . '<small> ' . $org_role . ' </small></a>';
                if ($count != 0 && is_admin()) { echo '<span class="name_c" id="' . $userid . '"></span><a class="rmv-nd close" href="javascript:void(0);">Remove</a>'; }
            } else {


                echo '<li id="' . $userid . '">  ' . $user_b . ' ' . get_avatar($userid) . $user_data->display_name . '<small> ' . $org_role . ' </small></a>';

                if ($count != 0 && is_admin()) { echo '<span class="name_c" id="' . $userid . '"></span><a class="rmv-nd close" href="javascript:void(0);">Remove</a>'; }

            }

            newPrintTree($node['children'], 1);
            echo '</li>';
        }
        echo '</ul>';
    }
}


function orgchart_remove_meta()
{

    $users = get_users();

    foreach ($users as $user) {

        delete_user_meta($user->ID, 'top_org_level');

    }

}

add_action('init', 'orgchart_scripts');


function orgchart_display()
{

    $options = get_option('org_chart_sample');

    wp_enqueue_style('orgchart-style1', plugin_dir_url(__FILE__) . 'css/jquery.jOrgChart.css');
    wp_enqueue_style('orgchart-style2', plugin_dir_url(__FILE__) . 'css/custom.css');


    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('orgchart-script', plugin_dir_url(__FILE__) . 'js/jquery.jOrgChart.js', array(), '1.0.0', true);
    wp_enqueue_script('orgchart-script1', plugin_dir_url(__FILE__) . 'js/custom1.js', array(), '1.0.0', true);


    ?>


    <ul id="org" style="display:none">

        <?php


        $org_array = get_option('org_array');
        $tree = unserialize($org_array);
        $result = parseTree($tree);
        newPrintTree($result);
        ?>

    </ul>
    <div id="chart" class="orgChart"></div>


    <?php
}

add_shortcode('orgchart', 'orgchart_display');


function shr_extra_profile_fields($user)
{

    $profile_pic = ($user !== 'add-new-user') ? get_user_meta($user->ID, 'shr_pic', true) : false;

    if (!empty($profile_pic)) {
        $image = wp_get_attachment_image_src($profile_pic, 'thumbnail');

    } ?>

    <table class="form-table fh-profile-upload-options">
    <tr>
        <th>
            <label for="image"><?php _e('Main Profile Image', 'shr') ?></label>
        </th>

        <td>
            <input type="button" data-id="shr_image_id" data-src="shr-img" class="button shr-image" name="shr_image"
                   id="shr-image" value="Upload"/>
            <input type="hidden" class="button" name="shr_image_id" id="shr_image_id"
                   value="<?php echo !empty($profile_pic) ? $profile_pic : ''; ?>"/>
            <img id="shr-img" src="<?php echo !empty($profile_pic) ? $image[0] : ''; ?>"
                 style="<?php echo empty($profile_pic) ? 'display:none;' : '' ?> max-width: 100px; max-height: 100px;"/>
        </td>
    </tr>
    </table><?php

}

add_action('show_user_profile', 'shr_extra_profile_fields');
add_action('edit_user_profile', 'shr_extra_profile_fields');
add_action('user_new_form', 'shr_extra_profile_fields');


function shr_profile_update($user_id)
{

    if (current_user_can('edit_users')) {
        $profile_pic = empty($_POST['shr_image_id']) ? '' : $_POST['shr_image_id'];
        update_user_meta($user_id, 'shr_pic', $profile_pic);
    }

}

add_action('profile_update', 'shr_profile_update');
add_action('user_register', 'shr_profile_update');


// add anything else
function my_new_contactmethods($contactmethods)
{


    //add Phone
    $contactmethods['phone'] = 'Phone (SOC)';
    // Add Twitter
    $contactmethods['twitter'] = 'Twitter (SOC)';
//add Facebook
    $contactmethods['facebook'] = 'Facebook (SOC)';


    return $contactmethods;
}

add_filter('user_contactmethods', 'my_new_contactmethods', 10, 1);


function user_interests_fields($user)
{

    $team = get_user_meta($user->ID, 'team_member', true);
    $org_job_title = get_user_meta($user->ID, 'org_job_title', true);
    ?>
    <table class="form-table">
        <tr>
            <th>Team Member:</th>
            <td>
                <p><label for="team_member">
                        <input id="team_member" name="team_member" type="checkbox"
                               value="yes" <?php if ($team == "yes") echo "checked"; ?> />
                        Yes
                    </label></p>
            </td>
        </tr>

        <tr>
            <th>Job Title:</th>
            <td>
                <p><label for="org_job_title">
                        <input id="org_job_title" name="org_job_title" type="text"
                               value="<?php echo $org_job_title; ?>"/>

                    </label></p>
            </td>
        </tr>

    </table>
    <?php
}


add_action('show_user_profile', 'user_interests_fields');
add_action('edit_user_profile', 'user_interests_fields');
add_action('user_new_form', 'user_interests_fields');

// store interests
// store interests
function user_interests_fields_save($user_id)
{
    if (!current_user_can('edit_user', $user_id))
        return false;
    if ($_POST['team_member'] == "yes") {
        update_user_meta($user_id, 'team_member', $_POST['team_member']);
    } else {
        delete_user_meta($user_id, 'team_member');
    }

    if (!empty($_POST['org_job_title'])) {
        update_user_meta($user_id, 'org_job_title', trim($_POST['org_job_title']));
    } else {
        delete_user_meta($user_id, 'org_job_title');
    }


}

add_action('personal_options_update', 'user_interests_fields_save');
add_action('edit_user_profile_update', 'user_interests_fields_save');
add_action('user_register', 'user_interests_fields_save');

function myajax()
{

    $tree = array();
    foreach ($_POST['tree'] as $val) {

        foreach ($val as $va => $v) {

            $tree[$va] = $v;

        }

    }


    if (!is_serialized($tree)) :
        $tree = serialize($tree);
    endif;

    if (!get_option('org_array')) {
        add_option('org_array', $tree, '', 'no');
    } else {
        update_option('org_array', $tree, 'no');
    }

    $org_array = get_option('org_array');
    $org_array = unserialize($org_array);
    var_dump($org_array);

    die();
}

add_action('wp_ajax_nopriv_org_chart', 'myajax');
add_action('wp_ajax_org_chart', 'myajax');
