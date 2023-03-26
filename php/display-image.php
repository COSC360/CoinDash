<?php
session_start();

?>
<script>
    const url = localStorage.getItem($_SESSION['Id']);
    document.getElementById('pfp').src = url;
</script>
