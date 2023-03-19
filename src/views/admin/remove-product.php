<?php 

require __DIR__ . '../../../controllers/product-controller.php';

if(isset($_GET['id'])) {
    $product = new ProductController();
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $product->deleteProduct($id);
}

header('Location: /admin/products');

?>