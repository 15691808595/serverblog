<?php
$link = @mysql_connect("localhost","root","");
mysql_select_db("blog");
mysql_query("set names utf8");