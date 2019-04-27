@ECHO OFF
CLS
SET modelName=%1
IF "%modelName%"=="" (
    ECHO Not name
    EXIT
)
SET "tab=    "
ECHO Creating model...
CD ./app/models
ECHO ^<?php >%modelName%Model.php
ECHO %tab%require_once 'model.php';>> %modelName%Model.php
ECHO %tab%class %modelName%Model extends Model ^{>> %modelName%Model.php
ECHO %tab%^}>>%modelName%Model.php
ECHO ?^>>>%modelName%Model.php