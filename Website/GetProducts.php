<?php 
  $server = "localhost";
  $user = "gurnoors_admin";
  $pass = "gurnoors_admin";
  $db = "gurnoors_users";


$conn = new mysqli($server, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM Products";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

   while($row = $result->fetch_assoc()) {
    print('<div class="box1">');
    $boolean=true;
    for ($i=0; $i <3 && $boolean; $i++) { 
      # code...
      print('<div class="col_1_of_3 span_1_of_3"><form action="single.php" method="post">
  <input type="hidden" name="SNo" value="'.$row["SNo"].'" />
  <input type="hidden" name="Name" value="'.$row["Name"].'" />
  <input type="hidden" name="Description" value="'.$row["Description"].'" />
  <input type="hidden" name="Price" value="'.$row["Price"].'" />
  <input type="hidden" name="Quantity" value="'.$row["Quantity"].'" />
  <input type="hidden" name="Rating" value="'.$row["Rating"].'" />
  <input type="hidden" name="Image" value="'.$row["Image"].'" />
              

             <div class="view view-fifth">
              <div class="top_box">
              <h3 class="m_1">'.$row['Name'].'</h3>
              <p class="m_2">'.$row['Description'].'</p>
                 <div class="grid_img">
               <div class="css3"><img src="'.$row['Image'].'" alt="" height="300"/></div>
                    <div class="mask">
                            <div class="info"><input type="submit" value="View" class="astext"></div>
                        </div>
                      </div>
                       <div class="price">$'.$row['Price'].'</div>
             </div>
              </div>
              <span class="rating">
              ');
      
      
              
        $rating= intval( $row['Rating'] );
        $inp_no=1;
        for($k=1; $k<=$rating; $k++){
          $inp_no=$k;
          $to_print = '<input type="radio" class="rating-input" id="rating-input-1-'.strval($inp_no).'" name="rating-input-1">
                <label for="rating-input-1-'.strval($inp_no).'" class="rating-star1"></label>';
          print($to_print);
        }
        for($j=$inp_no+1; $j <=5; $j++){
          $to_print = '<input type="radio" class="rating-input" id="rating-input-1-'.strval($j).'" name="rating-input-1">
                <label for="rating-input-1-'.strval($j).'" class="rating-star"></label>';
          print($to_print);
        }

            
      print('
              &nbsp;
            ('.strval($row['rcount']).')'
            );

      print('
         </span></form>
             <ul class="list">
              <li>
                <img src="images/plus.png" alt=""/>
                <ul class="icon1 sub-icon1 profile_img">
                <li><form action="addtocart.php" method="post">
  <input type="hidden" name="Name" value="'.$row["Name"].'" />
  <input type="hidden" name="Description" value="'.$row["Description"].'" />
  <input type="hidden" name="Price" value="'.$row["Price"].'" />
  <input type="hidden" name="Image" value="'.$row["Image"].'" />
  <input type="submit" value="Add to Bag" />
  </form>
                <ul class="sub-icon1 list">
                  <li><h3>sed diam nonummy</h3><a href=""></a></li>
                  <li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
                </ul>
                </li>
               </ul>
               </li>
               </ul>
                <div class="clear"></div>
            </div>
            ');
      if($i!=2 && $row = $result->fetch_assoc()){
        
      }else{
        $boolean=false;
      }
      
    }
    print('<div class="clear"></div>
            </div>');
        
    }
    print('<div class="clear"></div>
            </div>');
    
}


$conn->close();
?>

