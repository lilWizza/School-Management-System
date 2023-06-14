<?php

$_SESSION["TID"] = $_GET["id"];
?>
<div class="content">


    <div class="lbox1" style="margin-left: 85%">
        <h3>Add Classes</h3><br>
        <?php
        if (isset($_POST["submit"])) {

            $sq = "insert into hclass(TID,CLA,SEC,SUB) values (" . $_GET["id"] . ",'{$_POST["cla"]}','{$_POST["sec"]}','{$_POST["sub"]}')";
            $result = $db->query($sq);
            if ($result) {

                echo "<div class='success'>Insert Success..</div>";
                echo "<script>window.open('view_staff.php?mes=Inserted Successfully','_self');</script>";
            } else {
                echo "<div class='error'>Insert Failed..</div>";
            }
        }


        ?>


        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?id=" . $_GET["id"]; ?>">

            <label>Class</label><br>

            <select name="cla" required class="input3">
                <?php
                $sl = "select DISTINCT(CNAME) from class";
                $r = $db->query($sl);
                if ($r->num_rows > 0) {
                    echo "<option value=''>Select</option>";
                    while ($ro = $r->fetch_assoc()) {
                        echo "<option value='{$ro["CNAME"]}'>{$ro["CNAME"]}</option>";
                    }
                }


                ?>

            </select>

            <br><br>

            <label>Section</label><br>

            <select name="sec" required class="input3">
                <?php
                $sl = "select DISTINCT(CSEC) from class";
                $r = $db->query($sl);
                if ($r->num_rows > 0) {
                    echo "<option value=''>Select</option>";
                    while ($ro = $r->fetch_assoc()) {
                        echo "<option value='{$ro["CSEC"]}'>{$ro["CSEC"]}</option>";
                    }
                }




                ?>


            </select><br></br>



            <label>Subject</label><br>

            <select name="sub" required class="input3">
                <?php
                $s = "select * from sub";
                $re = $db->query($s);
                if ($re->num_rows > 0) {
                    echo "<option value=''>Select</option>";
                    while ($r = $re->fetch_assoc()) {
                        echo "<option value='{$r["SNAME"]}'>{$r["SNAME"]}</option>";
                    }
                }


                ?>
            </select>

            <br><br>

            <button type="submit" class="btn" name="submit">Assign Class</button>
        </form>
    </div>
</div>
