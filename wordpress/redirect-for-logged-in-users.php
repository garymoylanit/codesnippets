add_action('wp', 'add_login_check');
function add_login_check()
{
    if ( is_user_logged_in() && is_page( [480] ) ) {
        wp_redirect('https://someurl.com/');
        exit;
    }
}
