<?php
 
// Use in the "Post-Receive URLs" section of your GitHub repo.
 
if ( $_POST['payload'] ) {
  shell_exec( 'cd /www/FMP && git reset --hard HEAD && git pull' );
}
?>
Hi