<!DOCTYPE html>
<head>
    <meta charset="utf-8"></meta>
    <title>Produkty s náhradními díly</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<nav class="main-nav">
		<ul class="menu">
            <li><a href="/produkty.php">Zobrazit seznam produktů</a></li>
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

        <article id="dily">
            <h3>Produkty s náhradními díly</h3>
            <div>
            <?php 
                if(!empty($product_arr)){
                    foreach($product_arr as $item){
                        if(isset($item["parts"])){
                            echo $item["name"] . " - Náhradní díly: <ul>";
                            foreach($item["parts"] as $part){
                                echo "<li>" . $part . "</li>";
                            }
                            echo "</ul><br>";
                        }
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