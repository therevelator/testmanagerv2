<?php
include_once("class.dbconnect.php");
$connection = new dbConnect();
/**
 * This class loads the table template and the add new template
 */
class table
{
  function rendertable()
  {
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
          <button class="btndelete" name="Delete" id="'; echo $row['ID']; echo '">Delete</button>
          <input type="hidden" name="Deletehidden" value="'; echo $row['ID']; echo '">
          <button class="btndetails" name="Details" id="'; echo $row['ID']; echo '">Details</button>
          <input type="hidden" name="Detailshidden" value="'; echo $row['ID']; echo '">
          </td>
          </form>
  			</tr>';
      }

    echo '
		</tbody>
	</table>';
  }

  function addproject () {
        echo '<tr>
        <form method="post" action="'; echo htmlspecialchars($_SERVER["PHP_SELF"]); echo '">
          <td>ID</td>
          <td><input type="text"  name="ProjectName" style="height: 40px; text-align: center; color: aliceblue;"></td>
          <td>'; echo $_SESSION['username']; echo'</td>
          <td><input type="text" name="Description" style="height: 40px; text-align: center; color: aliceblue;"></td>
            <td>
              <input type="submit"  class="btndelete" name="Add" >Add</input>
              <input class="btndetails" name="Done" >Done</input>
            </td>
          </form>
        </tr>';
  }
}
?>
