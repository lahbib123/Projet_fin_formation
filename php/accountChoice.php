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
            <th colspan="2" id="up" style="border-bottom: 2px solid transparent;"><a href="../php/updateInformation.php" >Update</a></th>
        </tr>
    </table>
<br>
<?php } elseif ($_GET['accChoice'] == 'ChangePassword') {
?>
    <br>
    <table class="sttable">
        <form action="../php/changePassword.php" method="POST" autocomplete="off">
            <tr>
                <th><label for="current">Current : </label></th>
                <td><input type="password" class="inpt" style="width: 400px;" name="CurrentPassword" id="CurrentPassword"  ><input type="button" id="show1" value="show"></td>
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
<?php } elseif ($_GET['accChoice'] == 'ShowComund') {
?>
    <?php require_once "../php/showMyOrders.php" ?>
<?php } elseif ($_GET['accChoice'] == 'ShowMyProducts') {
?>
    <?php require_once '../php/myProducts.php' ?>
<?php } elseif ($_GET['accChoice'] == 'AddProduct') {
?>
    <br>
    <table class="sttable">
        <form action="../php/addProduct.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <tr>
                <th><label for="nameProduct">Name Product</label></th>
                <td><input type="text" class="inpt" id="nameProduct" style="width: 400px;" name="nameProduct"></td>
            </tr>
            <tr>
                <th><label for="productType">Product Type</label></th>
                <td>
                    <?php require_once "availableCategories.php" ?>
                </td>
            </tr>
            <tr>
                <th><label for="priceProduct">Price Product</label></th>
                <td><input type="number" class="inpt" min="1" name="priceProduct" style="width: 400px;" id="priceProduct"></td>
            </tr>
            <tr>
                <th><label for="quantity">Quantity</label></th>
                <td><input type="number" class="inpt" name="quantity" style="width: 400px;" id="quantity" min="1"></td>
            </tr>
            <tr>
                <th><label for="productPicture">Product Picture</label></th>
                <td><input type="file" style="padding: .6em;font-size: larger;background-color: #f9f9f9;width: 400px;" name="productPicture" id="productPicture" accept="image/png, image/gif, image/jpeg"></td>
            </tr>
            <tr>
                <th><label for="productDescription">Product Description</label></th>
                <td><textarea name="productDescription" class="textarea" style="resize: none;width: 418px;" id="productDescription" rows="10"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><br><input type="submit" class="sb" value="Add product"></td>
            </tr>
        </form>
    </table>
    <br>
<?php } elseif ($_GET['accChoice'] == 'SendFeedback') {
?>
    <br>
    <table class="sttable">
        <form action="../php/sendFeedBack.php" method="POST" autocomplete="off">
            <tr>
                <th><label for="feedbackTitle">Title : </label></th>
                <td><input type="text" name="feedbackTitle" style="width: 650px;" class="inpt" value="<?php echo $_REQUEST['feedbackTitle'] ?? '' ?>" ></td>
            </tr>
            <tr>
                <th><label for="feedbackBody">Feedback : </label></th>
                <td><textarea class="textarea" type="password" name="feedbackBody" rows="10" style="resize: none;width: 670px;"  ><?php echo $_REQUEST['feedbackBody'] ?? '' ?></textarea>
            </tr>
            <tr>
                <th colspan="2"><br>
                    <input type="submit" class="sb" style="width: 100%;padding: 10px 0;font-size: x-large;" name="sendFeedbcak" value="Send Feedbcak">

                </th>
            </tr>
        </form>
    </table>
    <br>
<?php } elseif ($_GET['accChoice'] == 'DelateMyAccount') {
?>
    <table class="sttable">
        <br>
        <h4 class="h4">Please confirm your account</h4>
        <br>
        <form action="../php/delAccount.php" method="POST" autocomplete="off">
            <tr>
                <th><label for="email">Email : </label></th>
                <td><input type="email" class="inpt" id="email" style="width: 450px; cursor:not-allowed" value="<?php echo $_SESSION['email'] ?>" disabled></td>
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