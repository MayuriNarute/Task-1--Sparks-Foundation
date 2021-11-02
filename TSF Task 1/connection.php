<?php
 $db = mysqli_connect('sql207.epizy.com', 'epiz_29827586', 'tIXrtrJFHeTRW') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'epiz_29827586_bank_db' ) or die(mysqli_error($db));
?>