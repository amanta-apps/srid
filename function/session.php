<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['pernr'])) {
    header('location: ../');
}
// if (isset($_SESSION['pernr'])) {
//     header('location: /page/mainpage?p=ZGFzaGJvYXJk');
// }
