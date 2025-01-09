<?php
class Products {
  public function getProducts() {
    $url = 'https://fakestoreapi.com/products';
    // Inicjalizuje sesje cURL
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $products = curl_exec($curl);
    curl_close($curl);
    return json_decode($products);
  }

  // Lista produktow w kolejnosci malejacej wedlug ilosci ocen
  public function getProductsDescendingCount() {
    $result = '';
    $ratings = [];
    $allProducts = $this->getProducts();
    if(!empty($allProducts) && is_array($allProducts) && isset($allProducts)) {
      foreach ($allProducts as $product) {
        $rate = $product->rating->count;
        $ratings[] = $rate;
      }
      array_multisort($ratings, SORT_DESC, $allProducts);
      $result = $allProducts;
    } else {
      $result = 'Brak dostępnych produktów.';
    }
    return $result;
  }

  // Pobranie danych o produkcie na podstawie id
  public function getProductById($id) {
    $url = 'https://fakestoreapi.com/products/' . $id;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $product = curl_exec($curl);
    curl_close($curl);
    return json_decode($product);
  }
}
