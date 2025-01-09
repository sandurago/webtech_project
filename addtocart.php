<?php
include('header.php');
include('Controllers/ProductAPIController.php');
include('Controllers/Product.php');
include('Controllers/Database.php');

if (isset($_POST['id'])) {
  $products = new Products;
  $product = $products->getProductById($_POST['id']);
  $db = new Database;
  $pdo = $db->getPDO();

  $chosen_product = new Product($product->id, $product->title, $product->price, $product->description, $product->category, $product->image, $product->rating->rate, $product->rating->count);
  $chosen_product->save($pdo);
}
?>

<div class="flex flex-col items-center gap-8">
  <p class="text-2xl text-purple font-bold text-center">
    <?php echo $chosen_product->response ?>
  </p>
  <div class="flex gap-8">
    <a
      href="/products.php"
      class="px-4 py-2 bg-orange text-black font-medium border border-solid border-purple rounded-md hover:bg-coral hover:text-lightpurple hover:shadow-md hover:shadow-lavender transition ease-in-out duration-100"
    >
      Lista produktów
    </a>
    <a
      href="/cart.php"
      class="px-4 py-2 bg-orange text-black font-medium border border-solid border-purple rounded-md hover:bg-coral hover:text-lightpurple hover:shadow-md hover:shadow-lavender transition ease-in-out duration-100"
    >
      Koszyk
    </a>
  </div>
</div>

<?php
include('footer.php');
?>
