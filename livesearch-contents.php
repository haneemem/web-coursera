<?php
$str = file_get_contents('courses.json');
$json = json_decode($str, true);

//get the q parameter from URL
$q = $_GET["q"];
$course_name = $_GET["c_name"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  
  foreach ($json[$course_name]['resources'] as $x){
    //echo $x['Link'];
    $y = $x['Title'];
    $z = $x['Link'];
    if (stristr($y, $q)) {
        if ($hint=="") {
          $hint="<a style = 'color: #005691; font-weight : 600;' href='" . 
          $z . "' target='_blank'>" . $y . "</a>";
        } else {
          $hint=$hint . "<br /><a style = 'color: #005691; font-weight : 600;' href='" . 
          $z . "' target='_blank'>" . $y . "</a>";
        }
    }
  }
  foreach ($json[$course_name]['shortVideos'] as $x){
    //echo $x['Link'];
    $y = $x['Title'];
    $z = $x['Link'];
    if (stristr($y, $q)) {
        if ($hint=="") {
          $hint="<a style = 'color: #005691; font-weight : 600;' href='" . 
          $z . "' target='_blank'>" . $y . "</a>";
        } else {
          $hint=$hint . "<br /><a style = 'color: #005691; font-weight : 600;' href='" . 
          $z . "' target='_blank'>" . $y . "</a>";
        }
    }
  }
  foreach ($json[$course_name]['mediumVideos'] as $x){
    //echo $x['Link'];
    $y = $x['Title'];
    $z = $x['Link'];
    if (stristr($y, $q)) {
        if ($hint=="") {
          $hint="<a style = 'color: #005691; font-weight : 600;' href='" . 
          $z . "' target='_blank'>" . $y . "</a>";
        } else {
          $hint=$hint . "<br /><a style = 'color: #005691; font-weight : 600;' href='" . 
          $z . "' target='_blank'>" . $y . "</a>";
        }
    }
  }
  foreach ($json[$course_name]['longVideos'] as $x){
    //echo $x['Link'];
    $y = $x['Title'];
    $z = $x['Link'];
    if (stristr($y, $q)) {
        if ($hint=="") {
          $hint="<a style = 'color: #005691; font-weight : 600;' href='" . 
          $z . "' target='_blank'>" . $y . "</a>";
        } else {
          $hint=$hint . "<br /><a style = 'color: #005691; font-weight : 600;' href='" . 
          $z . "' target='_blank'>" . $y . "</a>";
        }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>