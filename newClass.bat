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
ECHO %tab%%tab%%tab%$this-^>loadViewBasic();>>%className%Controller.php
ECHO %tab%%tab%^}>>%className%Controller.php
ECHO %tab%^}>>%className%Controller.php
ECHO ?^>>>%className%Controller.php
CD ./../..
SET modelName=%1
ECHO Creating model...
CD ./app/models
ECHO ^<?php >%modelName%Model.php
ECHO %tab%require_once 'model.php';>> %modelName%Model.php
ECHO %tab%class %modelName%Model extends Model ^{>> %modelName%Model.php
ECHO %tab%^}>>%modelName%Model.php
ECHO ?^>>>%modelName%Model.php
CD ./../..
CD ./app/views
ECHO ^<h4^ class="container text-center"^>New Controller %className% works!^<^/h4^>>%className%View.phtml
EXIT