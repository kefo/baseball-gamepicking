<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $page_title ?></title>
		<meta charset="UTF-8">
		<!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->
		
		<link href="<?php echo RELATIVEPATH; ?>static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo RELATIVEPATH; ?>static/style.css" rel="stylesheet">
		
		<!-- load jQuery and tablesorter scripts -->
        <script type="text/javascript" src="<?php echo RELATIVEPATH; ?>static/js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="<?php echo RELATIVEPATH; ?>static/js/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="<?php echo RELATIVEPATH; ?>static/js/jquery.tablesorter.widgets.min.js"></script>
        
        <script src="<?php echo RELATIVEPATH; ?>static/bootstrap/js/bootstrap.min.js"></script>
        
        <link href="<?php echo RELATIVEPATH; ?>static/css/tablesorter.theme.bootstrap.css" rel="stylesheet">
        
        <script type="text/javascript">
		    $(document).ready(function(){
                $(function(){
                    $("#gamesTable").tablesorter();
                });
                
                $('.tablesorter-bootstrap').tablesorter({
	            	theme : 'bootstrap',
		            headerTemplate: '{content} {icon}',
		            widgets    : ['zebra','columns', 'uitheme']
	            });
            });
        </script>

			<style>
				body {
					/* padding-top: 40px; */ /* 60px to make the container go all the way to the bottom of the topbar */
				}
			</style>
		</head>

	<body>
        <div class="container">
            <div class="page-header">
                <h1><?php echo $page_title; ?></h1>
                <p class="lead"><? echo $page_lead; ?></p>
            </div>
        </div>
