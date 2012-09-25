<?php
$account = menu_get_object('user');

$name = $user_profile['field_first_name'][0]['#markup'] . ' ' .
    $user_profile['field_last_name'][0]['#markup'];
$street = $user_profile['field_street_number'][0]['#markup'];
$date_of_birth = $user_profile['field_date_of_birth'][0]['#markup'];
$city = $user_profile['field_postal_code'][0]['#markup'].' '.$user_profile['field_city'][0]['#markup'];;
$telephone = $account->field_phone_number['und'][0]['value'];
$email = $account->mail;
$since = date("d/m/Y", $account->created);
?>

<div id="user-profile">
    <h1>
        <?php print $name; ?>
    </h1>
    <table id="user-profile-info">
        <tr><td>Member since:</td><td><?php print $street;?></td><td><?php print $date_of_birth;?></td></tr>
        <tr><td><?php print $since; ?></td><td><?php print $city; ?></td><td>T: <?php print $telephone; ?></td></tr>
        <tr><td></td><td></td><td>M: <?php print $email; ?></td></tr>
    </table>
</div>