<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
<!-- Font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<!-- ckeditor -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
<!-- Styling for public area -->
<style type="text/css">
	/* * * * * * * * * *
* STYLING DEFAULTS
* * * * * * * * * */
* { margin: 0px; padding: 0px; }
a { text-decoration: none; }
h1, h2, h3, h4, h5, h6 { font-family: 'Noto Serif', serif; }
/* forms */
form { width: 60%; margin: 5px auto; padding-bottom: 50px; }
form input[type=file], input[type=email], input[type=password], input[type=text], 
form select, form textarea {
	width: 100%;
	display: block;
	padding: 13px 13px;
	font-size: 1em;
	margin: 5px auto 10px;
	border-radius: 3px;
	box-sizing : border-box;
	background: transparent;
	border: 1px solid #3E606F;
}
input[type="checkbox"] { height: 20px; float: left; }
form button { float: right; margin-left: 24%; }
form input:focus { outline: none; }
label {	margin-top: 20px; float: left; }
/* tables */
table { border-collapse: collapse; width: 70%; margin: 20px auto; }
th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
th { text-align: center;}
/* buttons */
.btn {
	color: white;
	background: #4E6166;
	text-align: center;
	border: none;
	border-radius: 5px;
	display: block;
	letter-spacing: .1em;
	padding: 13px 20px;
	text-decoration: none;
}
/* * * * * * * * * *
* HEADER
* * * * * * * * * */
.header {
	padding: 10px 45px;
	font-family: 'Noto Serif', serif;
	color: white;
	background: #003366;
}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 40%;
  border-radius: 50%;
}
.header .logo { width: 50%; float: left; }
.header .logo h1 { color: white; }
.header .imgcontainer { width: 10%;  border-radius: 50%; float: right;}
.header .img.avatar { width: 40%;  border-radius: 50%; }
.header .logout-btn { color: red; text-decoration: none; }
.header:after{ content: ""; display: block; clear: both; }
/* * * * * * * * * *
* DASHBOARD
* * * * * * * * * */
.container {
	width: 95%;
	margin: 5px auto 50px;
	border: 1px solid #BFBCB3;
	padding: 10px 0px 50px;
}
.container:after { content: ""; display: block; clear: both; }
.container.dashboard h1 { text-align: center; margin: 25px; }
.container.dashboard .stats a {
	display: inline-block;
	padding: 30px;
	margin: 5px;
	width: 25%;
	text-align: center;
	border-radius: 3px;
	border: 1px solid #BFBCB3;
}
.container.dashboard .stats a.first { margin-left: 25px; }
.container.dashboard .stats a:hover { cursor: pointer; background-color: #E1E1E1; }
.container.dashboard .buttons { margin-left: 15px; }
.container.dashboard .buttons a {
	display: inline-block;
	margin: 10px;
	text-decoration: none;
	color: #444;
	padding: 10px 25px;
	border: none;
	background-color: #0E7D92;
	color: white;
}
/* * * * * * * * * *

* PAGE CONTENT
* * * * * * * * * */
.container.content .menu { width: 16%; float: left; padding: 40px 10px; }
/* Menu card */
.container.content .menu .card .card-header {
	padding: 10px;
	text-align: center;
	border-radius: 3px 3px 0px 0px;
	background: #3E606F;
}
.container.content .menu .card .card-header h2 { color: white; }
.container.content .menu .card .card-content a {
	display: block;
	box-sizing: border-box;
	padding: 8px 10px;
	border-bottom: 1px solid #e4e1e1;
	color: #444;
}
.container.content .menu .card .card-content a:hover {
	padding-left: 20px; background: #F9F9F9; transition: 0.1s;
}
/* Actions div (at the middle) */
.container.content .action { width: 35%; float: left; text-align: center; }
.container.content .action form { width: 90%; }
.container.content .action .page-title { margin: 25px; }
.container.content .action.create-post-div { width: 80%; }
/* Table div (Displaying records from DB) */
.table-div { float: left; width: 47%; }
.table-div .message { width: 90%; margin-top: 20px; }
.table-div table { width: 90%; }
.table-div a.fa { color: white; padding: 3px; }
.table-div .edit { background: #004220; }
.table-div .delete { background: #F70E1A; }
.table-div .publish { background: red; }
.table-div .unpublish { background: green; }
/* * * * * * * * * *
* VALIDATION ERRORS
* * * * * * * * * */
.message {
	width: 100%; 
	margin: 0px auto; 
	padding: 10px 0px; 
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	border-radius: 5px; 
	text-align: center;
}
.error {color: #a94442; background: #f2dede; border: 1px solid #a94442; margin-bottom: 20px; }
.validation_errors p {text-align: left;margin-left: 10px;}

</style>
