<?php
$account = menu_get_object('user');

$name = $account->field_first_name['und'][0]['value'] . ' ' .
    $account->field_last_name['und'][0]['value'];
$street = $account->field_street_number['und'][0]['value'];
$date_of_birth = $account->field_date_of_birth['und'][0]['value'];
$city = $account->field_postal_code['und'][0]['value'].' '.$account->field_city['und'][0]['value'];;
$telephone = $account->field_phone_number['und'][0]['value'];
$email = $account->mail;
$since = date("d/m/Y", $account->t ccreated);
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