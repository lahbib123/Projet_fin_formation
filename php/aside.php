<?php
require_once 'connect.php';

$req = 'SELECT * FROM product_categories';

$query = mysqli_query($connect, $req);
while ($categories = mysqli_fetch_assoc($query)) {
?>
    <div class="article" onclick="window.open('<?php echo "showProducts.php?category=" . $categories['categoryName'] ?>','_self')">
        <div class="img-product">
            <img src="<?php echo "data:image;base64," . $categories['categoriesPicture'] ?>" alt="<?php echo $categories['categoryName'] ?>">
        </div>

        <h3><?php echo $categories['categoryName'] ?></h3>


    </div>
<?php
}
?>