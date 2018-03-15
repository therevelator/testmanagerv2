<?php
include_once("class.dbconnect.php");
$connection = new dbConnect();
/**
 * This class loads the table template
 */
class table
{

  function rendertable()
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
    // echo '<tr>
    //   <td></td>
    //   <td><input type="text" name="ProjectName" style="height: 25px;"></td>
    //   <td></td>
    //   <td><input type="text" name="Description" style="height: 25px;"></td>
    //   <form method="post">
    //   <td>
    //   <button class="btndelete" name="Delete" >Add</button>
    //   <button class="btndetails" name="Details" >Done</button>
    //   </td>
    //   </form>
    // </tr>';
      while ($row = mysqli_fetch_assoc($result)) {
      $ID = $row['ID'];
        echo '

        <tr>
  				<td>'; echo $row['ID']; echo '</td>
  				<td>'; echo $row['ProjectName']; echo '</td>
  				<td>'; echo $row['CreatedBy']; echo '</td>
          <td>'; echo $row['Description']; echo '</td>
          <form method="post">
  				<td>
          <button class="btndelete" name="Delete" id="'; echo $row['ID']; echo '">Delete</button>
          <input type="hidden" name="Deletehidden" value="'; echo $row['ID']; echo '">
          <button class="btndetails" name="Details" id="'; echo $row['ID']; echo '">Details</button>
          <input type="hidden" name="Detailshidden" value="'; echo $row['ID']; echo '">
          </td>
          </form>
  			</tr>';
      }
      // echo '<tr>
      //   <td></td>
      //   <td><input type="text" name="ProjectName"></td>
      //   <td></td>
      //   <td><input type="text" name="Description"></td>
      //   <form method="post">
      //   <td>
      //   <button class="btndelete" name="Delete" >Add</button>
      //   <button class="btndetails" name="Details" >Done</button>
      //   </td>
      //   </form>
      // </tr>'; FIND A WAY TO MAKE THIS WORK
    echo '
		</tbody>
	</table>
</div>';
  }

  function addproject () {
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

        echo '<tr>
          <td></td>
          <td><input type="text" name="ProjectName"></td>
          <td></td>
          <td><input type="text" name="Description"></td>
          <form method="post">
          <td>
          <button class="btndelete" name="Delete" >Add</button>
          <button class="btndetails" name="Details" >Done</button>
          </td>
          </form>
        </tr>';

    echo '
    </tbody>
  </table>
  </div>';
}

function __destruct() {

}
}





 ?>
