<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" />
	<!-- Toastr -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<!-- Styles -->
	<style type="text/css">
		#toast-container .toast-success{background: green !important;}
		#toast-container .toast-error{background: red !important;}
		#toast-container .toast-warning{background: coral !important;}
		#toast-container .toast-info{background: cornflowerblue !important;}
		#toast-container .toast-question{background: grey !important;}
	</style>

    <title>Carniceria</title>
</head>
<body>
    <?php
        require ("Controller/register.controller.php");
    ?>
</body>
</html>