
<?php 
    include "nurseryReapplicationInsert.php";
    
  
    if (!isset($_SESSION['phone'])) {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certification Reapplication</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        include '../connection.php';
        $app_id = $_GET['id'];
        $sql_id = "SELECT * FROM nursery NATURAL JOIN nursery_details NATURAL JOIN applications 
                WHERE applications.application_id = $app_id
                AND nursery_details.nursery_id = applications.application_id";
        $result_id = $conn->query($sql_id);
        $result_id_assoc = $result_id->fetch_assoc();
    ?>
    <div class="nursery header">
        <h2>Certification Reapplication</h2>
    </div>
    <div class="nurseryReg">
        <?php include("errors.php");?>
    </div>
   <script src="../js/app.js"></script>
    <form class="nursery" method="POST" action="nurseryReapplication.php">
    <div style="float: left;" class="formDivide">
        <div class="input-group">
            <label>KFS Registration Number</label>
            <input class="disabled" type="text" name="kfsreg_num" value="<?php echo $result_id_assoc['kfsreg_num']; ?>" required readonly>
        </div>
        <!-- <div class="input-group">
            <label>KEFRIS Registration Number</label>
            <input type="text" name="kefris_num" required>
        </div> -->
        <div class="input-group">
            <label>Nursery Name</label>
            <input type="text" name="nurseryname" value="<?php echo $result_id_assoc['nursery_name']; ?>"required>
        </div>
        <div class="input-group">
            <label>Manager/Supervisor</label>
            <input type="text" name="manager" value="<?php echo $result_id_assoc['manager']; ?>"required>
        </div>
        <div class="input-group">
            <label>address</label>
            <input type="text" name="address" value="<?php echo $result_id_assoc['address']; ?>"required>
        </div>
        <div class="input-group">
            <label>email</label>
            <input type="email" name="address" value="<?php echo $result_id_assoc['email']; ?>"required>
        </div>
        <div class="input-group">
            <label>phone</label>
            <input type="text" name="address" value="<?php echo $result_id_assoc['phone']; ?>"required readonly>
        </div>
        <div class="input-group">
            <label>Year of Establishment</label>
            <input class="disabled" type="date" name="YoE" value="<?php echo $result_id_assoc['established']; ?>"required readonly>
        </div>
        </div>
        <div style="float: right;" class="formDivide">
        <div class="input-group">
            <label>County</label>
            <input class="disabled" type="text" name="county" value="<?php echo $result_id_assoc['county']; ?>"required readonly>
        </div>
        <div class="input-group">
            <label>Subcounty</label>
            <input class="disabled" type="text" name="subcounty" value="<?php echo $result_id_assoc['subcounty']; ?>"required readonly>
        </div>
        <div class="input-group">
            <label>Ward</label>
            <input class="disabled" type="text" name="ward" value="<?php echo $result_id_assoc['ward']; ?>"required readonly>
        </div>
       <div class="input-group">
            <label>Seed Source</label>
            <input type="text" name="seedsource" value="<?php echo $result_id_assoc['seedsource']; ?>"required>
        </div>
        <!-- <div class="input-group">
            <label>Seedling Capacity</label>
            <input type="text" name="capacity" placeholder="" required>
        </div> -->
        <div class="input-group option">
            <label for="category">Category</label>
            <select name="category" id="category" required>
                <option value="" selected hidden disabled><?php echo $result_id_assoc['category']; ?></option>
                <optgroup label="Non-commercial (No sale of seedlings)">
                    <option value="private">
                        Private
                    </option>
                </optgroup>
                <optgroup label="Non-commercial (e.g schools)">
                    <option value="public">
                        Public
                    </option>
                </optgroup>
                <optgroup label="All nurseries that sell seedlings">
                    <option value="commercial">
                        Commercial 
                    </option>
                </optgroup>
            </select>
            <!-- <select name="category" id="cat">
                <optgroup label="No sale of seedlings">
                    <option value="private non-commercial">
                        Private non-commercial
                    </option>
                </optgroup>
               <optgroup label="E.g Schools">
                    <option value="public non-commercial">
                        Public non-commercial
                    </option>
               </optgroup>
                <optgroup label="All nurseries that sell seedlings">
                    <option value="commercial">
                        Commercial
                    </option>
                </optgroup>
            </select> -->
            
        </div>
        <div class="input-group option last">
            <label for="capacity">Production Capacity</label>
            <select name="capacity" id="capacity" required>
            <option value="" selected hidden disabled><?php echo $result_id_assoc['capacity']; ?></option>
                <optgroup label="Commercial and individual nursery with output below 5,000 seedlings">
                    <option value="minimum">
                        Below 5,000
                    </option>
                </optgroup>
                <optgroup label="Commercial and individual nursery with output of 5,000 - 500,000 seedlings">
                    <option value="small scale">
                        Small scale
                    </option>
                </optgroup>
                <optgroup label="Tree nursery with output of over 501,000 - 1,000,000 seedlings">
                    <option value="medium scale">
                        Medium scale
                    </option>
                </optgroup>
                <optgroup label="Commercial tree nursery with output of over 1,000,000 seedlings">
                    <option value="large scale">
                        Large scale 
                    </option>
                </optgroup>
            </select>
        </div>
        <div class="input-group btn">
            <button class="btn" type="submit" name="reg_nursery">Apply</button>
        </div>
        </div>
        <div style="clear: both"></div>
        <div>
        <p class="sec nursery">
                 <a href="../userProfileV2.php">Cancel</a>  
        </p>
        </div>
    </form>
</body>
</html>