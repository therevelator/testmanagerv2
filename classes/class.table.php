<?php
include_once("class.dbconnect.php");
$conn = new dbConnect();

/**
 * This class loads the table template and the add new template
 */
class table
{
  function rendertable()
  {
    @flush();

    $link = mysqli_connect("127.0.0.1", "root", "", "testmanager");
    $sql="SELECT ID, ProjectName, CreatedBy, Description FROM projects ORDER BY ID";
    $result=mysqli_query($link,$sql);
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
          <input type="submit" class="btnadd" name="Delete" value="Delete">
          <input type="hidden" name="DeleteID" value="'; echo $row['ID']; echo '">
          <input type="submit" class="btndone" name="Details" value="Details">
          <input type="hidden" name="DetailsID" value="'; echo $row['ID']; echo '">
          </td>
          </form>
  			</tr>';
      }

    echo '
		</tbody>
	</table>';
  }

  function rendertestcases()
  {
    $posted_details_id = $_SESSION['posted_details_id'];
    // var_dump($_SESSION);
    $link = mysqli_connect("127.0.0.1", "root", "", "testmanager");
    $sql="SELECT ID, Name, CreatedBy, ProjectID FROM testcase WHERE ProjectID = $posted_details_id";
    $result=mysqli_query($link,$sql);
    // if ($result->num_rows == 0) {
    //   echo "<script type=\"text/javascript\">swal(\"No testcases\", \"\", \"error\");</script>";
    // }
    // $numrows = $result->fetch_assoc();//this might be the issue with the missing first record
    // var_dump($numrows);
    // if (!empty($result)) {
    //   # code...
    // }

      while ($row = mysqli_fetch_assoc($result)){ //this brings results -1. we have to solve this immediately
      $ID = $row['ID'];
        echo '

            <tr>
      				<td>'; echo $row['ID']; echo '</td>
      				<td>'; echo $row['Name']; echo '</td>
      				<td>'; echo $row['CreatedBy']; echo '</td>
              <td>'; echo $row['ProjectID']; echo '</td>
              <form method="post">
      				<td>
              <input type="submit" class="btnadd" name="Delete" value="Delete">
              <input type="hidden" name="DeleteID" value="'; echo $row['ID']; echo '">
              <button type="submit" class="btndone" name="Details" value="Details">Details</button>
              <input type="hidden" id="DetailsID" name="DetailsID" value="'; echo $row['ID']; echo '">
              </td>
              </form>
      			</tr>';
      }

    echo '
		</tbody>
	</table>';

  // echo "<script type=\"text/javascript\">swal(\"No testcases\", \"\", \"error\");</script>";


}


  function addproject () {
        echo '<tr>
        <form method="POST" action="dashboard.php">
          <td>ID</td>
          <td><input type="text"  name="ProjectName" style="height: 40px; text-align: center; color: aliceblue;"></td>
          <td>'; echo $_SESSION['username']; echo'</td>
          <td><input type="text" name="Description" style="height: 40px; text-align: center; color: aliceblue;"></td>
            <td>
              <input type="submit"  class="btnadd" name="add" value="Add">
              <input type="submit" class="btndone" name="Done" value="Done">
            </td>
          </form>
        </tr>';



  }

  function addtestcase () {
        echo '<tr>
        <form method="POST" action="testcases.php">
          <td>ID</td>
          <td><input type="text"  name="ProjectName" style="height: 40px; text-align: center; color: aliceblue;"></td>
          <td>'; echo $_SESSION['username']; echo'</td>
          <td>'; echo $_SESSION['posted_details_id']; echo'</td>
            <td>
              <input type="submit"  class="btnadd" name="add" value="Add">
              <input type="submit" class="btndone" name="Done" value="Done">
            </td>
          </form>
        </tr>';

  }
}
?>
