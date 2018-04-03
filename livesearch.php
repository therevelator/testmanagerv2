
<?php


/** create XML file */
$mysqli = new mysqli("localhost", "root", "", "testmanager");

/* check connection */
if ($mysqli->connect_errno) {

   echo "Connect failed ".$mysqli->connect_error;

   exit();
}

$query = "SELECT ID, ProjectName FROM projects";

$projectsArray = array();

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {

       array_push($projectsArray, $row);
    }

    if(count($projectsArray)){

         createXMLfile($projectsArray);

     }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();

function createXMLfile($projectsArray){
//set file path
   $filePath = 'projects.xml';
//set file header
   $dom     = new DOMDocument('1.0', 'utf-8');
//create parent element
   $root      = $dom->createElement('pages');
//count results
   for($i=0; $i<count($projectsArray); $i++){
//get parameters from SQL query above and set variables
     $projectId        =  $projectsArray[$i]['ID'];

     $projectName      =  $projectsArray[$i]['ProjectName'];
//create node
     $project = $dom->createElement('link');
//create child #1
     $name     = $dom->createElement('title', $projectName);
//this appends to the .xml file
     $project->appendChild($name);
//create another child
      $name     = $dom->createElement('url', $projectId);
//appends to the .xml
    $project->appendChild($name);
//closes the node
     $root->appendChild($project);
   }
//adds a link element to the end of the file
   $dom->appendChild($root);
//saves the file
   $dom->save($filePath);

 }

//load the file
$xmlDoc=new DOMDocument();
$xmlDoc->load("projects.xml");
//gets all elements by the tag name
$x=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    $z=$x->item($i)->getElementsByTagName('url');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<a href='" .
          //below is the value of ProjectID
          $z->item(0)->childNodes->item(0)->nodeValue .
          "' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
//put a button here that has the ID

        } else {
          $hint=$hint . "<br /><a href='" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="&nbsp;&nbsp;&nbsp;No Suggestion&nbsp;&nbsp;&nbsp;";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>
