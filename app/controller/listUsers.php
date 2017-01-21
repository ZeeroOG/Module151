<?php

include('app/model/listUsers.php');

$users = getUserList();
$deleted_users = getDeletedUsersList();

include('app/view/adminMenu.php');
include('app/view/listUsers.php');

?>
