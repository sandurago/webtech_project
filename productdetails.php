<?php
include('header.php');
include('Controllers/ProductAPIController.php');
include('Controllers/Product.php');
include('Controllers/Database.php');

$id = $_GET['id'];

$products = new Products;
$product = $products->getProductById($id);

// Jesli zostal nacisniety przycisk dodaj do koszyka, zapisz produkt do bazy danych
if ($_SERVER['POST']) {
  $db = new Database;
  $pdo = $db->getPDO();

  $chosen_product = new Product($product->id, $product->title, $product->price, $product->description, $product->category, $product->image, $product->rating->rate, $product->rating->count);
  $save_chosen_product = $chosen_product->save($pdo);
}
?>

<div class="max-w-96 mx-auto pb-20 flex flex-col gap-4 justify-start items-center">
  <img src="<?php echo $product->image ?>" alt="" class="h-[200px] w-fit">
  <p class="text-xl"><?php echo $product->title ?></p>
  <p class="font-bold"><?php echo $product->price ?> PLN</p>
  <p class="italic"><?php echo $product->description ?></p>
  <p><?php echo $product->category ?></p>
  <p class="italic font-bold">Ocena: <?php echo $product->rating->rate ?></p>
  <div class="w-full flex justify-around">
    <form method="POST" action="/addtocart.php">
      <input type="hidden" name="id" value="<?php echo $product->id ?>">
      <button type="submit" class="py-2 px-4 font-medium bg-lavender rounded-md hover:bg-lightpurple hover:text-lavender">Dodaj do koszyka</button>
    </form>
    <a
      href="/products.php"
      class="py-2 px-4 font-medium bg-lavender rounded-md hover:bg-lightpurple hover:text-lavender"
    >
      Lista produktów
    </a>
  </div>
</div>

<?php
include('footer.php');
?>
