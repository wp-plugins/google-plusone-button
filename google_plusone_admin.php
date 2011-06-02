<?php
$google_plusone_options = get_option('google_plusone_options');
$selected = 'selected="selected"';
if ( isset($_POST['submit']) ) {
  if (function_exists('current_user_can') && !current_user_can('manage_options')) {
    die(__('Error'));
  }
  $google_plusone_options['position'] = htmlspecialchars($_POST['position']);
  $google_plusone_options['size'] = htmlspecialchars($_POST['size']);
  update_option('google_plusone_options', $google_plusone_options);
}
?>
<?php if (!empty($_POST )) : ?>
<div id="message" class="updated fade"><p><strong><?php _e('Options saved.') ?></strong></p></div>
<?php endif; ?>
<div class="wrap">
<?php screen_icon(); ?>
  <h2><?php _e('Google +1 Configuration', 'google_plusone'); ?></h2>
  <form action="" method="post">
    <h3><span><?php _e("Settings", "google_plusone") ?></span></h3>
    <div class="inside" style="display: block;">
      <table class="form-table">
        <tr>
          <th><?php _e("Position", "google_plusone") ?></th>
          <td>
            <select name="position">
              <option <?php if ($google_plusone_options['position'] == 'top') echo $selected; ?> value="top">Top</option>
              <option <?php if ($google_plusone_options['position'] == 'bottom') echo $selected; ?> value="bottom">Bottom</option>
              <option <?php if ($google_plusone_options['position'] == 'none') echo $selected; ?> value="none">None</option>
            </select>
          </td>
        </tr>
        <tr>
          <th><?php _e("Size", "google_plusone") ?></th>
          <td>
            <select name="size">
              <option <?php if ($google_plusone_options['size'] == 'standard') echo $selected; ?> value="standard">Standard</option>
              <option <?php if ($google_plusone_options['size'] == 'small') echo $selected; ?> value="small">Small</option>
              <option <?php if ($google_plusone_options['size'] == 'medium') echo $selected; ?> value="medium">Medium</option>
              <option <?php if ($google_plusone_options['size'] == 'tall') echo $selected; ?> value="tall">Tall</option>
            </select>
          </td>
        </tr>
        <tr>
          <th></th>
          <td>
            <input type="submit" name="submit" class="button" value="<?php _e('Update options &raquo;'); ?>" />
          </td>
        </tr>
      </table>
    </div>
  </form>
</div>
