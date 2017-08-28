<form action="" method="POST" enctype="multipart/form-data">
    <table>
        <input type="text" name="type" id="type" style="display:none;" value="company">
        <tr>
            <td>Email:</td>
            <td>
                <input type="text" name="email" id="email" value="<?php echo $_POST['email']?>">
                <?php if(isset($_POST['emailError'])){ echo $_POST['emailError']; } ?>
            </td>
        </tr>
        <tr>
            <td>First Name:</td>
            <td>
                <input type="text" name="fName" id="fName" value="<?php echo $_POST['fName']?>">
                <?php if(isset($_POST['fNameError'])){ echo $_POST['fNameError']; } ?>
            </td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td>
                <input type="text" name="lName" id="lName" value="<?php echo $_POST['lName']?>">
                <?php if(isset($_POST['lNameError'])){ echo $_POST['lNameError']; } ?>
            </td>
        </tr>
        <tr>
            <td>
                </br>
            </td>
        </tr>
        <tr>
            <td>
                </br>
            </td>
        </tr>
        <tr>
            <td>Name:</td>
            <td>
                <input type="cName" name="cName" id="cName" value="<?php echo $_POST['cName']?>">
                <?php if(isset($_POST['cNameError'])){ echo $_POST['cNameError']; } ?>
            </td>
        </tr>
        <tr>
            <td>Telephone Number:</td>
            <td>
                <input type="tel" name="tel" id="tel" value="<?php echo $_POST['tel']?>">
                <?php if(isset($_POST['telError'])){ echo $_POST['telError']; } ?>
            </td>
        </tr>
        <tr>
            <td>City:</td>
            <td>
                <input type="text" name="city" id="city" value="<?php echo $_POST['city']?>">
                <?php if(isset($_POST['cityError'])){ echo $_POST['cityError']; } ?>
            </td>
        </tr>
        <tr>
            <td>Street:</td>
            <td>
                <input type="text" name="street" id="street" value="<?php echo $_POST['street']?>">
                <?php if(isset($_POST['streetError'])){ echo $_POST['streetError']; } ?>
            </td>
        </tr>
        <tr>
            <td>Postalcode:</td>
            <td>
                <input type="text" name="postal" id="postal" value="<?php echo $_POST['postal']?>">
                <?php if(isset($_POST['postalError'])){ echo $_POST['postalError']; } ?>
            </td>
        </tr>
        <tr>
            <td>Choose an avatar:</td>
            <td>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </td>
        </tr>
        <tr>    
            <td>
                </br>
            </td>
        </tr>
        <tr>
            <td>
                </br>
            </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td>
                <input type="password" name="password" id="password">
                <?php if(isset($_POST['passwordError'])){ echo $_POST['passwordError']; } ?>
            </td>
        </tr>
        <tr>
            <td>Confirm password:</td>
            <td>
                <input type="password" name="password2" id="password2">
                <?php if(isset($_POST['password2Error'])){ echo $_POST['password2Error']; } ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><?php if(isset($_POST['confirmedError'])){ echo $_POST['confirmedError']; } ?></td>
        </tr>
        <tr>
            <td>
                </br>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Register"></td>
        </tr>
    </table>
</form>

