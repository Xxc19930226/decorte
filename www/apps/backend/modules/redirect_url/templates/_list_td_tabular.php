<td class="sf_admin_text sf_admin_list_td_source">
  <?php echo $redirect_url->getSource() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_destinations">
  <?php echo nl2br($redirect_url->getDestinations()) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($redirect_url->getUpdatedAt()) ? format_date($redirect_url->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
