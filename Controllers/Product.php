<?php
class Product {
  private $id;
  private $title;
  private $price;
  private $description;
  private $category;
  private $image;
  private $rate;
  private $count;
  public $response;

  public function __construct($id, $title = '', $price = 0, $description = '', $category = '', $image = '', $rate = 0, $count = 0) {
    $this->id = $id;
    $this->title = $title;
    $this->price = $price;
    $this->description = $description;
    $this->category = $category;
    $this->image = $image;
    $this->rate = $rate;
    $this->count = $count;
  }

  public function save($pdo) {
    $query = $pdo->prepare('INSERT INTO `product` (`title`, `price`, `description`, `category`, `image`, `rate`, `count`) VALUES (:title, :price, :description, :category, :image, :rate, :count)');

    $query->bindValue(':title', $this->title);
    $query->bindValue(':price', $this->price);
    $query->bindValue(':description', $this->description);
    $query->bindValue(':category', $this->category);
    $query->bindValue(':image', $this->image);
    $query->bindValue(':rate', $this->rate);
    $query->bindValue(':count', $this->count);

    $flush = $query->execute();

    if ($flush > 0) {
      $this->response = 'Dodano produkt do koszyka.';
    } else {
      $this->response = 'Wystąpił błąd. Spróbuj ponownie.';
    }
  }

  public function delete($pdo) {
    $query = $pdo->prepare('DELETE FROM `product` WHERE id = :id');
    $query->bindValue(':id', $this->id);
    $flush = $query->execute();

    if($flush > 0) {
      $this->response = 'Usunięto produkt z koszyka.';
    } else {
      $this->response = 'Usunięcie produktu nie powiodło się. Spróbuj jeszcze raz.';
    }
  }
}

