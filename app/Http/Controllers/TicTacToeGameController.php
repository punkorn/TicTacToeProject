<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicTacToeGameController extends Controller
{
    
    public function setWinner($winner)
	{
		$this->winner = $winner;
    }
    
	public function getWinner()
	{
		return $this->winner;
    }
    
    public function index(){
        return view('index');
    }


    public function SetSizeGame(Request $req){

        $size = isset($req->tictactoeSize)?$req->tictactoeSize:NULL;
        if($size){
            return view('playgame')->with(compact('size'));
            exit();
        }
        return view('index');
        exit();

    }

    public function checkForWinOrTie(Request $req){
        $size = isset($req->size)?$req->size:NULL;
        $board = isset($req->board)?$req->board:NULL;
        $countPlay = isset($req->countPlay)?$req->countPlay:0;
        $sizeTotal = $size*$size ;
    
        if($board AND $size){
            $resultVertical  = $this->CheckVerticalValue($board,$size) ;
            if($resultVertical){
                echo  $resultVertical;
                exit();
            } 
            $resultHorizontal = $this->CheckHorizontalValue($board,$size);
            if($resultHorizontal){
                echo   $resultHorizontal;
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
        }
    }

    public function CheckHorizontalValue($board,$size){    
        for ($i = 0;$i < $size; $i++) {
            $x_count = $o_count= 0;
            for ($j = 0; $j < $size; $j++) {
                if($board[$i][$j] == ''){//No need to check 
                    //echo" break <br>";
                     break;
                 }
                if($board[$i][$j] == 'X'){
                    //echo "X $j= ".$board[$i][$j]."<br>";
                    $x_count++;
                }
                if($board[$i][$j] == "O"){
                    // echo "O $j= ".$board[$i][$j]."<br>";
                    $o_count++;
                }
               
            }
            if($x_count == $size)return "X";
            if($o_count == $size)return "O";         
        }
        
         return false;
    }

    public function  CheckVerticalValue($board,$size) {

        for ($i = 0; $i < $size; $i++) {
            $x_count =$o_count  = 0;
            for ($j = 0; $j < $size; $j++) {
                if($board[$j][$i] == ''){ //echo" break <br>";
                    break;
                } ;
                if($board[$j][$i] == "X"){//echo "X $j= ".$board[$j][$i] ."<br>";
                    $x_count++;
                }
                if($board[$j][$i] == "O") {// echo "O $j= ".$board[$j][$i] ."<br>";
                    $o_count++;
                }
            }
            if($x_count == $size)return "X";
            if($o_count == $size)return "O";    
        }
         return false;
    }
    
    public function CheckDiagonalLToBValue($board,$size){
        $flag = true;
        for ($index = 1; $index <= $size - 1; $index++) {
            if ($board[$index][$index] != $board[$index-1][$index-1]){
                $flag = false;
                break;
            }
        }
        if($flag){
            return $board[0][0];
        }else{
            return NULL;
        }
        return NULL;
     }
     public function CheckDiagonalLeftToTopValue($board,$size){
        $flag = true;
        for ($index = 1; $index <= $size - 1; $index++) {
            if ($board[$size-$index - 1][$index] != $board[$size - $index][$index - 1]) {
                $flag = false;
                break;
            }
        }
        if($flag){
            return $board[$size- 1][0];
        }else{
            return NULL;
        } 
        
    }


}

?>

 



