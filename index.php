<?php
require "vendor/autoload.php";

echo (new BracketsChecker\Checker("()(((())))))))))))))))(("))->checkWithInfo();