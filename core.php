<?php
/*
Plugin Name: BuddyPress Utilities
Description: [Groups] ,[Groups Documents] and [Groups Members].
Plugin URI: http://wordpress.org/extend/plugins/really-simple-maps
Author: Stavros Kainich
Version: 1.0
Author URI: http://gr.linkedin.com/pub/stavros-kainich/71/ba9/308

*/


function Documents($atts){

$user_id=get_current_user_id();
 if ( bp_has_groups('user_id=' . $user_id) ) : ?>
 
    <div class="pagination">
 
        <div class="pag-count" id="group-dir-count">
            <?php bp_groups_pagination_count() ?>
        </div>
 
        <div class="pagination-links" id="group-dir-pag">
            <?php bp_groups_pagination_links() ?>
        </div>
 
    </div>
 
    
    <?php while ( bp_groups() ) : bp_the_group(); ?>
<table id="groups-list" >
 <tr>
        <th  class="thegroup">
            <div class="item-avatar">
                <a href="<?php bp_group_permalink() ?>"><?php bp_group_avatar('type=full&width=130&height=100') ?></a>
            </div>
 
            <div class="item">
                <div class="groupName"><a href="<?php bp_group_permalink() ?>"><?php bp_group_name() ?></a></div>
               
               <div class="item-desc"><?php  // bp_group_description_excerpt() ?></div>
               
 
                <?php do_action( 'bp_directory_groups_item' ) ?>
            </div>
  <?php //do_action( 'bp_directory_groups_actions' ) ?>

            <div class="action">
               
 
                <div class="meta">
                    <?php // bp_group_type() ?>

                   <div class="groupMembers"><?php bp_group_member_count() ?></div><?php bp_group_join_button() ?>
 
                </div>
 
               
            </div>
 
            <div class="clear"></div>
</th>
        </tr>
 
<tr>
<td>
    <?php 
$myId= bp_get_group_id();

$groupname=strtolower(bp_get_group_name());             //Normalize Group name so it can fit the category slug
$groupname=str_replace(" ","-",$groupname);
if ( bp_group_has_members( 'exclude_admins_mods=false&group_id='.$myId) ) : 

echo do_shortcode("[downloads category=".$groupname."]");            //print the customized shortcode for download monitor


 endif;?>
</td></tr>

</table>
<?php endwhile; ?>

    
 
    <?php do_action( 'bp_after_groups_loop' ) ?>
 
<?php else: ?>
 
    <div id="message" class="info">
        <p><?php _e( 'There were no groups found.', 'buddypress' ) ?></p>
    </div>
 
<?php endif; 


//-----------------------------------------------------------------------------------
}

function Members($atts){


$user_id=get_current_user_id();
 if ( bp_has_groups('user_id=' . $user_id) ) : ?>
 
    <div class="pagination">
 
        <div class="pag-count" id="group-dir-count">
            <?php bp_groups_pagination_count() ?>
        </div>
 
        <div class="pagination-links" id="group-dir-pag">
            <?php bp_groups_pagination_links() ?>
        </div>
 
    </div>
 
    
    <?php while ( bp_groups() ) : bp_the_group(); ?>
<table id="groups-list" >
 <tr>
        <th>
            <div class="item-avatar">
                <a href="<?php bp_group_permalink() ?>"><?php bp_group_avatar( 'type=full&width=130&height=100' ) ?></a>
            </div>
 
            <div >
                <div class="groupName"><a href="<?php bp_group_permalink() ?>"><?php bp_group_name() ?></a></div>
                <div class="groupMembers"><span style="font-size:9pt; font-wight:normal;" ><?php printf( __( 'active %s ago', 'buddypress' ), bp_get_group_last_active() ) ?></span></div>
 
                
 
                <?php do_action( 'bp_directory_groups_item' ) ?>
            </div>
 
            <div class="action">
              
 
                <?php //do_action( 'bp_directory_groups_actions' ) ?>
            </div>
 
            <div class="clear"></div>
        <th>
 </tr>

    <?php 
$myId= bp_get_group_id();


if ( bp_group_has_members( 'group_id='.$myId) ) : ?>
 
  

   
  <?php while ( bp_group_members() ) : bp_group_the_member(); ?>
<tr style="height:80px">
<td style="height:80px">

   <div style="display: table-row;">
      <!-- Example template tags you can use -->
      <?php bp_group_member_avatar_mini( $width = 130, $height = 80 ) ?>
       <div class="groupNamee" style="color:#004178;"><?php bp_group_member_link() ?></div>
       <div class="groupMemberss"><?php bp_group_member_joined_since() ?></div>
    </div>
</td>
</tr>
  <?php endwhile; ?>
  
 
<?php else: ?>
<tr style="height:80px">
 <td style="height:80px">

 
    <p class="nomembers">This group has no members.</p>


 </td>
</tr>
<?php endif;?>



</table>
<?php endwhile; ?>

    
 
    <?php do_action( 'bp_after_groups_loop' ) ?>
 
<?php else: ?>
 
    <div id="message" class="info">
        <p><?php _e( 'There were no groups found.', 'buddypress' ) ?></p>
    </div>
 
<?php endif; ?>




<?php

}
add_shortcode('Groups Members', 'Members' );
add_shortcode('Groups Documents', 'Documents' );
add_shortcode('Groups', 'Groups' );





function Groups($atts){



$user_id=get_current_user_id();
 if ( bp_has_groups('user_id=' . $user_id) ) : ?>
 
    <div class="pagination">
 
        <div class="pag-count" id="group-dir-count">
            <?php bp_groups_pagination_count() ?>
        </div>
 
        <div class="pagination-links" id="group-dir-pag">
            <?php bp_groups_pagination_links() ?>
        </div>
 
    </div>
 
    
    <?php while ( bp_groups() ) : bp_the_group(); ?>
<table id="groups-list" >
<tr>
        <th style="border-top: 0px;">
            <div class="item-avatar">
                <a href="<?php bp_group_permalink() ?>"><?php bp_group_avatar( 'type=full&width=130&height=100' ) ?></a>
            </div>
 
            <div class="item">
                <div class="groupName" ><a href="<?php bp_group_permalink() ?>"><?php bp_group_name() ?></a></div>
               
 
                <div class="item-desc"><?php //bp_group_description_excerpt() ?></div>
 
                <?php do_action( 'bp_directory_groups_item' ) ?>
            </div>
     
            <div class="action">
                <?php bp_group_join_button() ?>
 
                <div class="groupMembers">
                    <?php //bp_group_type() ?>  <?php bp_group_member_count() ?>
                </div>
 
                <?php //do_action( 'bp_directory_groups_actions' ) ?>
            </div>
 
            <div class="clear"></div>
       
 
  </th>
 </tr>

</table>


<?php endwhile; ?>


 
    <?php do_action( 'bp_after_groups_loop' ) ?>
 
<?php else: ?>
 
    <div id="message" class="info">
        <p><?php _e( 'There were no groups found.', 'buddypress' ) ?></p>
    </div>
 
<?php endif; ?>




<?php

}




function bphelp_remove_groups_from_profile(){
bp_core_remove_nav_item('Home');
}
add_action('bp_activity_setup_nav','bphelp_remove_groups_from_profile');