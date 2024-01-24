<?php
session_start();
session_destroy();
echo "<script>
                alert('Vous allez être déconnecter.');
                window.location.replace('../pages/logadmin.pages.php');
        </script>";
?>


