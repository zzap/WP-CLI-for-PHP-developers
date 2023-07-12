<?php
/**
 * Import users
 *
 * Links:
 * - https://www.php.net/manual/en/function.fopen.php
 * - https://www.php.net/manual/en/function.fgetcsv.php
 * - https://make.wordpress.org/cli/handbook/references/internal-api/wp-cli-runcommand/
 * - https://make.wordpress.org/cli/handbook/references/internal-api/wp-cli-success/
 * - https://developer.wordpress.org/reference/functions/wp_create_user/
 *
 * wp eval-file import_users.php
 */

WP_CLI::runcommand( 'user delete $(wp user list --field=ID)' );

if ( ( $handle = fopen( "users-php.csv", "r" ) ) !== FALSE ) {
    while ( ( $data = fgetcsv( $handle, 1000, "," ) ) !== FALSE ) {
		wp_create_user( $data[1], $data[3], $data[2] );
		WP_CLI::success( __( "$data[1] is in!!", 'wpcli' ) );
    }

    fclose( $handle );
}