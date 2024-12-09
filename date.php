<?php

// Get the current date
$current_date = date('Y-m-d');

// Calculate the target date (60 days ago)
$target_date = date('Y-m-d', strtotime('-60 days', strtotime($current_date)));
echo '' . $current_date . '' . $target_date;