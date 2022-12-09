<?php 
    $conn = new PDO("mysql:host=localhost;port=3306;dbname=realt", "root", "");
    
  class Houses {
    public $name_obj = "";
    public $adress = "";
    public $description = "";
    public $price = "";
    public $img = "";

    function getNameObj($name_obj){
        return  $this -> $name_obj = $name_obj;
    }

    function getAdress($adress){
        return  $this -> $adress = $adress;
    }
    function getDescription($description){
        return  $this -> $description = $description;
    }
    function getPrice($price){
        return  $this -> $price = $price;
    }
    function getImg($img){
        return  $this -> $img = $img;
    }
  }
    
  $house = new Houses();
    if (isset($_GET['upper'])) {
        $dataHouses = $conn->query("SELECT * FROM `houses` ORDER BY `houses`.`price` DESC")->fetchAll();
        foreach ($dataHouses as $row) {
            $name_obj = $house->getNameObj($row['name_obj']) ;
            $adress = $house->getAdress($row['adress']);
            $description = $house->getDescription($row['description']);
            $price = $house->getPrice($row['price']);
            $img = $house->getImg($row['img']);
  
  
            echo '
              <div class="blockFlat">
                  <div class="imgfirst"><img src="'.$img.'" alt=""></div>
                  <div class="first">'.$name_obj.'</div>
                  <div class="second">'.$adress.'</div>
                  <div class="third">'.$description .'</div>
                  <div class="fourth">'.$price.'</div>
              </div>
         ';

      }
    } else if(isset($_GET['downer'])){
        $dataHouses = $conn->query("SELECT * FROM `houses` ORDER BY `houses`.`price` ASC")->fetchAll();
        foreach ($dataHouses as $row) {
            $name_obj = $house->getNameObj($row['name_obj']) ;
            $adress = $house->getAdress($row['adress']);
            $description = $house->getDescription($row['description']);
            $price = $house->getPrice($row['price']);
            $img = $house->getImg($row['img']);
  
  
            echo '
              <div class="blockFlat">
                  <div class="imgfirst"><img src="'.$img.'" alt=""></div>
                  <div class="first">'.$name_obj.'</div>
                  <div class="second">'.$adress.'</div>
                  <div class="third">'.$description .'</div>
                  <div class="fourth">'.$price.'</div>
              </div>
         ';

      }

    } else  if (isset($_POST['numHouse'])) {
        $foundWord = $_POST['numHouse'];
        $dataHouses = $conn->query("SELECT * FROM `houses`")->fetchAll();
        foreach ($dataHouses as $row) {
            $adress = $house->getAdress($row['adress']);
           if ($foundWord === ''){
            echo 'введите номер дома';
            break;
           } else 
            if (strpos($adress,$foundWord)){
                $name_obj = $row['name_obj'];
                
                $description = $row['description'];
                $price = $row['price'];
                $img = $row['img'];
      
      
                echo '
                  <div class="blockFlat">
                      <div class="imgfirst"><img src="'.$img.'" alt=""></div>
                      <div class="first">'.$name_obj.'</div>
                      <div class="second">'.$adress.'</div>
                      <div class="third">'.$description .'</div>
                      <div class="fourth">'.$price.'</div>
                  </div>
             ';
            } else {
                continue;
            }
           

      }
        
    }else {
        $dataHouses = $conn->query("SELECT * FROM `houses`")->fetchAll();
        foreach ($dataHouses as $row) {
            $name_obj = $house->getNameObj($row['name_obj']) ;
            $adress = $house->getAdress($row['adress']);
            $description = $house->getDescription($row['description']);
            $price = $house->getPrice($row['price']);
            $img = $house->getImg($row['img']);
              echo '
                <div class="blockFlat">
                    <div class="imgfirst"><img src="'.$img.'" alt=""></div>
                    <div class="first">'.$name_obj.'</div>
                    <div class="second">'.$adress.'</div>
                    <div class="third">'.$description .'</div>
                    <div class="fourth">'.$price.'</div>
                </div>
           ';    
        }
    }

    
    
    
    
    
 
    $conn->null;
?>