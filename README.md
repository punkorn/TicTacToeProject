<p align="left"> 
 
## วิธีการคิด
    - ผู้เล่นจำนวน 2 คน
    - กำหนดขนาดของตาราง Tic Tac Toe ได้จากหน้าแรก ขนาดของตารางต่ำสุด 3 และสูงสุด 20 เท่านั้น
    - หน้าเล่นเกมส์แสดงตาราง จาก Size ที่กำหนดเข้ามา วนลูปแสดงตาราง 2 Loop ตามจำนวน Size และเก็บค่าลงตัวแปร Array 2 มิติ (board[][]) 
    - เมื่อเริ่มเล่นเกมส์จะเริ่ม จาก X ก่อนเสมอ ต่อจากนั้นจะเป็น O คิดจาก
        กำหนดตัวแปรมาเก็บจำนวนครั้งที่เล่น = countPlay มีค่าเท่ากับ 0 
        ใช้ script ตรวจสอบผู้เล่นคนต่อไป คำนวณจากจำนวนครั้งที่เล่น =>countPlay%2  = nextPlayer
            ถ้า nextPlayer = 0 คือ X
            ถ้า nextPlayer = 1 คือ O
            และเพิ่มค่า countPlay ต่อๆไป
      - เมื่อจำนวนครั้งที่เล่นมีค่ามากกว่าหรือเท่ากับ (countPlay) จำนวนครั้งที่จะมีโอกาสชนะเร็วสุด คิดจาก (sizeoftable * 2)-1
        จะส่งไปหาผู้ชนะ ที่ checkForWinOrTie Function ที่ฟังก์ชันนี้จะเริ่มหาคนชนะจาก
        
#####  1. ตรวจสอบจากแนวตั้ง CheckVerticalValue   
    - วนลูป 2 ชั้นตาม size ของตาราง Loop แรกคือ Row 
    Loop 2 คือ Column โดยเริ่มจากตำแหน่งที่ Row = 0 และ Column = 0 
    ถ้าค่าที่รับเข้ามาเป็นค่าว่างก็จะออกจาก Loop 2 เพื่อไปขึ้นแถวใหม่  
    ถ้าค่าที่รับเข้ามามีค่าจะตรวจสอบว่าเป็น X หรือ O โดยจะคิดจาก วน Loop ที่ 2 (0 ถึง < size) 
    เป็น ค่า Array ตัวแรก เพราะเราจะหาค่าตามแนวตั้ง และ Array ตัวที่ 2 คือ Loop ที่ 1 ($board[loop2][loop1])
    และบวกจำนวนครั้งเพื่อตรวจสอบว่าจำนวนครั้งนั้นเท่ากับ Size ของตารางหรือไม่
    ถ้าจำนวนครั้งนั้นเท่ากับ Size ของตารางแล้วก็จะ return ผู้ชนะกลับไป ถ้าไม่มีผู้ชนะ จะ return null
    
#####  2. ตรวจสอบ จากแนวนอน CheckHorizontalValue  
    - วนลูป 2 ชั้นตาม size ของตาราง Loop แรกคือ Row Loop 2 คือ Column โดยเริ่มจากตำแหน่งที่ Row = 0 และ Column = 0 
    ถ้าค่าที่รับเข้ามาเป็นค่าว่างก็จะออกจาก Loop 2 เพื่อไปขึ้นแถวใหม่
    ถ้าค่าที่รับเข้ามามีค่าจะตรวจสอบว่าเป็น X หรือ O โดยจะคิดจาก วน Loop2 ที่ 2 (0 ถึง < size)   
    เป็น ค่า Array ตัวที่1 Loop 1 เพราะเราจะหาค่าตามแนวนอน และ Array ตัวที่ 2 คือ Loop 2 ($board[loop1][loop2])
    และบวกจำนวนครั้งเพื่อตรวจสอบว่าจำนวนครั้งนั้นเท่ากับ Size ของตาราง
    ถ้าจำนวนครั้งนั้นเท่ากับ Size ของตารางแล้วก็จะ return ผู้ชนะกลับไป ถ้าไม่มีผู้ชนะ จะ return null  
    
##### 3. ตรวจสอบจากแนวทแยงจากซ้ายตัวบนแถวแรก CheckDiagonalLeftTopToBottomValue
    - กำหนดเริ่มต้นเป็น 1 เพราะจะตรวจสอบแถวที่ 2 เปรียบเทียบกับแถวแรกบนสุด 
    และจำนวนการวน Loop มีค่าน้อยกว่าหรือเท่ากับ size-1   
    Check ค่าจาก Row แรก และ Column2 แรก (เป็นแนวทแยงบนซ้ายสุดลงล่างสุด Loop check ครั้งแรก ($board[$i][$i] != $board[$i-1][$i-1])  
    หาผู้ชนะจาก โดยเปรียบเทียบจาก Row 2 Column 2 มีค่าเท่ากับ Row Column แรก หรือไม่ 
    ถ้าไม่เท่ากัน return null
    ถ้าใช่ จะวนลูปไปยังลำดับถัดไป เปรียบเทียบค่ากับลำดับก่อนหน้าไปเรื่อยๆ จนครบ Loop
    ถ้าวน Loop จนครบ ไม่ break จะ return ผู้ชนะที่ตำแหน่ง Row แรก และ Column 
   
#####  4. ตรวจสอบจากแนวทแยงจากซ้ายตัวล่างสุดแถวแรกไปข้างบนตัวสุดท้ายของแถว CheckDiagonalLeftBottomToTopValue
    - กำหนดเริ่มต้นเป็น 1($i) ของ Loop เพราะจะเปรียบเทียบแถวที่ 2     
    และจำนวนการวน Loop มีค่าน้อยกว่าหรือเท่ากับ size-1
    Check ค่าจาก Row Column แรก ล่างสุด($board[$size - $i][$i-1]) กับแถวที่ 2 ($board[$size-$i-1][$i]!= $board[$size - $i][$i-1])
    ของตารางเพราะเป็นแนวทแยงล่างสุดไปบนสุด
    หาผู้ชนะจาก โดยเปรียบเทียบจากแถวที่ 2 จากล่างขึ้นบน มีค่าเท่ากับ Row แรกล่างสุดคือ size ของตาราง หรือไม่
    ถ้าไม่เท่ากัน return null
    ถ้าใช่ จะวนลูปไปยังลำดับถัดไป เปรียบเทียบค่ากับลำดับก่อนหน้าไปเรื่อยๆ จนครบ Loop ตามจำนวน size 
    ถ้าวน Loop จนครบ ไม่ break จะ return ผู้ชนะที่ตำแหน่ง Row แรก และ Column

##### 5. ถ้าจำนวนครั้งที่เล่น เท่ากับ จำนวน size*size แล้วยังไม่มีคนชนะ return NotWinALL 
    - เมื่อส่งค่ามาหาผู้ชนะเรียบร้อยแล้ว ค่าที่ส่งกลับมา ถ้าเป็น X หรือ O หรือไม่มีคนชนะ และแสดงปุ่มให้ คลิ๊ก เพื่อเล่นเกมส์อีกครั้ง
    - ถ้าค่าที่ส่งกลับมาเป็นค่าว่างก็จะเล่นไปอีกครั้ง และส่งค่ากลับไป checkForWinOrTie Function อีกครั้ง 
      จนกว่าจะครบจำนวนที่ต้องเล่นหรือมีผู้ชนะ
      
### Demo 4*4

    00 | 01 | 02 | 03  
    10 | 11 | 12 | 13  
    20 | 21 | 22 | 23     
    30 | 31 | 32 | 33 
</p>
     
    
