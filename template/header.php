<!DOCTYPE html>

<html lang="en">
<head>
  <title>
    Grade Tracker
  </title>

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Grade Tracker">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="./javascript/jquery-2.0.2.js"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="manifest" href="/grade_tracker/manifest.json">

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|PT+Sans" rel="stylesheet">

<script type="text/javascript">
     (function(document,navigator,standalone) {
         // prevents links from apps from oppening in mobile safari
         // this javascript must be the first script in your <head>
         if ((standalone in navigator) && navigator[standalone]) {
             var curnode, location=document.location, stop=/^(a|html)$/i;
             document.addEventListener('click', function(e) {
                 curnode=e.target;
                 while (!(stop).test(curnode.nodeName)) {
                     curnode=curnode.parentNode;
                 }
                 // Condidions to do this only on links to your own app
                 // if you want all links, use if('href' in curnode) instead.
                 if('href' in curnode && ( curnode.href.indexOf('http') || ~curnode.href.indexOf(location.host) ) ) {
                     e.preventDefault();
                     location.href = curnode.href;
                 }
             },false);
         }
     })(document,window.navigator,'standalone');
 </script>


</head>
<body>
