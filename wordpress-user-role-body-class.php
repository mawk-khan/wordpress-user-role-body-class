function add_user_role_to_body_classes( $classes ) {
    global $current_user;

    foreach ( $current_user->roles as $user_role ) {
        if ( is_admin() ) {
            $classes .= ' role-' . $user_role;
        } else {
            $classes[] = 'role-' . $user_role;
        }
    }

    return $classes;
}
add_filter( 'body_class', 'add_user_role_to_body_classes', 100 );
add_filter( 'admin_body_class', 'add_user_role_to_body_classes', 100 );
