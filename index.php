<!DOCTYPE html>
<head>
    <meta charset="utf-8"></meta>
    <title>Products</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav class="main-nav">
		<ul class="menu">
            <li><a href="/produkty.php">Zobrazit seznam produktů</a></li>
            <li><a href="/nahradni_dily.php">Zobrazit produkty s náhradními díly</a></li>
		</ul>
    </nav>
    <section>
    <?php 
    require "./model/products.php";

    $products = new Products();
    $xml = $products->returnXmlObject();
    $count = $products->getProductCount($xml);

    if(!$count){
        $count = "Nebyly nalezeny žádné produkty.";
    }
    ?>
        <article id="pocet"> 
            <h3>Počet produktů</h3>
            <div>
            <?php 
                echo "<p>" . $count . "</p>";
            ?>
            </div>
        </article>
        
</section>
</body>
</html>