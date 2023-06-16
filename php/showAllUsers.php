<?php
require_once 'connect.php';

$req = 'SELECT * FROM users_accounts';
$query = mysqli_query($connect, $req);
if (mysqli_num_rows($query)) {
?><br>
    <h1>Currently the number of subscribers to the site is : <?php echo mysqli_num_rows($query) ?> Users.</h1>
    <br>
    <table class="center" id="tbl">
        <thead>
            <tr>
                <th>Nb</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>City</th>
                <th>Address</th>
                <th>DOR</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nb = 0;
            while ($acc = mysqli_fetch_assoc($query)) {
                echo "<tr><td>" . ++$nb . "</td>";
                echo "<td>" . $acc['fullName'] . "</td>";
                echo "<td>" . $acc['email'] . "</td>";
                echo "<td>" . $acc['phone'] . "</td>";
                echo "<td>" . $acc['DOB'] . "</td>";
                echo "<td>" . $acc['gender'] . "</td>";
                echo "<td>" . $acc['city'] . "</td>";
                echo "<td>" . $acc['address'] . "</td>";
                echo "<td>" . $acc['DOR'] . "</td>";
                echo "<td><a href='../php/removeUserAccountFromTable.php?id_email=" . $acc['ID'] .'_'.$acc['email']. "'>Remove</a></td></tr>";
            }
            ?>
        </tbody>
    </table>
<?php
} else {
    echo '<h1><center>There are no clients at the moment</center></h1>';
}
?>