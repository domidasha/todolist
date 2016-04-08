<!DOCTYPE>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="todoscript.js"></script>

<style type="text/css">
		body{
			margin:50px;
		}
		td {
		padding: 5px;
		}
		.popup-window{	/* //форма для заполнения */
			display: none;
			box-shadow: 0px 0px 4px 0px rgb(70, 70, 70);
			-webkit-box-shadow: 0px 0px 4px 0px rgb(70, 70, 70);
			-moz-box-shadow: 0px 0px 4px 0px rgb(70, 70, 70);
			padding: 20px;
			background: white;
			z-index: 500;
			-webkit-border-radius: 5px!important;
			-moz-border-radius: 5px!important;
			border-radius: 5px!important;
		}
		.open{ 	/*кнопка-ссылка*/
			padding: 15px;
			margin-bottom: 10px;
			cursor: pointer;
		}
		.backpopup{		/* 	//тень */
			display button:none;
			width: 100%;
			height: 100%;
			position: fixed;
			background: rgb(105, 105, 105);
			opacity: 0.7;
			top: 0;
			left: 0;
			z-index: 400;
			cursor: pointer;
		}
 		.close{		/*//кнопка закрытия окна */
			float: right;
			cursor: pointer;
			right: 5px;
			top: 0px;
			position: absolute;
			padding: 4px;
		}
		.main {
			margin-bottom: 15px; 
		}
			
		}
</style>
</head>

<body>

<h1>
Hello, I am a small snail.
This is my To Do List</h1>