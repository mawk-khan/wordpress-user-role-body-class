/**
 * Add the user role to the body of the page.
 */
add_filter( 'body_class', 'add_user_roles_to_body_class' );
function add_user_roles_to_body_class( $classes ) {
    $current_user = wp_get_current_user();
    $user_roles = (array) $current_user->roles;
    foreach ( $user_roles as $role ) {
        $classes[] = 'role-' . $role;
    }
    return $classes;
}

/**
 * Add other roles to the list of users.
 * @param $query_args
 * @return mixed
 */
function add_custom_roles_to_author_field( $query_args ) {
    if( !current_user_can( 'manage_options' ) )
        $query_args['role__in'] = [ 'blog_editor' ];

    return $query_args;
}
add_filter( 'wp_dropdown_users_args', 'add_custom_roles_to_author_field' );
