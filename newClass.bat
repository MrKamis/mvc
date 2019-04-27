@ECHO OFF
CLS
SET className=%1
IF "%className%"=="" (
    ECHO Not name
    EXIT
)
SET "tab=    "
ECHO Creating class...
CD ./app/controllers
ECHO ^<?php >%className%Controller.php
ECHO %tab%require_once 'controller.php';>> %className%Controller.php
ECHO %tab%class %className%Controller extends Controller ^{>> %className%Controller.php
ECHO %tab%%tab%public function index() ^{>>%className%Controller.php
ECHO %tab%%tab%%tab%echo '%className%Controller works!';>>%className%Controller.php
ECHO %tab%%tab%^}>>%className%Controller.php
ECHO %tab%^}>>%className%Controller.php
ECHO ?^>>>%className%Controller.php