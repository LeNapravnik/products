<?php


class Products {
    // Interprets a string of XML into an object
    public function returnXmlObject() {
        $file = "https://www.retailys.cz/wp-content/uploads/astra_export_xml.zip";
        $zipFile = "tmp_file.zip";
        
        if (copy($file, $zipFile)) {
            $zip = new ZipArchive();
        
            if ($zip->open($zipFile)) {
                $xml_contents = $zip->getFromIndex(0);
                $zip->close();
                if($xml_contents){
                    $xml = simplexml_load_string($xml_contents);
                    return $xml;
                }
            }
        }
    }

    // returns count of products from given data object
    public function getProductCount(Object $xml_data){
        if(isset($xml_data->items->item)){
            return count($xml_data->items->item);
        }
    }

    // returns array of products and list of their spare parts from given data object
    public function getProducts(Object $xml_data){
        if(isset($xml_data->items->item)){
            $products = array();
            foreach ($xml_data->items->item as $item){
                if(isset($item->parts->part["name"]) && $item->parts->part["name"] == "Náhradní díly"){
                    $parts = array();
                    foreach($item->parts->part->item as $part){
                        $parts[] = $part["name"];
                    }
                    $products[] = array("name" => $item["name"],
                                    "parts" => $parts);
                }
                else{
                    $products[] = array("name" => $item["name"],);
                }
            }    
        return $products;
        }
    }

}

