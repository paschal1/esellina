<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
</head>

<body>
    <div id="links">
        <?php $query="SELECT * FROM user_post_comment WHERE post_id=$post_id ORDER BY comment_id" ; $statement=$dbconn->
prepare($query);
$statement->execute();
$result4 = $statement->fetchAll();
$count = $statement->rowCount();
?>

        <span> &nbsp; <input type="button" value="Comment(<?php echo $count; ?>)"
                style="background:#FFFFFF; border:#FFFFFF;font-size:15px; color:#6D84C4;"
                onClick="Comment_focus(<?php echo $post_id; ?>);"
                onMouseOver="Comment_underLine(<?php echo $post_id; ?>)"
                onMouseOut="Comment_NounderLine(<?php echo $post_id; ?>)" id="comment<?php echo $post_id; ?>">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span style="color:#999999;"> </span>
        </span>
    </div>

    <?php
                                            foreach ($result4 as $comment_data) {
                                                $comment_id = $comment_data[0];
                                                $comment_user_id = $comment_data[1];
                            ?>
    <?php
                                                $clen = strlen($comment_data[3]);
                                                if ($clen > 0 && $clen <= 60) {
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                ?>
    <tr>
        <td> </td>
        <td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2">
            <img src="../uploads/profile/<?php echo $image; ?> " height="20px" width="20px" border-radius="50px" />
            <?php echo '<b>' . $user_name . '</b>'; ?>
            <?php echo '<b>' . $user_name2 . '</b>'; ?>
            <?php echo '<b>' . $user_name3 . '</b>'; ?>
            <?php echo $cline1; ?>
        </td>
    </tr>
    <?php
                                                } else if ($clen > 60 && $clen <= 120) {
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                                    $cline2 = substr($comment_data[3], 60, 60);
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
    <?php
                                                } else if ($clen > 120 && $clen <= 180) {
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                                    $cline2 = substr($comment_data[3], 60, 60);
                                                    $cline3 = substr($comment_data[3], 120, 60);
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
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                                    $cline2 = substr($comment_data[3], 60, 60);
                                                    $cline3 = substr($comment_data[3], 120, 60);
                                                    $cline4 = substr($comment_data[3], 180, 60);
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
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                                    $cline2 = substr($comment_data[3], 60, 60);
                                                    $cline3 = substr($comment_data[3], 120, 60);
                                                    $cline4 = substr($comment_data[3], 180, 60);
                                                    $cline5 = substr($comment_data[3], 240, 60);
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
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                                    $cline2 = substr($comment_data[3], 60, 60);
                                                    $cline3 = substr($comment_data[3], 120, 60);
                                                    $cline4 = substr($comment_data[3], 180, 60);
                                                    $cline5 = substr($comment_data[3], 240, 60);
                                                    $cline6 = substr($comment_data[3], 300, 60);
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
                                                    $cline1 = substr($comment_data[3], 0, 60);
                                                    $cline2 = substr($comment_data[3], 60, 60);
                                                    $cline3 = substr($comment_data[3], 120, 60);
                                                    $cline4 = substr($comment_data[3], 180, 60);
                                                    $cline5 = substr($comment_data[3], 240, 60);
                                                    $cline6 = substr($comment_data[3], 300, 60);
                                                    $cline7 = substr($comment_data[3], 360, 60);
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
    </table>
    <?php
                               }       } 
                                ?></div>
</body>

</html>



<script language="javascript" type="text/javascript">
var timeout = setTimeout(reload, 5000);

function reload() {
    $('#links').load('return_comment.php #links', function() {

        $(this).unwrap();


        timeout = setTimeout(reload, 5000);
    });

}
</script>