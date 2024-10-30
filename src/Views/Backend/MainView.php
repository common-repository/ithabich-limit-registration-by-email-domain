<?php
namespace ITHabich\LimitRegistrationByMailDomain\Views\Backend;

if(!defined('ABSPATH')) exit;

class MainView {
  
    public function renderPage()
    {
        echo '<div class="wrap">
              <h1>' . esc_html__('Limit registration by mail domain', 'ithabich-limit-registration-by-email-domain') . '</h1>
              <form action="options.php" method="post">';
        settings_fields('ithlrbmdsettingsgroup');
        do_settings_sections('limitregistrationbymaildomain-settings');
        submit_button();
        echo '</form>
             </div>';
    }

    public function renderDesc()
    {
        echo "<h2>".esc_html__("Manage Allowed Email Domains", "ithabich-limit-registration-by-email-domain")."</h2>";
        echo "<div>";
        echo "<p>".esc_html__("With this WordPress plugin, managing the allowed email domains for registration is easy and flexible.", "ithabich-limit-registration-by-email-domain")."</br>";
        echo esc_html__("However, please keep in mind that it only regulates the registration for WordPress Core. Other plugins, such as 2FA-plugins, BuddyPress, or WooCommerce, may alter the registration process in a way that may affect the settings of this plugin.", "ithabich-limit-registration-by-email-domain")."<br />";
        echo esc_html__("Therefore, it is important to thoroughly check that the restrictions are functioning as desired after any changes.", "ithabich-limit-registration-by-email-domain")."</p>";
        echo "<p>".esc_html__("In the input field, you can enter either a comma-separated list of domains, a single domain name, or a blank field. The latter resets the setting and no longer filters. Please note that the domains must always begin with an @ symbol.", "ithabich-limit-registration-by-email-domain")."</p>";
        echo "<div style='display: flex;'>";
        echo "<div style='flex:1; margin-right: 20px;'>";
        echo "<h4>".esc_html__("Input Options:", "ithabich-limit-registration-by-email-domain")."</h4>";
        echo "<table>";
        echo "<tr>";
        echo "<td><strong>".esc_html__("Comma-separated list of email domains", "ithabich-limit-registration-by-email-domain")."</strong></td>";
        echo "<td><code>@example1.com, @example2.com, @example3.com</code></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><strong>".esc_html__("Single domain name", "ithabich-limit-registration-by-email-domain")."</strong></td>";
        echo "<td><code>@example.com</code></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><strong>".esc_html__("Blank field", "ithabich-limit-registration-by-email-domain")."</strong></td>";
        echo "<td><code>".esc_html__("(leave the field blank)", "ithabich-limit-registration-by-email-domain")."</code></td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
        echo "<div style='flex:1;'>";
        echo "<h4>".esc_html__("Examples of Incorrect Input:", "ithabich-limit-registration-by-email-domain")."</h4>";
        echo "<ul>";
        echo "  <li>".esc_html__("Missing \"@\" symbol before the domain name", "ithabich-limit-registration-by-email-domain")." <code>example.com</code> </li>";
        echo "  <li>".esc_html__("Space after the \"@\" symbol", "ithabich-limit-registration-by-email-domain")." <code>@ example.com</code> </li>";
        echo "</ul>";
        echo "</div>";
        echo "</div>";
        echo "</div>"; 
    }

    public function renderInputField($args)
    {
        echo '<div style="display:flex">';
        echo '<input style="width: 100%" type="text" name="' . esc_attr($args['name']) . '" id="' . esc_attr($args['name']) . '" value="' . esc_attr(get_option($args['name'])) . '" placeholder="' . esc_attr($args['placeholder']) . '" />';
        echo '</div>';
    }
}
 