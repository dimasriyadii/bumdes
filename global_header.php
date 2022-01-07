<?php
session_start();
include 'koneksi.php';
?>
<div id="notif"></div>
<script type="text/javascript">
	$(function() {
  	  function notif() {
  	  	$('#notif').html('');
	    $.ajax({
	      url: 'cek_notif.php',
	      success: function(data) {
	        if (data.length > 0) {
	        	$('#notif').html(data);
	        }
	      }
	    });
	  }
	  
	  // Update friends list every 5 seconds.
	  setInterval(notif, 5000);
	  
	});
</script>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <title>Dashboard - SIBUMDES - Sistem Informasi Badan Usaha Milik Desa.</title>
    <!-- CSS files -->
    <link href="./assets/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./assets/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./assets/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./assets/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./assets/dist/css/demo.min.css" rel="stylesheet"/>
  </head>