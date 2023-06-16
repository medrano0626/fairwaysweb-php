<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type = "images/x-icon" href="static/images/logo.png">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background: url('static/images/bg.jpeg');
  background-repeat: no-repeat;
  background-size:100% 100vh;
}

.navbar {
  overflow: hidden;
  background-color: #333; 
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white; 
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.subnav {
  float: left;
  overflow: hidden;
}

.subnav .subnavbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: #6c6e74;
}

.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: #6c6e74;
  width: 100%;
  z-index: 1;
}

.subnav-content a {
  float: left;
  /* color: white; */
  text-decoration: none;
}

.subnav-content a:hover {
  background-color: #eee;
  color: black;
}

.subnav:hover .subnav-content {
  display: block;
}
</style>
</head>
