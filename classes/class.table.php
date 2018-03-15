<?php
include_once("class.dbconnect.php");
$connection = new dbConnect();
/**
 * This class loads the table template
 */
class table
{

  function __construct()
  {
    echo '<div class="container">
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Created By</th>
				<th>Description</th>
        <th>Actions</th>
			</tr>
		</thead>
		<tbody>';
    $link = mysqli_connect("127.0.0.1", "root", "", "testmanager");
    $sql="SELECT ID, ProjectName, CreatedBy, Description FROM projects ORDER BY ID";
    $result=mysqli_query($link,$sql);
      while ($row = mysqli_fetch_assoc($result)) {
      $ID = $row['ID'];
        echo '<tr>
  				<td>'; echo $row['ID']; echo '</td>
  				<td>'; echo $row['ProjectName']; echo '</td>
  				<td>'; echo $row['CreatedBy']; echo '</td>
          <td>'; echo $row['Description']; echo '</td>
  				<td><button class="btndelete">Delete</button>
          <button class="btndetails">Details</button></td>
  			</tr>';
      }
    echo '
		</tbody>
	</table>
</div>';
  }
}





 ?>
