@extends('template')
    @section('content')
        <div class="row ">
            <div class="col-md-12 mt-5">
                <h4 class="mb-5">Tic Tac Toe Game</h4>
                <h6 id="gameResult" class="mb-3"></h6>
                <form method="POST"  id="formCheck" name="formCheck" class="mb-5">
                    @csrf
                    <input type="hidden" name="size" value="{{$size}}" id="size">
                    <input type="hidden" name="countPlay"  id="countPlay" value="0">
                    <input type="hidden" name="done"  id="done" value="no">
                    <input type="hidden" id="win" value="">
                    
                    <div class="form-group">
                        @for($i = 0; $i <$size ; $i++)
                            @for($j = 0; $j<$size;$j++) 
                                <input type="text" name="board[{{$i}}][{{$j}}]" id="board-{{$i}}-{{$j}}"
                                    pattern="[oxOX]" class="form-control sizeinput" maxlength='1' 
                                    onclick="checkPlayer($(this).attr('id'));" readonly>
                            @endfor        
                            @if(($i%$size==$i))
                                </div> <div class="form-group">
                             @endif
                        @endfor
                    </div>
                    <!-- <button class="btn btn-primary" type="submit">Play Game</button> -->
                </form>
                <div id="backToMains" class="mt-5" style="display: none;">
                    <a class="btn btn-primary btn-lg"  href="{{route('main')}}">Play Game</a>
                </div>
             </div>
             
        </div>
    
    @section('checkwin-scripts')
    
    <script type="text/javascript">
        function checkPlayer(inputID){
            $("#gameResult").html('');
            var size = $("#size").val();
            var sizeInputMin = (size*2)-1;
            var countPlay = $("#countPlay").val();
            var doneGame = $("#done").val();
            if(doneGame=='done'){
                alert("please play a new game.");
                 var win = $("#win").val();
                $("#gameResult").addClass('text-danger').html(win+"  please play a new game.");
            } 

            if(countPlay==0){
                $("#"+inputID).val("X");
                $("#countPlay").val(parseInt(countPlay)+1);
            }else{ 
                if($("#"+inputID).val()!=''){
                    alert("Don't select this box,pls select other box");
                }else{
                    var modLoopXO = (parseInt(countPlay)%2) ;
                    if(modLoopXO==1)$("#"+inputID).val("O");
                    if(modLoopXO==0)$("#"+inputID).val("X");
                   //console.log("modLoopXO="+modLoopXO+"=c="+countPlay);
                    $("#countPlay").val(parseInt(countPlay)+1);
                    var chkInput = $("#countPlay").val();
                    
                    if(chkInput >= sizeInputMin){
                        //console.log('sizeInputMin'+sizeInputMin+"a:"+chkInput);
                        sendValueToChekWin();
                    }
                }      
            }           
        }
        function sendValueToChekWin(){         
            var urlcheck = "{{route('checkPlayerWin')}}";
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var dataform = $("#formCheck").serialize();
            $.ajax({ 
                method:'POST',
                url: urlcheck,
                data :dataform , 
                dataType: "html",     
                success: function(data) {
                    if($.trim(data)=='NotWinALL'){
                        $("#gameResult").addClass('text-danger').html("please play a new game.");
                        $("#done").val('done');
                        $("#backToMains").show();
                    } else if(($.trim(data)=='X' ) || ($.trim(data)=='O')){
                        $("#gameResult").addClass('text-success').html($.trim(data)+" Win!!!");
                        $("#win").val($.trim(data)+" Win!!!");
                        $("#done").val('done');
                        $("#backToMains").show();
                    }else if($.trim(data)=='NO'){
                        $("#gameResult").html(" ");
                    }
                },
                failure: function() {
                    alert("failure something  wrong ,pls play game again!!!");
                    $("#done").val('done');
                    $("#backToMains").show();
                }
            });
        }
    </script>
@stop
@endsection