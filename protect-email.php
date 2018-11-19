<?php
/**
 * MS-Studio Protect Email
 * Plugin Name: MS-Studio Protect Email
 * Plugin URI: https://github.com/ms-studio/protect-email/
 * Description: Helper plugin for email display
 * Version: 1.0.0+build20181119
 * Author: Manuel Schmalstieg
 * Author URI: https://ms-studio.net
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

/**

 Usage example: 

 if (function_exists('ms_studio_protect_email')) {
   $email = ms_studio_protect_email( $email );
 }
 echo $email;
 
*/

 /**
 * Protect Email
 *
 * INPUT:
 * @param string $email : the raw email to protect.
 *
 * OUTPUT:
 * Returns the protected email.
 * 
 */

function ms_studio_protect_email( $email = 'me@example.com' ) {

  // Split at the @:

  $pieces = explode( "@", $email );

  // Return the email as <span class="email">me [at] example.com</span>

  $email = '<span class="email">'.$pieces[0].' [at] '.$pieces[1].'</span>';

  return $email;

}

/*
 * Load JS in page footer
 *
 * EmailSpamProtection
   ****************************************************
   * Author: Mike Unckel
   * Description and Demo: http://unckel.de/labs/jquery-plugin-email-spam-protection
   *
   * Expected format: <span class="email">me [at] example.com</span>
  
*/

function ms_studio_protect_email_js() { 

  ?>
<script>
// MS-Studio Protect Email
jQuery(document).ready(function($){
  $.fn.emailSpamProtection = function(className) {
    return $(this).find("." + className).each(function() {
      var $this = $(this);
      var s = $this.text().replace(" [at] ", "&#64;");
      $this.html("<a href=\"mailto:" + s + "\">" + s + "</a>");
    });
  };
  $("body").emailSpamProtection("email");
});
</script>
<?php

 } 

add_action('wp_footer', 'ms_studio_protect_email_js');

