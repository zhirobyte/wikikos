<?php
require_once("./authPemilik.php");
session_destroy();

echo "<script>
      alert('Sampai Jumpa!');
      window.location = 'index.php'
      </script>";
