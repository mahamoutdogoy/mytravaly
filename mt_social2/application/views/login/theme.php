<!DOCTYPE html>

<html>

<head>

	<title><?php echo $page_title;?></title>

	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png"> 
	<meta name="description" content="<?php echo $meta_description;?>">

	<meta name="keywords" content="<?php echo $meta_keyword;?>">

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<!-- Bootstrap 3.3.4 -->
	<link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url()."assets/css/font-awesome.css" ?>" rel="stylesheet" type="text/css" />

</head>

<body>

	<?php $this->load->view($body); ?>


</body>

</html>

<style type="text/css">
	html {
	width: 100%;
	height: 100%;
}

body {
	/*width: 100%;*/
	/*height: 100%;*/
	/*background: url('<?php echo base_url();?>assets/login/img/bg1.png') 0 0 no-repeat #2A4376;*/
	/*background-size: 100% 100%;*/
	background: #ddd;
}

.full {
	width: 100%;
	float: left;
	margin: 0;
	padding: 0;
}

a {
	color: #fff;
	text-decoration: none;
}

a:hover {
	color: #fff;
	text-decoration: none;
}

.padding-0 {
	padding: 0;
}

#form-container {
	background: #1c2b4a;
	margin-top: 30px;
	padding: 0;
	color: #fff;
	font-size: 14px;
}

#form-header {

}

#form-header h3 {
	text-align: center;
	padding: 10px 0;
	background: #17233b;
	margin: 0;
	color: #fff;
}	

#form-body {
	padding: 20px 15px;
}

.form-group {
	margin-bottom: 20px;
	position: relative;
}

.form-group i {
	position: absolute;
	top: 14px;
	left: 12px;
	color: #00cc66;
}	

.form-control {
	background: #fff;
	color: #555;
	padding: 13px 13px 13px 37px;
	height: 45px;
	border-width: 0px;
	border-radius: 3px;
}

.btn.btn-submit {
	background: orange;
	color: #fff;
	border-width: 0px;
	border-bottom: 2px solid #fff;
	border-radius: 3px;
	height: 45px;
	font-weight: bold;
	font-size: 17px;
}
/* 
.forget {
	float: right;
} */

#form-footer {
	background: #FFF;
	padding: 10px;
	color: #000;
}	

.para-bottom {
	margin: 9px 0 0 0;
	padding: 0;
}

.btn-signup {
	float: right;
	background: #009966;
	border-width: 0px;
	border-bottom: 2px solid #006633;
	color: #fff;
	font-weight: bold;
} 

.btn-signup:hover {
	background: #008653;
	border-bottom: 2px solid #006633;
	color: #fff;
}	

.error {
	color: #ee5f15;
}
</style>