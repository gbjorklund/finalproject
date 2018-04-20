<?php

if(isset($_POST['page_name'])){
  getPageData($_POST['page_name']);
}

function connectToDB(){
  $mysqlLink = new mysqli('localhost', 'root', 'root', 'Test_DB');

  if(mysqli_connect_errno()){
    exit();
  }

  return $mysqlLink;
}

function getPageData($pageName){

  $mysqlLink = connectToDB();

  $query = $mysqlLink->query("SELECT * FROM page_data WHERE page_name = '$pageName'");

  $title = "";
  $desc = "";

  if($row = $query->fetch_object()){
    $title = $row->page_title;
    $desc = $row->page_desc;
  }

  $html = '<h1>' . $title . '</h1>';
  $html .= '<p>' . $desc . '</p>';

  echo $html;
}

?>
