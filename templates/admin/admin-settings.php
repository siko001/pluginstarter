<?php if (isset($_GET['settings-updated'])) :
    include plugin_dir_path(__FILE__) . 'admin-notice-settings-success.php';
endif;
?>

<!--  Settings go Here -->
<div id="gh-s-admin-settings">
    <h2 id="main-setting-title">
        <?php esc_html_e('Heading for settings Page', 'text-domain'); ?>
    </h2>

    <form method="post" action="options.php">
        <?php settings_fields('group_name'); ?>
        <table class="form-table">

            <!-- Enter inputs and field for setting here -->
        </table>
    </form>
</div>