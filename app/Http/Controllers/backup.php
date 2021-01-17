<?
$resultHorizontal = $this->CheckHorizontalValue($board,$size);
if($resultHorizontal){
     echo $resultHorizontal ;
    exit();
}
 /*แนวตั้ง*/
$resultVertical = $this->CheckVerticalValue($board,$size);
//$resultVerticalO= $this->CheckVerticalValue($board,$size,'O');
//$resultVertical = ($resultVerticalX)?$resultVerticalX:$resultVerticalO;
//     if($resultVerticalX){
//         echo $resultVerticalX ;
//        exit();
//    }

if($resultVertical){
   echo $resultVertical ;
  exit();
}


$resultDiagonalLToB = $this->CheckDiagonalLToBValue($board,$size);
if($resultDiagonalLToB){
   echo $resultDiagonalLToB ;
   exit();
}

$resultDiagonalLToTop = $this->CheckDiagonalLeftToTopValue($board,$size);
if($resultDiagonalLToTop){
  echo $resultDiagonalLToTop ;
  exit();
}

if($countPlay == $sizeTotal AND empty($resultDiagonalLToTop) AND empty($resultDiagonalLToB) AND empty($resultVertical) AND empty($resultHorizontal)){
    echo "NotWinALL" ;
    exit();
} 
echo NULL;
exit(); 


 function CheckVerticalValue($board,$size){
        
    for ($index = 0; $index <= $size - 1; $index++) {
        $flag = true;
        $x = 0;
        for ($i = 1;$i <= $size - 1; $i++) {
            if ($board[$i][$index] != $board[$i-1][$index]) {
                $flag = false;
                break;
            }else{
                $x ++;
                //echo $index.$i.$board[$index][$i]."<br>";
                //$x=$i;
            }
        }
       // if ($flag)
        echo "<br>return-$x = $index". $board[$i-1][$index];
    }

    /* 
    $countX = 0;
    for($i = 0; $i < $size; $i++) { 
    
        for ($j = 0; $j < $size; $j++) {
            //$next =  isset($board[$i+1][$j])?$board[$i+1][$j]:'';
            if($board[$i][$j] != $input){
                // if (debug_backtrace()[1]['function'] == 'game_check') {
                //   break;
                // }
        
            }else{

                $countX++;
                echo "-".$i.$j."-c-".$board[$i][$j]."=count-".$countX."<br>"; 
               // echo "$i $j = no<br>";
                //break;
               //echo $countX =0;
            }
            // if($board[$i][$j] =='O'){
            //     $countO++;
            //     echo $board[$i][$j] ."-".$i.$j."-o-".$countO."<br>";
            // }
        }
        if($countX == $size){ 
            return $input;
        } 
      
    }
    return NULL;
    */
    // for($j = 1; $j  < $size; $j++){  
    //     $rowHasWinner = true;
    //     for($i =0; $i < $size; $i++){
    //         echo $board[$j-1][$i]."<br>";
    //         $rowHasWinner = $rowHasWinner && ($board[$j][$i] == $board[$j-1][$i]);
            
    //      }
    //     if (($rowHasWinner && $board[$j][0] != -1)){
    //         return true;
    //     } 
    // }


   /*for ($index = 0; $index < $size; $index++) {
        $flag = true;
        $player ='';
        $count = 0; 
        //(int i = 1; i <= size - 1; i++) {
        for ($i = 1; $i <= $size - 1 ; $i++) {
            //echo $board[$i-1][$index]."<br>" ;
            // if ($board[$i][$index] != $board[$i-1][$index]) {
            //      $flag  = false;
            //       break;
            // }
            // if(($board[$index][$i] == $board[$index][$i-1])){
            //     $count++;
            //     //break;
            //     echo $board[$index][$i]."=$index:$i-$board[$index][$i]<br>";
                 
                 
            //     $player = $board[$index][$i];
            // }
        }
        if($count==$size) return $player;
        //if($flag) return $board[0][$index];

    }*/
  
}


  function CheckHorizontalValue($board,$size){

    // int x_count = 0;
    // int o_count = 0;
    // /* Check rows */
    // for (int i = 0; i < boardSz; i++) {
    //     x_count = o_count = 0;
    //     for (int j = 0; j < boardSz; j++) {
    //         if(values[i][j] == x_val)x_count++;
    //         if(values[i][j] == o_val)o_count++;
    //         if(values[i][j] == 0)
    //         {
    //             colCheckNotRequired[j] = true;
    //             if(i==j)diag1CheckNotRequired = true;
    //             if(i + j == boardSz - 1)diag2CheckNotRequired = true;
    //             allFilled = false;
    //             //No need check further
    //             break;
    //         }
    //     }
    //     if(x_count == boardSz)return X_WIN;
    //     if(o_count == boardSz)return O_WIN;         
    // }
    for ($index = 0; $index <= $size - 1; $index++) {
        $flag = true;
        $count = 0;
        $player = '';
        for ($i = 1; $i <= $size - 1; $i++) {
            if ($board[$index][$i] == $board[$index][$i-1]){
                //$flag = false;
                $count++;
                //break;
                $player = $board[$index][$i];
            }
        }
        //if($count==$size)return $player; 
            
       
        //if($flag) return $board[$index][0];
    }
     return NULL;
}
