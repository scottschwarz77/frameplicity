<?php

class HeaderWidget {

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

  public function init() {
    emit('<!DOCTYPE html>');
    emit('<html lang="en">');
    emit('<head>');
    emit('<meta charset="utf-8">');
    emit('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
    emit('<meta name="description" content="">');
    emit('<meta name="author" content="">');
    emit('<title>Activity 2</title>');
    emit('</head>');
    emit('<body>');
  }

  public function menu() {
    emit('<div class = "container">');
    emit('<div class = "row">');
    emit('<div class = "twelve columns"><center><h4>Site Header</h4></center>');
    emit('</div>');
    emit('</div>');
  }

  public static function linkToCSS() {
    emit('<link href="'.URLParser::getBaseURL().'/_Global/_Vendor/Skeleton/css/normalize.css" rel="stylesheet">');
    emit('<link href="'.URLParser::getBaseURL().'/_Global/_Vendor/Skeleton/css/skeleton.css" rel="stylesheet">');
  }

  public function render() {
    $this->init();
    $this->linkToCSS();
    $this->menu();
  }
  
}

?>
  
        
      