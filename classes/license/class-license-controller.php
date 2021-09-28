<?php
defined('ABSPATH') || die('Direct access is not allow');

class Lcg_License_Controller
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'lcg_license_menu'));
        add_action('admin_init', array($this, 'lcg_register_option'));
        add_action('admin_init', array($this, 'lcg_activate_license'));
        add_action('admin_notices', array($this, 'lcg_admin_notices'));
    }

    /**
     * This is a means of catching errors from the activation method above and displaying it to the customer
     */
    public function lcg_admin_notices()
    {
        if (isset($_GET['sl_activation']) && !empty($_GET['message'])) {
            switch ($_GET['sl_activation']) {
                case 'false':
                    $message = urldecode($_GET['message']); ?>
                    <div class="error">
                        <p><?php echo $message; ?></p>
                    </div><?php
                            break;
                        case 'true':
                        default:
                            // Developers can put a custom success message here for when activation is successful if they way.
                            break;
                    }
                }
            }

            public function lcg_activate_license()
            {

                // listen for our activate button to be clicked
                if (isset($_POST['lcg_license_activate']) || isset($_POST['lcg_license_deactivate'])) {

                    // run a quick security check
                    if (!check_admin_referer('lcg_license_nonce', 'lcg_license_nonce'))
                        return; // get out if we didn't click the Activate button

                    // retrieve the license from the database
                    $license = trim(get_option('lcg_license_key'));

                    $action = isset($_POST['lcg_license_activate']) ? 'activate_license' : 'deactivate_license';

                    // data to send in our API request
                    $api_params = array(
                        'edd_action' => $action,
                        'license'    => $license,
                        'item_id'    => LCG_REMOTE_POST_ID, // The ID of the item in EDD
                        'url'        => home_url()
                    );

                    // Call the custom API.
                    $response = wp_remote_post( LCG_REMOTE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

                    // make sure the response came back okay
                    if (is_wp_error($response) || 200 !== wp_remote_retrieve_response_code($response)) {

                        $message =  (is_wp_error($response) && !empty($response->get_error_message())) ? $response->get_error_message() : __('An error occurred, please try again.', 'logo-showcase-ultimate');
                    } else {

                        $license_data = json_decode(wp_remote_retrieve_body($response));
                        if (!$license_data) {
                            $message =  (is_wp_error($response) && !empty($response->get_error_message())) ? $response->get_error_message() : __('Response not found!', 'logo-showcase-ultimate');
                        }
                        if (false === $license_data->success) {

                            switch ($license_data->error) {

                                case 'expired':

                                    $message = sprintf(
                                        __('Your license key expired on %s.', 'logo-showcase-ultimate'),
                                        date_i18n(get_option('date_format'), strtotime($license_data->expires, current_time('timestamp')))
                                    );
                                    break;

                                case 'revoked':

                                    $message = __('Your license key has been disabled.', 'logo-showcase-ultimate');
                                    break;

                                case 'missing':

                                    $message = __('Invalid license.', 'logo-showcase-ultimate');
                                    break;

                                case 'invalid':
                                case 'site_inactive':

                                    $message = __('Your license is not active for this URL.', 'logo-showcase-ultimate');
                                    break;

                                case 'item_name_mismatch':

                                    $message = sprintf(__('This appears to be an invalid license key.', 'logo-showcase-ultimate'));
                                    break;

                                case 'no_activations_left':

                                    $message = __('Your license key has reached its activation limit.', 'logo-showcase-ultimate');
                                    break;

                                default:

                                    $message = __('An error occurred, please try again.', 'logo-showcase-ultimate');
                                    break;
                            }
                        }
                    }

                    // Check if anything passed on a message constituting a failure
                    if (!empty($message)) {
                        $base_url = admin_url('edit.php?post_type=lcg_mainpost&page=lcg-license');
                        $redirect = add_query_arg(array('sl_activation' => 'false', 'message' => urlencode($message)), $base_url);

                        wp_redirect($redirect);
                        exit();
                    }

                    // $license_data->license will be either "valid" or "invalid"

                    update_option('lcg_license_status', $license_data->license);
                    wp_redirect(admin_url('edit.php?post_type=lcg_mainpost&page=lcg-license'));
                    exit();
                }
            }

            public function lcg_register_option()
            {
                // creates our settings in the options table
                register_setting('lcg_license', 'lcg_license_key', array($this, 'lcg_sanitize_license'));
            }

            public function lcg_sanitize_license($new)
            {
                $old = get_option('lcg_license_key');
                if ($old && $old != $new) {
                    delete_option('lcg_license_status'); // new license has been entered, so must reactivate
                }
                return $new;
            }

            public function lcg_license_menu()
            {
                add_submenu_page(
                    'edit.php?post_type=lcg_mainpost',
                    __('License', 'logo-showcase-ultimate'),
                    __("<span style='color: #fc21ff;font-weight: bold;'>License</span>", 'logo-showcase-ultimate'),
                    'manage_options',
                    'lcg-license',
                    array($this, 'show_license_page')
                );
            }

            public function show_license_page()
            {
                $license = get_option('lcg_license_key');
                $status  = get_option('lcg_license_status');
                            ?>
        <div class="wrap">
            <h2><?php _e('Plugin License Options', 'logo-showcase-ultimate'); ?></h2>
            <form method="post" action="options.php">

                <?php settings_fields('lcg_license'); ?>

                <table class="form-table">
                    <tbody>
                        <tr valign="top">
                            <th scope="row" valign="top">
                                <?php _e('License Key', 'logo-showcase-ultimate'); ?>
                            </th>
                            <td>
                                <input id="lcg_license_key" name="lcg_license_key" type="text" class="regular-text" value="<?php esc_attr_e($license); ?>" />
                                <label class="description" for="lcg_license_key"><?php _e('Enter your license key', 'logo-showcase-ultimate'); ?></label>
                            </td>
                        </tr>
                        <?php if (false !== $license) { ?>
                            <tr valign="top">
                                <th scope="row" valign="top">
                                    <?php _e('Activate License', 'logo-showcase-ultimate'); ?>
                                </th>
                                <td>
                                    <?php if ($status !== false && $status == 'valid') { ?>
                                        <span style="color:green;"><?php _e('active'); ?></span>
                                        <?php wp_nonce_field('lcg_license_nonce', 'lcg_license_nonce'); ?>
                                        <input type="submit" class="button-secondary" name="lcg_license_deactivate" value="<?php _e('Deactivate License', 'logo-showcase-ultimate'); ?>" />
                                    <?php } else {
                                        wp_nonce_field('lcg_license_nonce', 'lcg_license_nonce'); ?>
                                        <input type="submit" class="button-secondary" name="lcg_license_activate" value="<?php _e('Activate License', 'logo-showcase-ultimate'); ?>" />
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php submit_button(); ?>

            </form>
    <?php
            }
        }