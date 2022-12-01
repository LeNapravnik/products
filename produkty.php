<!DOCTYPE html>
<head>
    <meta charset="utf-8"></meta>
    <title>Seznam produktů</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav class="main-nav">
		<ul class="menu">
            <li><a href="/nahradni_dily.php">Zobrazit náhradní díly</a></li>
            <li><a href="/index.php">Zpět</a></li>
		</ul>
    </nav>
    <section>

    <?php 
    require "./model/products.php";
    $products = new Products();
    $xml = $products->returnXmlObject();
    $product_arr = $products->getProducts($xml);
    ?>

        <article id="produkty">
            <h3>Seznam produktů </h3>
            <div>
            <?php 
                if(!empty($product_arr)){
                    foreach($product_arr as $item){
                        echo $item["name"] . "<br>";
                    }
                }
                else{
                    echo "Nebyly nalezeny žádné produkty.";
                }
            ?>
            </div>
        </article>
        
</section>
</body>
</html>