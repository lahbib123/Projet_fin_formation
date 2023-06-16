<?php
require_once 'connect.php';

$req = 'SELECT * FROM product_categories';

$query = mysqli_query($connect, $req);

if (mysqli_num_rows($query)) {
    while ($categories = mysqli_fetch_assoc($query)) {
?>
        <article onclick="window.open('<?php echo "pages/showProducts.php?category=" . $categories['categoryName'] ?>','_self')">
            <div class="img-product">
                <img src="<?php echo "data:image;base64," . $categories['categoriesPicture'] ?>" alt="<?php echo $categories['categoryName'] ?>">
            </div>
                <h3><?php echo $categories['categoryName'] ?></h3>

        </article>
<?php
    }
} else {
    echo '<h1><center>There are currently no categories</center></h1>';
}

?>