<?php
require __DIR__ . '/includes/functions.php';
redirect('invoice?' . http_build_query($_GET));
