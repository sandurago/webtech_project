<?php
  include('header.php');
  include('Controllers/Database.php');

  // Zapytanie o produkty w koszyku
  $db = new Database;
  $pdo = $db->getPDO();
  $stmt = $pdo->query('SELECT * FROM product');
?>

<?php echo $sum['sum'] ?>

<div class="grid grid-cols-5 gap-10 font-bold pb-10">
  <p></p>
  <p>Nazwa</p>
  <p>Cena</p>
  <p>Ocena</p>
  <p></p>
</div>
<div class="flex flex-col">
  <div class="pb-20 grid grid-cols-5 lg:gap-10 text-sm lg:text-base justify-around items-center">
    <?php foreach($stmt as $row): ?>
      <img src="<?php echo $row['image'] ?>" alt="" class="lg:h-[200px] h-[50px] w-fit"/>
      <p><?php echo $row['title'] ?></p>
      <p><?php echo $row['price'] ?> PLN</p>
      <p><?php echo $row['rate'] ?></p>
      <form method="POST" action="deletefromcart.php" class="hidden lg:block">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <button type="submit" class="px-4 py-2 bg-orange text-black font-medium border border-solid border-purple rounded-md hover:bg-coral hover:text-lightpurple hover:shadow-md hover:shadow-lavender transition ease-in-out duration-100">Usuń z koszyka</button>
      </form>
      <form method="POST" action="deletefromcart.php" class="w-full lg:hidden">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <button type="submit" class="px-4 py-2 bg-orange text-black font-medium border border-solid border-purple rounded-md hover:bg-coral hover:text-lightpurple hover:shadow-md hover:shadow-lavender transition ease-in-out duration-100">Usuń z koszyka</button>
      </form>
    <?php endforeach ?>
  </div>
</div>

<?php
include('footer.php');
?>
