<div id="user-profile">
    <h1>
        <?php print $user_profile['field_first_name'][0]['#markup'] . ' ' .
        $user_profile['field_last_name'][0]['#markup']; ?>
    </h1>
    <table>
        <tr><td>Member since:</td><td>$user_profile['field_street_number'][0]['#markup']</td></tr>
        <tr><td>Invullen</td></tr>
    </table>
</div>