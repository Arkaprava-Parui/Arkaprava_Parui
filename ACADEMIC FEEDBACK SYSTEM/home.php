<?php
session_start();
ob_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

     include 'daba.php';
     $sname = $_SESSION['name'];
     $s = "SELECT * FROM `feedback` WHERE STUDENT_NAME = '$sname' ";
     $qu = mysqli_query($cone, $s);
     $x = mysqli_num_rows($qu);

     $s1 = "SELECT * FROM `student` WHERE STUDENT_NAME = '$sname' ";
     $query = mysqli_query($cone,$s1);

     while ($r2 = mysqli_fetch_array($query)) {
          $se2 = $r2['SEMESTER'];
     }
     while ($r1 = mysqli_fetch_array($qu)){
          $se1[] = $r1['SEMESTER'];
     }
     for ($i=0; $i < $x; $i++) { 
             if ($se1[$i] == $se2) {
                    $check1[$i] = 0;
               } 
               else{
                    $check1[$i] = 1;
               }      
               
               }
    
      ?>
                              <!DOCTYPE html>
                              <html>

                              <head>
                                   <title>HOME</title>
                                   <link rel="stylesheet" type="text/css" href="home.css">
                              </head>

                              <body>

                              <?php if (in_array(0,$check1) && $x > 0 ) {?>
                                   <div style="display: flex; justify-content: center;">
                                        <a href="logout.php">logout</a>
                                   </div>
                                   <p class="p">
                                   For
                                   Further correction contact the authority.
                                   </p>
                                   <h1 class="h1">
                                   You have already submitted!<br>
                                   </h1>
                                   
                                   
                              <?php } else {
                              ?>
                                   <div style="display: flex; justify-content: center;">
                                   <form action="home.php" method="post">
                                        <?php
                                        $i = 0;
                                        include "daba.php";
                                        $name = $_SESSION['name'];
                                        $select = "select * from student where STUDENT_NAME = '$name' ";
                                        $query = mysqli_query($cone, $select);
                                        $result = mysqli_fetch_array($query);

                                        $SEMESTER = $result['SEMESTER'];
                                        $PROGRAM = $result['PROGRAM'];
                                        $GROUP = $result['GROUP'];



                                        $sel = "select * from `teacher_subject` where SEMESTER = '$SEMESTER' AND PROGRAM = '$PROGRAM' AND (type = 'CORE' OR (type ='lab core' AND `GROUP` = '$GROUP')OR type = 'SESSIONAL' )";
                                        $que = mysqli_query($cone, $sel);
                                        $num1 = mysqli_num_rows($que);
                                        $i = 0;
                                        if ($num1 > 0) {

                                             while ($res = mysqli_fetch_array($que)) {


                                                  if ($res['TYPE'] === 'LAB CORE' || $res['TYPE'] === 'SESSIONAL') {
                                                       $TEACHER_NAME = $res['TEACHER_NAME'];
                                                       $type = $res['TYPE'];
                                                       ?>
                                                                 
                                             
                                                            
                                                                                                                                  <div>
                                                                                                                                  <div class="img">
                                                                                                                                       <img src="<?= "$res[TEACHER_IMG]" ?>" style="height= 100px; width:150px"  >
                                                                                                                                  </div>
                                                                                                                                  <div>
                                                                                                                                       <label for="PROGRAM">PROGRAM</label>
                                                                                                                                       <input class="input" type="text" id="PROGRAM" name="PROGRAM[]" readonly="true" value="<?= $PROGRAM ?>">
                                                                                                                                  </div>
                                                                                                                                  <div>
                                                                                                                                       <label for="PCODE">PAPER CODE</label>
                                                                                                                                       <input class="input" type="text" id="PCODE" name="PCODE[]" readonly="true" value="<?= $res['PCODE'] ?>">
                                                                                                                                  </div>
                                                                      
                                                                                                                                  <div>
                                                                                                                                       <label for="SUBJECT">SUBJECT</label>
                                                                                                                                       <input class="input" type="text" id="SUBJECT" name="SUBJECT[]" readonly="true" value="<?= $res['SUBJECT'] ?>">
                                                                                                                                  </div>
                                                                                                                                  <div>
                                                                                                                                       <label for="TEACHER_NAME">TEACHER NAME</label>
                                                                                                                                       <input class="input" type="text" id="tname" name="tname[]" readonly="true" value="<?= $TEACHER_NAME ?>">
                                                                                                                                  </div>
                                                                                                                                  <div>
                                                                                                                                       <label for="TYPE">TYPE</label>
                                                                                                                                       <input class="input" type="text" id="tname" name="ty[]" readonly="true" value="<?= $type ?>">
                                                                                                                                  </div>
                                                                                                                                  <div>
                                                                                                                                       <label for="quistion">1. Teacher is regular.</label><br>
                                                                                                                                       <label><input type="radio" name="q1<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                       <label><input type="radio" name="q1<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                       <label><input type="radio" name="q1<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                       <label><input type="radio" name="q1<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                       <label><input type="radio" name="q1<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                  </div>
                                                                                                                                  <div>
                                                                                                                                       <label for="quistion">2. Teacher explains/ demonstrates the process/flowchart of the experiment/programme
                                                                                                                                            clearly.</label><br>
                                                                                                                                       <label><input type="radio" name="q2<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                       <label><input type="radio" name="q2<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                       <label><input type="radio" name="q2<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                       <label><input type="radio" name="q2<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                       <label><input type="radio" name="q2<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                  </div>
                                                                                                                                  <div>
                                                                                                                                       <label for="quistion">3. Teacher is available for necessary assistance regarding troubleshooting during
                                                                                                                                            experiment</label><br>
                                                                                                                                       <label><input type="radio" name="q3<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                       <label><input type="radio" name="q3<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                       <label><input type="radio" name="q3<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                       <label><input type="radio" name="q3<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                       <label><input type="radio" name="q3<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                  </div>
                                                                                                                                  <div>
                                                                                                                                       <label for="quistion">4. Teacher assists to complete the assignment within the stipulated
                                                                                                                                            time.</label><br>
                                                                                                                                       <label><input type="radio" name="q4<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                       <label><input type="radio" name="q4<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                       <label><input type="radio" name="q4<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                       <label><input type="radio" name="q4<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                       <label><input type="radio" name="q4<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                  </div>
                                                                                                                                  <div>
                                                                                                                                       <label for="quistion">5. Teacher is available for special help after the regular lab classes.</label><br>
                                                                                                                                       <label><input type="radio" name="q5<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                       <label><input type="radio" name="q5<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                       <label><input type="radio" name="q5<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                       <label><input type="radio" name="q5<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                       <label><input type="radio" name="q5<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                  </div>
                                                                                                                             </div>
                                                                                                                             <hr>
                                                                     

                                                                                                                             <?php
                                                  } else {
                                                       $TEACHER_NAME = $res['TEACHER_NAME'];
                                                       $type = $res['TYPE'];
                                                       ?>
                                                                                                                           <div>
                                                                                                                                       <div class="img">
                                                                                                                                            <img src="<?= "$res[TEACHER_IMG]" ?>" style="height= 100px; width:150px"  >
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="PROGRAM">PROGRAM</label>
                                                                                                                                            <input class="input" type="text" id="PROGRAM" name="PROGRAM[]" readonly="true" value="<?= $PROGRAM ?>">
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="PCODE">PAPER CODE</label>
                                                                                                                                            <input class="input" type="text" id="PCODE" name="PCODE[]" readonly="true" value="<?= $res['PCODE'] ?>">
                                                                                                                                       </div>
                                                                           
                                                                                                                                       <div>
                                                                                                                                            <label for="SUBJECT">SUBJECT</label>
                                                                                                                                            <input class="input" type="text" id="SUBJECT" name="SUBJECT[]" readonly="true" value="<?= $res['SUBJECT'] ?>">
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="TEACHER_NAME">TEACHER NAME</label>
                                                                                                                                            <input class="input" type="text" id="tname" name="tname[]" readonly="true" value="<?= $TEACHER_NAME ?>">
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="TYPE">TYPE</label>
                                                                                                                                            <input class="input" type="text" id="tname" name="ty[]" readonly="true" value="<?= $type ?>">
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="quistion">1. Teacher is regular and punctual in class.</label><br>
                                                                                                                                            <label><input type="radio" name="q1<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                            <label><input type="radio" name="q1<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                            <label><input type="radio" name="q1<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                            <label><input type="radio" name="q1<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                            <label><input type="radio" name="q1<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="quistion">2. Teacher is regular and punctual in class.</label><br>
                                                                                                                                            <label><input type="radio" name="q2<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                            <label><input type="radio" name="q2<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                            <label><input type="radio" name="q2<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                            <label><input type="radio" name="q2<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                            <label><input type="radio" name="q2<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="quistion">3. Teacher is regular and punctual in class.</label><br>
                                                                                                                                            <label><input type="radio" name="q3<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                            <label><input type="radio" name="q3<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                            <label><input type="radio" name="q3<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                            <label><input type="radio" name="q3<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                            <label><input type="radio" name="q3<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="quistion">4. Teacher is regular and punctual in class.</label><br>
                                                                                                                                            <label><input type="radio" name="q4<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                            <label><input type="radio" name="q4<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                            <label><input type="radio" name="q4<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                            <label><input type="radio" name="q4<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                            <label><input type="radio" name="q4<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="quistion">5. Teacher is regular and punctual in class.</label><br>
                                                                                                                                            <label><input type="radio" name="q5<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                            <label><input type="radio" name="q5<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                            <label><input type="radio" name="q5<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                            <label><input type="radio" name="q5<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                            <label><input type="radio" name="q5<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="quistion">6. Teacher is regular and punctual in class.</label><br>
                                                                                                                                            <label><input type="radio" name="q6<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                            <label><input type="radio" name="q6<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                            <label><input type="radio" name="q6<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                            <label><input type="radio" name="q6<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                            <label><input type="radio" name="q6<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="quistion">7. Teacher is regular and punctual in class.</label><br>
                                                                                                                                            <label><input type="radio" name="q7<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                            <label><input type="radio" name="q7<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                            <label><input type="radio" name="q7<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                            <label><input type="radio" name="q7<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                            <label><input type="radio" name="q7<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="quistion">8. Teacher is regular and punctual in class.</label><br>
                                                                                                                                            <label><input type="radio" name="q8<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                            <label><input type="radio" name="q8<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                            <label><input type="radio" name="q8<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                            <label><input type="radio" name="q8<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                            <label><input type="radio" name="q8<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="quistion">9. Teacher is regular and punctual in class.</label><br>
                                                                                                                                            <label><input type="radio" name="q9<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                            <label><input type="radio" name="q9<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                            <label><input type="radio" name="q9<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                            <label><input type="radio" name="q9<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                            <label><input type="radio" name="q9<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                       </div>
                                                                                                                                       <div>
                                                                                                                                            <label for="quistion">10. Teacher is regular and punctual in class.</label><br>
                                                                                                                                            <label><input type="radio" name="q10<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                            <label><input type="radio" name="q10<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                            <label><input type="radio" name="q10<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                            <label><input type="radio" name="q10<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                            <label><input type="radio" name="q10<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                       </div>
                                                                                                                                  </div>
                                                                                                                             <hr>
                                                                                                                             <?php
                                                  }
                                                  $i++;
                                                  ?>


                                                                                               <?php

                                             }
                                        } ?>

                    
                    
                    
                    
                    
                                        <?php

                                        $sel1 = "select * from elective_subject where STUDENT_NAME = '$name' ";
                                        $qu1 = mysqli_query($cone, $sel1);
                                        $num2 = mysqli_num_rows($qu1);
                                        if ($num2 > 0) {
                                             /*echo "<tr>
                                             <th>SUBJECT</th>
                                             <th>PCODE</th>
                                             <th>TEACHER_NAME</th>
                                             <th>TYPE</th>
                                             </tr>";*/
                                             while ($re = mysqli_fetch_array($qu1)) {

                                                  $SUBJECT = $re['SUBJECT'];
                                                  $PCODE = $re['PCODE'];
                                                  $sel2 = "select * from teacher_subject where SUBJECT = '$SUBJECT' AND PCODE = '$PCODE' ";
                                                  $qu2 = mysqli_query($cone, $sel2);
                                                  $num3 = mysqli_num_rows($qu2);



                                                  while ($re1 = mysqli_fetch_array($qu2)) {
                                                       /*echo "<tr>
                                                       <td>" . $re['SUBJECT'] . "</td>
                                                       <td>" . $re['PCODE'] . "</td>
                                                       <td>" . $re1['TEACHER_NAME'] . "</td>
                                                       <td>" . $re['TYPE'] . "</td>
                                                       </tr>";*/
                                                       ?>
                                                                                                                                  <?php
                                                                                                                                  if ($re['TYPE'] === 'LAB ELECTIVE') {
                                                                                                                                       $TEACHER_NAME = $re1['TEACHER_NAME'];
                                                                                                                                       $type = $re['TYPE'];
                                                                                                                                       ?>
                                                                                
                                                                                                                                                           <div>
                                                                                                                                                                <div class="img">
                                                                                                                                                                     <img src="<?= "$re1[TEACHER_IMG]" ?>" style="height= 100px; width:150px"  >
                                                                                                                                                                </div>
                                                                                                                                                                <div>
                                                                                                                                                                     <label for="PROGRAM">PROGRAM</label>
                                                                                                                                                                     <input class="input" type="text" id="PROGRAM" name="PROGRAM[]" readonly="true" value="<?= $PROGRAM ?>">
                                                                                                                                                                </div>
                                                                                                                                                                <div>
                                                                                                                                                                     <label for="PCODE">PAPER CODE</label>
                                                                                                                                                                     <input class="input" type="text" id="PCODE" name="PCODE[]" readonly="true" value="<?= $re['PCODE'] ?>">
                                                                                                                                                                </div>
                                                                                     
                                                                                                                                                                <div>
                                                                                                                                                                     <label for="SUBJECT">SUBJECT</label>
                                                                                                                                                                     <input class="input" type="text" id="SUBJECT" name="SUBJECT[]" readonly="true" value="<?= $re['SUBJECT'] ?>">
                                                                                                                                                                </div>
                                                                                                                                                                <div>
                                                                                                                                                                     <label for="TEACHER_NAME">TEACHER NAME</label>
                                                                                                                                                                     <input class="input" type="text" id="tname" name="tname[]" readonly="true" value="<?= $TEACHER_NAME ?>">
                                                                                                                                                                </div>
                                                                                                                                                                <div>
                                                                                                                                                                     <label for="TYPE">TYPE</label>
                                                                                                                                                                     <input class="input" type="text" id="type" name="ty[]" readonly="true" value="<?= $type ?>">
                                                                                                                                                                </div>
                                                                                                                                                                <div>
                                                                                                                                                                     <label for="quistion">1. Teacher is regular.</label><br>
                                                                                                                                                                     <label><input type="radio" name="q1<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                     <label><input type="radio" name="q1<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                     <label><input type="radio" name="q1<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                     <label><input type="radio" name="q1<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                     <label><input type="radio" name="q1<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                </div>
                                                                                                                                                                <div>
                                                                                                                                                                     <label for="quistion">2. Teacher explains/ demonstrates the process/flowchart of the experiment/programme
                                                                                                                                                                          clearly.</label><br>
                                                                                                                                                                     <label><input type="radio" name="q2<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                     <label><input type="radio" name="q2<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                     <label><input type="radio" name="q2<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                     <label><input type="radio" name="q2<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                     <label><input type="radio" name="q2<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                </div>
                                                                                                                                                                <div>
                                                                                                                                                                     <label for="quistion">3. Teacher is available for necessary assistance regarding troubleshooting during
                                                                                                                                                                          experiment</label><br>
                                                                                                                                                                     <label><input type="radio" name="q3<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                     <label><input type="radio" name="q3<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                     <label><input type="radio" name="q3<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                     <label><input type="radio" name="q3<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                     <label><input type="radio" name="q3<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                </div>
                                                                                                                                                                <div>
                                                                                                                                                                     <label for="quistion">4. Teacher assists to complete the assignment within the stipulated
                                                                                                                                                                          time.</label><br>
                                                                                                                                                                     <label><input type="radio" name="q4<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                     <label><input type="radio" name="q4<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                     <label><input type="radio" name="q4<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                     <label><input type="radio" name="q4<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                     <label><input type="radio" name="q4<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                </div>
                                                                                                                                                                <div>
                                                                                                                                                                     <label for="quistion">5. Teacher is available for special help after the regular lab classes.</label><br>
                                                                                                                                                                     <label><input type="radio" name="q5<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                     <label><input type="radio" name="q5<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                     <label><input type="radio" name="q5<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                     <label><input type="radio" name="q5<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                     <label><input type="radio" name="q5<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                </div>
                                                                                                                                                           </div>
                                                                                                                                                           <hr>
                                   


                                                                                                                                                           <?php
                                                                                                                                  } elseif ($re['TYPE'] === 'PROJECT') {
                                                                                                                                       continue;
                                                                                                                                  } else {

                                                                                                                                       $TEACHER_NAME = $re1['TEACHER_NAME'];
                                                                                                                                       $type = $re['TYPE'];
                                                                                                                                       ?>
                                                                                                                                                                <div>
                                                                                                                                                                     <div class="img">
                                                                                                                                                                          <img src="<?= "$re1[TEACHER_IMG]" ?>" style="height= 100px; width:150px"  >
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="PROGRAM">PROGRAM</label>
                                                                                                                                                                          <input class="input" type="text" id="PROGRAM" name="PROGRAM[]" readonly="true" value="<?= $PROGRAM ?>">
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="PCODE">PAPER CODE</label>
                                                                                                                                                                          <input class="input" type="text" id="PCODE" name="PCODE[]" readonly="true" value="<?= $re['PCODE'] ?>">
                                                                                                                                                                     </div>
                                                                                          
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="SUBJECT">SUBJECT</label>
                                                                                                                                                                          <input class="input" type="text" id="SUBJECT" name="SUBJECT[]" readonly="true" value="<?= $re['SUBJECT'] ?>">
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="TEACHER_NAME">TEACHER NAME</label>
                                                                                                                                                                          <input class="input" type="text" id="tname" name="tname[]" readonly="true" value="<?= $TEACHER_NAME ?>">
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="TYPE">TYPE</label>
                                                                                                                                                                          <input class="input" type="text" id="type" name="ty[]" readonly="true" value="<?= $type ?>">
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="quistion">1. Teacher is regular and punctual in class.</label><br>
                                                                                                                                                                          <label><input type="radio" name="q1<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q1<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q1<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                          <label><input type="radio" name="q1<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                          <label><input type="radio" name="q1<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="quistion">2. Teacher is regular and punctual in class.</label><br>
                                                                                                                                                                          <label><input type="radio" name="q2<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q2<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q2<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                          <label><input type="radio" name="q2<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                          <label><input type="radio" name="q2<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="quistion">3. Teacher is regular and punctual in class.</label><br>
                                                                                                                                                                          <label><input type="radio" name="q3<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q3<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q3<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                          <label><input type="radio" name="q3<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                          <label><input type="radio" name="q3<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="quistion">4. Teacher is regular and punctual in class.</label><br>
                                                                                                                                                                          <label><input type="radio" name="q4<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q4<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q4<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                          <label><input type="radio" name="q4<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                          <label><input type="radio" name="q4<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="quistion">5. Teacher is regular and punctual in class.</label><br>
                                                                                                                                                                          <label><input type="radio" name="q5<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q5<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q5<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                          <label><input type="radio" name="q5<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                          <label><input type="radio" name="q5<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="quistion">6. Teacher is regular and punctual in class.</label><br>
                                                                                                                                                                          <label><input type="radio" name="q6<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q6<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q6<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                          <label><input type="radio" name="q6<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                          <label><input type="radio" name="q6<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="quistion">7. Teacher is regular and punctual in class.</label><br>
                                                                                                                                                                          <label><input type="radio" name="q7<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q7<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q7<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                          <label><input type="radio" name="q7<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                          <label><input type="radio" name="q7<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="quistion">8. Teacher is regular and punctual in class.</label><br>
                                                                                                                                                                          <label><input type="radio" name="q8<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q8<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q8<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                          <label><input type="radio" name="q8<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                          <label><input type="radio" name="q8<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="quistion">9. Teacher is regular and punctual in class.</label><br>
                                                                                                                                                                          <label><input type="radio" name="q9<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q9<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q9<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                          <label><input type="radio" name="q9<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                          <label><input type="radio" name="q9<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                     </div>
                                                                                                                                                                     <div>
                                                                                                                                                                          <label for="quistion">10. Teacher is regular and punctual in class.</label><br>
                                                                                                                                                                          <label><input type="radio" name="q10<?= $i; ?>" value="1" /> Below  Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q10<?= $i; ?>" value="2" /> Average</label><br>
                                                                                                                                                                          <label><input type="radio" name="q10<?= $i; ?>" value="3" /> Good</label> <br>
                                                                                                                                                                          <label><input type="radio" name="q10<?= $i; ?>" value="4" /> Very  Good</label><br>
                                                                                                                                                                          <label><input type="radio" name="q10<?= $i; ?>" value="5" /> excellent</label>
                                                                                                                                                                     </div>
                                                                                                                                                                </div>
                                                                                                                                                           <hr>
                                                                                                                                                           <?php

                                                                                                                                  }
                                                                                                                                  $i++;
                                                  }
                                             }
                                        }

                                        ?>
                    
                                   <div>
                                        <button type="submit" class="btn" value="Submit" name="submit">Submit</button>
                              
                    
                                   </div>
                                   </form>
                                   </div>
                              </body>

                              </html>
                              <div style="display: flex; justify-content: flex-end; padding: 10px">
                                    <a href="logout.php">Logout</a>
                              </div>
                              <div style="display: flex; justify-content: center;">
                                   <h1>Hello,
                                        <?php echo $_SESSION['name']; ?>
                                   </h1>
                              </div>
        
                              <?php
                              $count = $i;


                              if (isset($_POST['submit'])) {
                                   $tname = $_POST['tname'];
                                   $type = $_POST['ty'];
                                   $SUBJECT = $_POST['SUBJECT'];
                                   $PCODE = $_POST['PCODE'];
                                   for ($j = 0; $j < $count; $j++) {
                                        if ($type[$j] === 'LAB CORE' || $type[$j] === 'LAB ELECTIVE' || $type[$j] === 'SESSIONAL') {

                                             if (empty($_POST['q1' . $j]) || empty($_POST['q2' . $j]) || empty($_POST['q3' . $j]) || empty($_POST['q4' . $j]) || empty($_POST['q5' . $j])) {
                                                  $check[$j] = 'false';
                                             } else {
                                                  $check[$j] = 'true';

                                             }
                                        } else {
                                             if (empty($_POST['q1' . $j]) || empty($_POST['q2' . $j]) || empty($_POST['q3' . $j]) || empty($_POST['q4' . $j]) || empty($_POST['q5' . $j]) || empty($_POST['q6' . $j]) || empty($_POST['q7' . $j]) || empty($_POST['q8' . $j]) || empty($_POST['q9' . $j]) || empty($_POST['q10' . $j])) {
                                                  $check[$j] = 'false';
                                             } else {
                                                  $check[$j] = 'true';

                                             }
                                        }
                                   }
                                   if (in_array('false', $check)) { ?>
                                                                                          <div class="alert">
                                                                                          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                                                                                          <strong>Danger!</strong> All options are not filled. Please fill in all fields.
                                                                                          </div>
                              
                                                                                     <?php
                                   } else {
                                        include "view.php";

                                        for ($j = 0; $j < $count; $j++) {

                                             if ($type[$j] === 'LAB CORE' || $type[$j] === 'LAB ELECTIVE' || $type[$j] === 'SESSIONAL') {

                                                  $sql1 = "INSERT INTO `FEEDBACK`(`STUDENT_NAME`, `TEACHER_NAME`, `SUBJECT`,`PCODE`,`TYPE`,`YEAR`,`PROGRAM`,`SEMESTER`,`Q1`,`Q2`,`Q3`,`Q4`,`Q5`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                                                  $stmtinsert = $db->prepare($sql1);
                                                  $result1 = $stmtinsert->execute([$_SESSION['name'], $tname[$j], $SUBJECT[$j], $PCODE[$j], $type[$j],date("Y"), $PROGRAM, $SEMESTER, $_POST['q1' . $j], $_POST['q2' . $j], $_POST['q3' . $j], $_POST['q4' . $j], $_POST['q5' . $j]]);

                                             } else {

                                                  $sql1 = "INSERT INTO `FEEDBACK`(`STUDENT_NAME`, `TEACHER_NAME`, `SUBJECT`,`PCODE`,`TYPE`,`YEAR`,`PROGRAM`,`SEMESTER`,`Q1`,`Q2`,`Q3`,`Q4`,`Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                                                  $stmtinsert = $db->prepare($sql1);
                                                  $result1 = $stmtinsert->execute([$_SESSION['name'], $tname[$j], $SUBJECT[$j], $PCODE[$j], $type[$j],date("Y"), $PROGRAM, $SEMESTER, $_POST['q1' . $j], $_POST['q2' . $j], $_POST['q3' . $j], $_POST['q4' . $j], $_POST['q5' . $j], $_POST['q6' . $j], $_POST['q7' . $j], $_POST['q8' . $j], $_POST['q9' . $j], $_POST['q10' . $j]]);

                                             }
                                        }
                                        header("Location: kickout.php");
                                   }

                              } 
                         }
                               } else {
                                    header("Location: index.php");
                                    exit();
                               }
                               ob_end_flush();
                               ?>