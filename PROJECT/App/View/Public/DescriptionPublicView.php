<div>
<head>
  <title>Descripción del producto</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      
    }
    h1 {
      font-size: 24px;
    }
    .product {
      display: flex;
      margin-top: 20px;
    }
    .product-image {
      flex: 0 0 200px;
      margin-right: 20px;
    }
    .product-image img {
      max-width: 100%;
      height: auto;
    }
    .product-details {
      flex: 1;
    }
    .product-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .product-price {
      font-size: 18px;
      color: #B12704;
      margin-bottom: 10px;
    }
    .product-description {
      margin-bottom: 10px;
    }
    .product-rating {
      margin-bottom: 10px;
    }
    .product-action {
      margin-top: 10px;
    }
    .product-action button {
      background-color: #f0c14b;
      border: none;
      color: #111;
      padding: 8px 16px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="product">
    <div class="product-image">
    <?php 
    echo '<img src="App/View/Public/Resources/ProductImage/' .$datos['Img_Product'].'" alt=""</img>';?>
    
  </div>
    <div class="product-details">
      <h1 class="product-title">Product Name</h1>
      <span class="product-price">$99.99</span>
      <p class="product-description"> a</p>
      <div class="product-rating">
        <span>Rating: </span>
        <span>4.5</span>
      </div>
      <div class="product-action">
        <button>Add to Cart</button>
      </div>
    </div>
  </div>
</body>
</div>