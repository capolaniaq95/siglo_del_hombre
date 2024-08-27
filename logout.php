<?php

session_abort();

session_reset();

header("Location: index.php");
