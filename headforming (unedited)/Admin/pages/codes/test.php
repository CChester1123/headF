<?php
   
// for ($i = 1; $i <= 7; $i++) {
//    for ($j = 1; $j <= 5; $j++) {
//       $count = ($i - 1) * 5 + $j;
//       if($i > 5 ){
//          if($j >= 3 && $j < 5){
//             echo "test ";
//          } else {
//             echo $count . " ";
//          }

//       } else {
//          echo $count . " ";
//       }
  
//    }
//     echo "<br>";
// }



$cars = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '', '', '28', '29', '30', '', '', '31');

echo $count = count($cars) / 5;
echo  "<br>";
echo $loopdata = (int)$count;
echo  "<br>";

for ($i = 1; $i <= $loopdata; $i++) {
   echo $i . " - ";
   for ($j = 1; $j <= 5; $j++) {
      $count = ($i - 1) * 5 + $j - 1;
      if($i > 5 ){
  

         if($cars[$count] == ""){
            echo "n/a ";
         } else {
  echo $cars[$count] . " ";
         }
          
        
     

      } else {
         echo $cars[$count] . " ";
      }
  
   }
    echo "<br>";
}

?>