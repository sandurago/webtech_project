<?php
include('header.php');
include('Controllers/Product.php');
include('Controllers/Database.php');

// Usuwanie z koszyka
if (isset($_POST['id'])) {
  $db = new Database;
  $pdo = $db->getPDO();

  $chosen_product = new Product($_POST['id']);
  $chosen_product->delete($pdo);
}
?>

<div class="flex flex-col gap-10 items-center">
  <p class="text-2xl text-purple font-bold text-center">
    <?php echo $chosen_product->response ?>
  </p>
  <a href="/cart.php" class="px-4 py-2 bg-orange text-black font-medium border border-solid border-purple rounded-md hover:bg-coral hover:text-lightpurple hover:shadow-md hover:shadow-lavender transition ease-in-out duration-100">Powrót do koszyka</a>
</div>

<?php
include('footer.php');
?>
