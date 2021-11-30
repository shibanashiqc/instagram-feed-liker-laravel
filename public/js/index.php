<?php
session_start();
if(!$_SESSION) die(header('Location: /'));
if($_SESSION) die(header('Location: /'));