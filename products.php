<?php
include('header.php');
include('Controllers/ProductAPIController.php');
$allProducts = new Products;
$productsList = $allProducts->getProducts();
?>

<div class="grid xl:grid-cols-3 gap-10 relative">
  <?php foreach($productsList as $product): ?>
  <div class="pt-20 lg:pt-0 lg:pb-20 flex flex-col gap-4 justify-start items-center">
    <img src="<?php echo $product->image ?>" alt=""  class="h-[300px] w-fit">
    <p class="font-bold text-center"><?php echo $product->title ?></p>
    <p><?php echo $product->price ?> PLN</p>
    <p><?php echo $product->rating->rate ?></p>
    <a
      href="/productdetails.php?id=<?php echo $product->id ?>"
      class="w-full lg:mt-auto px-4 py-2 bg-orange text-black text-center font-medium border border-solid border-purple rounded-md hover:bg-coral hover:text-lightpurple hover:shadow-md hover:shadow-lavender transition ease-in-out duration-100"
    >
      Zobacz szczegóły
    </a>
  </div>

  <?php endforeach; ?>
</div>

<?php
include('footer.php');
?>
