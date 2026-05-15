<?php
require __DIR__ . '/includes/functions.php';
redirect('invoice.php?' . http_build_query($_GET));
