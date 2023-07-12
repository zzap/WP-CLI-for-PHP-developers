<?php
/**
 * Export users
 *
 * Links:
 * - https://www.php.net/manual/en/function.fopen.php
 * - https://www.php.net/manual/en/function.fputcsv.php
 * - https://make.wordpress.org/cli/handbook/references/internal-api/wp-cli-log/
 * - https://make.wordpress.org/cli/handbook/references/internal-api/wp-cli-utils-format-items/
 * - https://developer.wordpress.org/reference/functions/get_users/
 *
 * wp eval-file export_users.php
 */
$fields = array(
	'ID',
	'user_login',
	'user_email',
	'user_pass',
);

$users = get_users(
	array(
		'fields' => $fields,
	)
);

$output = array();

$fp = fopen( 'users-php.csv', 'w' );

foreach ( $users as $user ) {
	$user_array = array(
		'ID'         => $user->ID,
		'user_login' => $user->user_login,
		'user_email' => $user->user_email,
		'user_pass'  => $user->user_pass,
	);

	$output[] = $user_array;

	WP_CLI::success( __( "Writing $user->user_login", 'wpcli' ) );
    fputcsv( $fp, $user_array );
}

WP_CLI\Utils\format_items( 'table', $output, $fields );

fclose( $fp );
