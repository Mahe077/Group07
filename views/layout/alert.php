<!-- error messages will be print here -->
<div class="error-messages-container">
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'toobig') {
            echo "
                <div class='alert alert-infp alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Info!</strong> The file you have upload is too big.
                </div>";
        } elseif ($_GET['error'] == 'uploadingfailed') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> There is some poblem ,please try again later.
                </div>";
        } elseif ($_GET['error'] == 'invalidfiletype') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> The file type you have uploaded is not valid,please try again.
                </div>";
        } elseif ($_GET['error'] == 'stmtfailed') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> There is some poblem ,please try again later.
                </div>";
        } else if ($_GET['error'] == 'emptyinput') {
            echo "
                    <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> Please fill the required input feilds.
                    </div>";
        } else if ($_GET['error'] == 'invalidBirthday') {
            echo "
                    <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> Please check your birthday.
                    </div>";
        } elseif ($_GET['error'] == 'invalidfName' || $_GET['error'] == 'invalidsName' || $_GET['error'] == 'invalidcity' || $_GET['error'] == 'invaliddistrict') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> Invalid name format ,may include only a-z or A-Z.
                </div>";
        } elseif ($_GET['error'] == 'invalidaddress') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> Invalid address format ,may include only 'a-z A-Z 0-9 - \ / , : . s'
                </div>";
        } elseif ($_GET['error'] == 'invalidusername') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong>  Invalid user name format ,may include only 'a-z A-Z 0-9 @ # $ % & - _ \ /.'
                </div>";
        } elseif ($_GET['error'] == 'invalidnic') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> Invalid NIC format ,pleace check again.
                </div>";
        } elseif ($_GET['error'] == 'invalidPostalCode') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> Must Be Greater than Zero.
                </div>";
        } elseif ($_GET['error'] == 'passwordmissmatch') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> Password miss match ,please try again.
                </div>";
        } elseif ($_GET['error'] == 'usernametaken') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> The  username is already taken ,try a new username.
                </div>";
        } elseif ($_GET['error'] == 'invlidemail') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> This email is already using.Try again later.
                </div>";
        } elseif ($_GET['error'] == 'imageUploadUnsuccess') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> There is a error on image upload Please upload the image again .
                </div>";
        }

        // signin error

        else if ($_GET['error'] == 'wronglogin') {
            echo "
	          <div class='alert alert-danger alert-dismissible popup'>
	              <a style='text-decoration:none;' href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
	              <strong>Danger!</strong> Wrong credentials.
	          </div>";
        } else if ($_GET['error'] == 'createUserSuccess') {
            echo "
	            <div class='alert alert-success alert-dismissible popup'>
	            <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
	            <strong>Success!</strong> Account created , please login.
	            </div>";
        }
        // quatation page
        else if ($_GET['error'] == 'Success') {
            echo "
                <div class='alert alert-success alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Success!</strong> Your request has been successfully sent.
                </div>";
        } elseif ($_GET['error'] == 'invalidName') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> Invalid name format may include only a-z or A-Z.
                </div>";
        } elseif ($_GET['error'] == 'invalidPartNumber') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> Invalid part name format may include only 'a-z A-Z 0-9 - #'
                </div>";
        } elseif ($_GET['error'] == 'invalidbrand') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong>  Invalid part name format may include only 'a-z A-Z 0-9 @ # $ % & - _ \ /.'
                </div>";
        } elseif ($_GET['error'] == 'invalidNumber') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> Amount must be greater than Zero.
                </div>";
        } elseif ($_GET['error'] == 'invalidAccess') {
            echo "
                <div class='alert alert-warning alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                 <strong>Warning!</strong> Please log in.
                </div>";
        } else if ($_GET['error'] == 'loginSuccess') {
            echo "
                <div class='alert alert-success alert-dismissible popup'>
                <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Success!</strong> You have successfully logged in .
                </div>";
        }
    }
    ?>
</div>