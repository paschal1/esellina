 <?php
                                                
                                                $query = "SELECT cmt.comment_id AS comment_id, ux.firstname, ux.lastname, ux.pic, cmt.comment AS comment, cmt.timeCreated AS timeCreated FROM user_post_comment AS cmt INNER JOIN users AS ux ON cmt.user_id = ux.user_id WHERE cmt.post_id = {$post_id}";
                                                //$query = "SELECT * FROM user_post_comment WHERE post_id=$post_id ORDER BY comment_id";
                                                $statement = $dbconn->prepare($query);
                                                $statement->execute();
                                                $result4 = $statement->fetchAll();
                                                $count = $statement->rowCount();
                                                ?>

                                <span> &nbsp; <input type="button" value="Comment(<?php echo $count; ?>)"
                                        style="background:#FFFFFF; border:#FFFFFF;font-size:15px; color:#6D84C4;"
                                        onClick="Comment_focus(<?php echo $post_id; ?>);"
                                        onMouseOver="Comment_underLine(<?php echo $post_id; ?>)"
                                        onMouseOut="Comment_NounderLine(<?php echo $post_id; ?>)"
                                        id="comment<?php echo $post_id; ?>">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style="color:#999999;"> </span>
                                </span>
                            </div>

                            <?php
                                            foreach ($result4 as $loop_key => $comment_data) {
                                                $comment_id = $comment_data[0];
                                                $comment_user_id = $comment_data[1];
                                                $comment = $comment_data['comment'];
                                                $user_n1 = $comment_data['firstname'];
                                                $user_n2 =$comment_data['lastname']; 
                                                $user_pic = $comment_data['pic'];
                                                
                            ?>
                            <?php
                                                $clen = strlen($comment);
                                                if ($clen > 0 && $clen <= 60) {
                                                    $cline1 = substr($comment, 0, 60);
                                ?>
                                <tbody data-toggle="<?php echo $loop_key; ?>toggle">
                            <tr>
                                <td> </td>
                                <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                    <img src="../uploads/<?php echo $user_pic; ?> " height="20px" width="20px"
                                        border-radius="50px" />
                                    <?php echo '<b>' . $user_n1 . '</b>'; ?>
                                    <?php echo '<b>' . $user_n2 . '</b>'; ?>
                                    
                                   <p> <?php echo $cline1; ?></p>
                                    
                                    
                                </td>
                            </tr>
                            <?php
                                                } else if ($clen > 60 && $clen <= 120) {
                                                    $cline1 = substr($comment, 0, 60);
                                                    $cline2 = substr($comment, 60, 60);
                                ?>
                            <tr>
                                <td> </td>
                                <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                    <?php echo $cline1; ?></td>
                            </tr></tbody>
                            <tbody class="hide">
                            <tr>
                                <td> </td>
                                <td bgcolor="#EDEFF4"> </td>
                                <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                    <?php echo $cline2; ?></td>
                            </tr>
                            <?php
                                                } else if ($clen > 120 && $clen <= 180) {
                                                    $cline1 = substr($comment, 0, 60);
                                                    $cline2 = substr($comment, 60, 60);
                                                    $cline3 = substr($comment, 120, 60);
                                ?>
                            <tr>
                                <td> </td>
                                <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                    <?php echo $cline1; ?></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td bgcolor="#EDEFF4"> </td>
                                <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                    <?php echo $cline2; ?></td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td bgcolor="#EDEFF4"> </td>
                                <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                    <?php echo $cline3; ?></td>
                            </tr>
                            <?php
                                                } else if ($clen > 180 && $clen <= 240) {
                                                    $cline1 = substr($comment, 0, 60);
                                                    $cline2 = substr($comment, 60, 60);
                                                    $cline3 = substr($comment, 120, 60);
                                                    $cline4 = substr($comment, 180, 60);
                                ?>
                            <table>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline1; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline2; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline3; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline4; ?>
                                    </td>
                                </tr>
                                <?php
                                                } else if ($clen > 240 && $clen <= 300) {
                                                    $cline1 = substr($comment, 0, 60);
                                                    $cline2 = substr($comment, 60, 60);
                                                    $cline3 = substr($comment, 120, 60);
                                                    $cline4 = substr($comment, 180, 60);
                                                    $cline5 = substr($comment, 240, 60);
                                    ?>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline1; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline2; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline3; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline4; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline5; ?>
                                    </td>
                                </tr>
                                <?php
                                                } else if ($clen > 300 && $clen <= 360) {
                                                    $cline1 = substr($comment, 0, 60);
                                                    $cline2 = substr($comment, 60, 60);
                                                    $cline3 = substr($comment, 120, 60);
                                                    $cline4 = substr($comment, 180, 60);
                                                    $cline5 = substr($comment, 240, 60);
                                                    $cline6 = substr($comment, 300, 60);
                                    ?>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline1; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline2; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline3; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline4; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline5; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline6; ?>
                                    </td>
                                </tr>
                                <?php
                                                } else if ($clen > 360 && $clen <= 420) {
                                                    $cline1 = substr($comment, 0, 60);
                                                    $cline2 = substr($comment, 60, 60);
                                                    $cline3 = substr($comment, 120, 60);
                                                    $cline4 = substr($comment, 180, 60);
                                                    $cline5 = substr($comment, 240, 60);
                                                    $cline6 = substr($comment, 300, 60);
                                                    $cline7 = substr($comment, 360, 60);
                                    ?>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline1; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline2; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline3; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline4; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline5; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline6; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td bgcolor="#EDEFF4"> </td>
                                    <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
                                        <?php echo $cline7; ?>
                                    </td>
                                </tr>
                                                </tbody>
                            </table>
                            <?php
                               }       }
                                ?>
                        </div>

                    </div>

                </div>

