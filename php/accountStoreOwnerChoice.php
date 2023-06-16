<?php if ($_GET['accChoice'] == 'DelateUserAccount') {
?>
    <br>
    <table class="sttable">
        <form action="../php/delUserAccountWithAdmin.php" method="POST" autocomplete="off">
            <tr>
                <th><label for="email">User Email : </label></th>
                <td><input type="email" id="email" class="inpt" style="width: 450px" name="email"></td>
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
<?php } elseif ($_GET['accChoice'] == 'DelateAdminAccount') {
?>
    <br>
    <table class="sttable">
        <form action="../php/delAdminAccount.php" method="POST" autocomplete="off">
            <tr>
                <th><label for="email">Admin Email : </label></th>
                <td><input type="email" class="inpt" style="width: 450px;" id="email" name="email"></td>
            </tr>
            <tr>
                <th colspan="2">
                    <br>
                    <input type="submit" class="sb" value="Delate Admin Account">
                </th>
            </tr>
        </form>
    </table>
    <br>
<?php } elseif ($_GET['accChoice'] == 'AddCategorie') {
?>
    <br>
    <table class="sttable">
        <form action="../php/addCategory.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <tr>
                <th>
                    <label for="categoryName">Category Name : </label>
                </th>
                <td>
                    <input type="text" id="categoryName" class="inpt" name="categoryName" style="width: 400px;" value="<?php echo $_REQUEST['categoryName'] ?? '' ?>" >
                </td>
            </tr>
            <tr>
                <th>
                    <label for="categoriesPicture">Categorie Picture : </label>
                </th>
                <td>
                    <input type="file" id="categoriesPicture" style="width: 400px;" name="categoriesPicture">
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
    echo '<table id="tbl" style="overflow:auto">';
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
            echo '<td> <b>' . $feedbaack['feedbackOwnerName'] . '</b> </td>';
            echo '<td><pre>' . $feedbaack['feedbackBody'] . '</pre></td>';
            echo '<td> <a href="../php/delFeedback.php?feedbackID=' . $feedbaack['feedbackID'] . '">Delete</a> </td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="5"><center><b>There are no feedback at the moment</b></center></td></tr>';
    }
    echo '</table>';

?>

<?php } elseif ($_GET['accChoice'] == 'AddAdmin') {
?><br>
    <br>
    <div class="container">
        <form action="../php/addAdmin.php" method="POST" autocomplete="off">
            <div class="row">
                <h4>Account</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Full Name" name="fullName" <?php if ($retry) {
                                                                                    echo "value='" . $_GET['fullName'] . "'";
                                                                                };
                                                                                if ($error == 'fullName') {
                                                                                    echo "style='color: red; border: red solid 1px'";
                                                                                } ?> />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Email Adress" name="email" <?php if ($retry) {
                                                                                    echo "value='" . $_GET['email'] . "'";
                                                                                };
                                                                                if ($error == 'email') {
                                                                                    echo "style='color: red; border: red solid 1px'";
                                                                                } ?> />
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Password" name="password" <?php if ($retry) {
                                                                                    echo "value='" . $_GET['password'] . "'";
                                                                                };
                                                                                if ($error == 'password') {
                                                                                    echo "style='color: red; border: red solid 1px'";
                                                                                } ?> />
                    <div class="input-icon"><i class="fa fa-key"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Phone number" name="phone" <?php if ($retry) {
                                                                                    echo "value='" . $_GET['phone'] . "'";
                                                                                };
                                                                                if ($error == 'phone') {
                                                                                    echo "style='color: red; border: red solid 1px'";
                                                                                } ?> />
                    <div class="input-icon"><i class="fa fa-phone"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="City" name="city" <?php if ($retry) {
                                                                            echo "value='" . $_GET['city'] . "'";
                                                                        };
                                                                        if ($error == 'city') {
                                                                            echo "style='color: red; border: red solid 1px'";
                                                                        } ?> />
                    <div class="input-icon"><i class="fa fa-map-marker"></i></div>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Address" name="address" <?php if ($retry) {
                                                                                echo "value='" . $_GET['address'] . "'";
                                                                            };
                                                                            if ($error == 'address') {
                                                                                echo "style='color: red; border: red solid 1px'";
                                                                            } ?> />
                    <div class="input-icon"><i class="fa fa-address-card"></i></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-half">
                    <h4>Date of Birth</h4>
                    <div class="input-group">
                        <div class="col-third">
                            <input type="text" placeholder="DD" name="day" <?php if ($retry) {
                                                                                echo "value='" . $_GET['day'] . "'";
                                                                            };
                                                                            if ($error == 'day') {
                                                                                echo "style='color: red; border: red solid 1px'";
                                                                            } ?> />
                        </div>
                        <div class="col-third">
                            <input type="text" placeholder="MM" name="month" <?php if ($retry) {
                                                                                    echo "value='" . $_GET['month'] . "'";
                                                                                };
                                                                                if ($error == 'month') {
                                                                                    echo "style='color: red; border: red solid 1px'";
                                                                                } ?> />
                        </div>
                        <div class="col-third">
                            <input type="text" placeholder="YYYY" name="year" <?php if ($retry) {
                                                                                    echo "value='" . $_GET['year'] . "'";
                                                                                };
                                                                                if ($error == 'year') {
                                                                                    echo "style='color: red; border: red solid 1px'";
                                                                                } ?> />
                        </div>
                    </div>
                </div>
                <div class="col-half">
                    <h4>Gender</h4>
                    <div class="input-group" <?php if ($retry) {
                                                    if ($error == 'gender') {
                                                        echo "style='color: red; border: red solid 1px'";
                                                    }
                                                } ?>>
                        <input id="gender-male" type="radio" name="gender" value="male" <?php if ($retry && $_GET['gender'] == 'male') {
                                                                                            echo 'checked';
                                                                                        } ?> />
                        <label for="gender-male">Male</label>
                        <input id="gender-female" type="radio" name="gender" value="female" <?php if ($retry && $_GET['gender'] == 'female') {
                                                                                                echo 'checked';
                                                                                            } ?> />
                        <label for="gender-female">Female</label>
                    </div>
                </div>
            </div>
            <input type="submit" value="Add Admin" class="submit">
            <br><br>
        </form>
    </div>
    <br>
    <br>
<?php } elseif ($_GET['accChoice'] == 'DelateMyAccount') {
?>
    <table class="DelateMyAccount">
        <h4 class="h4">Please confirm your account</h4>
        <form action="../php/delAccountAdmin.php" method="POST" autocomplete="off">
            <tr>
                <th><label for="email">Email : </label></th>
                <td><input type="email" id="email" value="<?php echo $_SESSION['email'] ?>" disabled></td>
            </tr>
            <tr>
                <th><label for="password">Password : </label></th>
                <td><input type="password" id="password" name="password"></td>
            </tr>
            <tr>
                <th>
                    <input type="submit" value="Delate My Account">
                </th>
            </tr>
        </form>
    </table>
<?php
} elseif ($_GET['accChoice'] == 'ShowAllAdminsAccounts') {
    require_once "../php/showAllAdmins.php";
} elseif ($_GET['accChoice'] == 'ShowAllUsersAccounts') {
    require_once "../php/showAllUsers.php";
}
?>