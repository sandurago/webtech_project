<?php
include('header.php');

include('Controllers/ProductAPIController.php');
$products = new Products;
$allProducts = $products->getProducts();
$sortedProducts = $products->getProductsDescendingCount();

?>

<section class="relative">
  <p class="pb-10 text-center exo-300 font-bold text-xl tracking-wider">Najlepiej sprzedawane produkty</p>
  <div class="mx-auto max-w-[1000px] grid lg:grid-cols-3 gap-10">
  <?php foreach (array_slice($sortedProducts, 0, 3) as $product): ?>
    <div class="flex flex-col gap-10 justify-start items-center">
      <img src="<?php echo $product->image ?>" alt="" class="h-[200px] w-fit">
      <p class="font-bold text-center"><?php echo $product->title ?></p>
      <p><?php echo $product->price ?> PLN</p>
      <p>Kupione: <?php echo $product->rating->count ?> razy</p>
      <!-- przycisk dostosowany do malych ekranow -->
      <a
        href="/productdetails.php?id=<?php echo $product->id ?>"
        class="lg:hidden mt-auto bottom-0 px-4 py-2 bg-orange text-black font-medium border border-solid border-purple rounded-md hover:bg-coral hover:text-lightpurple hover:shadow-md hover:shadow-lavender transition ease-in-out duration-100"
      >
        Zobacz szczegóły
      </a>
      <!-- przycisk dostosowany do duzych ekranow -->
      <button
        onclick="openPopup(<?php echo htmlspecialchars(json_encode($product)) ?>)"
        class="hidden lg:block mt-auto bottom-0 px-4 py-2 bg-orange text-black font-medium border border-solid border-purple rounded-md hover:bg-coral hover:text-lightpurple hover:shadow-md hover:shadow-lavender transition ease-in-out duration-100"
      >
        Zobacz szczegóły
      </button>
    </div>
    <?php endforeach; ?>
    </div>
    <div id="popup-container"></div>
  </section>

  <?php
  include('footer.php');
  ?>

  <script>
  function closePopup() {
    const container = document.querySelector('#popup-container');
    container.classList.add('hidden');
  }
  function openPopup(product) {
    const container = document.querySelector('#popup-container');
    container.classList.remove('hidden');
    const template = `
      <section class="absolute top-0 left-1/4 w-1/2 p-4 bg-gray-100 rounded-lg flex flex-col gap-2 justify-center items-center">
        <img src="${product.image}" alt="" class="h-[200px] w-fit">
        <p class="text-xl">${product.title}</p>
        <p class="font-bold">${product.price} PLN</p>
        <p class="italic">${product.description}</p>
        <p>${product.category}</p>
        <p class="italic font-bold">${product.rating.rate}</p>
        <div class="w-full flex justify-around">
            <a href="/addtocart.php" class="py-2 px-4 font-medium bg-lavender rounded-md hover:bg-lightpurple hover:text-lavender">Dodaj do koszyka</a>
            <button onclick="closePopup()" class="py-2 px-4 font-medium bg-lavender rounded-md hover:bg-lightpurple hover:text-lavender">Zamknij</button>
        </div>
      </section>
    `;
    container.innerHTML = template;
  }
  </script>
