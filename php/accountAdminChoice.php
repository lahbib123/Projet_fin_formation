<?php
if ($_GET['accChoice'] == 'MyAccount') {
?>
    <br>
    <table class="information">
        <tr>
            <th><i class="fa fa-user"></i> Full Name</th>
            <td><?php echo $_SESSION['fullName'] ?></td>
        </tr>
        <tr>
            <th><i class="fa fa-envelope"></i> Email</th>
            <td><?php echo $_SESSION['email'] ?></td>
        </tr>
        <tr>
            <th><i class="fa fa-phone"></i> Phone</th>
            <td><?php echo $_SESSION['phone'] ?></td>
        </tr>
        <tr>
            <th><i class="fa-solid fa-calendar-days"></i> DOB</th>
            <td><?php echo $_SESSION['DOB'] ?></td>
        </tr>
        <tr>
            <th><i class="fa-solid fa-genderless"></i> Gender</th>
            <td><?php echo $_SESSION['gender'] ?></td>
        </tr>
        <tr>
            <th><i class="fa fa-map-marker"></i> City</th>
            <td><?php echo $_SESSION['city'] ?></td>
        </tr>
        <tr>
            <th><i class="fa fa-address-card"></i> Address</th>
            <td><?php echo $_SESSION['address'] ?></td>
        </tr>
        <tr>
            <td style="border-bottom: 2px solid transparent;">
                <br>
            </td>
        </tr>
        <tr>
            <th colspan="2" id="up" style="border-bottom: 2px solid transparent;"><a href="../php/updateInformationAdmin.php">Update</a></th>
        </tr>
    </table>
    <br>
<?php } elseif ($_GET['accChoice'] == 'DelateUserAccount') {
?>
    <br>
    <table class="sttable">
        <form action="../php/delUserAccountWithAdmin.php" method="POST" autocomplete="off">
            <tr>
                <th><label for="email">User Email : </label></th>
                <td><input type="email" class="inpt" style="width: 400px;" id="email" name="email"></td>
            </tr>
            <tr>
                <th colspan="2">
                    <br>
                    <input type="submit" class="sb" value="Delate User Account">
                </th>
            </tr>
        </form>
    </table>
    <br>
<?php } elseif ($_GET['accChoice'] == 'ChangePassword') {
?>
    <br>
    <table class="sttable">
        <form action="../php/changePasswordAdmin.php" method="POST" autocomplete="off">
            <tr>
                <th><label for="current">Current : </label></th>
                <td><input type="password" class="inpt" style="width: 400px;" name="CurrentPassword" id="CurrentPassword" ><input type="button" id="show1" value="show"></td>
            </tr>
            <tr>
                <th><label for="new">New : </label></th>
                <td><input type="password" class="inpt" style="width: 400px;" name="newPassword" id="newPassword" ><input type="button" id="show2" value="show"></td>
            </tr>
            <tr>
                <th><label for="retypeNew">Retype New : </label></th>
                <td><input type="password" class="inpt" style="width: 400px;" name="retypeNewPassword" id="retypeNewPassword" ></td>
            </tr>
            <tr>
                <th colspan="3">
                    <br>
                    <input style="width: 100%;font-size: x-large;padding: 10px 0px;" type="submit" class="sb" value="Save Change">
                </th>
            </tr>
        </form>
    </table>
    <br>
<?php } elseif ($_GET['accChoice'] == 'AddCategorie') {
?><br>
    <table class="sttable">
        <form action="../php/addCategory.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <tr>
                <th>
                    <label for="categoryName">Category Name : </label>
                </th>
                <td>
                    <input type="text" class="inpt" style="width: 400px;" id="categoryName" name="categoryName" value="<?php echo $_REQUEST['categoryName'] ?? '' ?>">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="categoriesPicture">Categorie Picture : </label>
                </th>
                <td>
                    <input type="file" style="padding: .6em;font-size: larger;background-color: #f9f9f9;width: 400px;" id="categoriesPicture" name="categoriesPicture">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <input type="submit" class="sb" value="Add Category">
                </td>
            </tr>
        </form>
    </table>
    <br>
<?php } elseif ($_GET['accChoice'] == 'ShowFeedback') {

    require_once '../php/connect.php';
    $req = "SELECT * FROM feedback";
    $query = mysqli_query($connect, $req);
    echo '<table id="tbl">';
    echo '<tr><th style="width:5%">ID</th>';
    echo '<th style="width:20%">Title</th>';
    echo '<th style="width:20%">Owner</th>';
    echo '<th style="width:45%">Feedback</th>';
    echo '<th style="width:10%">Remove</th><tr>';
    if (mysqli_num_rows($query)) {
        $id = 0;
        while ($feedbaack = mysqli_fetch_assoc($query)) {

            echo '<tr>';
            echo '<td>' . ++$id . '</td>';
            echo '<td>' . $feedbaack['feedbackTitle'] . '</td>';
            echo '<td>' . $feedbaack['feedbackOwnerName'] . '</td>';
            echo '<td><pre>' . $feedbaack['feedbackBody'] . '</pre></td>';
            echo '<td> <a href="../php/delFeedback.php?feedbackID=' . $feedbaack['feedbackID'] . '">Remove</a> </td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="5"><center><b>There are no feedback at the moment</b></center></td></tr>';
    }
    echo '</table>';
?>


<?php } elseif ($_GET['accChoice'] == 'DelateMyAccount') {
?>
    <br>
    <table class="sttable">
        <h4 class="h4">Please confirm your account</h4>
        <br>
        <form action="../php/delAccountAdmin.php" method="POST" autocomplete="off">
            <tr>
                <th><label for="email">Email : </label></th>
                <td><input type="email" id="email" class="inpt" style="cursor: not-allowed;width: 450px;" value="<?php echo $_SESSION['email'] ?>" disabled></td>
            </tr>
            <tr>
                <th><label for="password">Password : </label></th>
                <td><input type="password" class="inpt" id="password" style="width: 450px;" name="password"></td>
            </tr>
            <tr>
                <th colspan="2">
                    <br>
                    <input type="submit" class="sb" value="Delate My Account">
                </th>
            </tr>
        </form>
    </table>
    <br>
<?php }
?>