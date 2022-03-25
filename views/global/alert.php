<!-- error messages will be print here -->
<?php
if (isset($_SESSION['error'])) {
     if ($_SESSION['error'] == 'toobig') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-info alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Info!</strong> The file you have upload is too big.
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'uploadingfailed') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> There is some poblem ,please try again later.
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'invalidfiletype') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> The file type you have uploaded is not valid,please try again.
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'stmtfailed') {
          echo "
          <div class='floating-container'>
               div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> There is some poblem ,please try again later.
               </div>
          </div>";
     } else if ($_SESSION['error'] == 'emptyinput') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> Please fill the required input feilds.
               </div>
          </div>";
     } else if ($_SESSION['error'] == 'invalidBirthday') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> Please check your birthday.
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'invalidfName' || $_SESSION['error'] == 'invalidsName' || $_SESSION['error'] == 'invalidcity' || $_SESSION['error'] == 'invaliddistrict') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> Invalid name format ,may include only a-z or A-Z.
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'invalidaddress') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> Invalid address format ,may include only 'a-z A-Z 0-9 - \ / , : . s'
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'invalidusername') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong>  Invalid user name format ,may include only 'a-z A-Z 0-9 @ # $ % & - _ \ /.'
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'invalidnic') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> Invalid NIC format ,pleace check again.
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'invalidPostalCode') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> Must Be Greater than Zero.
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'passwordmissmatch') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> Password miss match ,please try again.
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'usernametaken') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> The  username is already taken ,try a new username.
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'invlidemail') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> This email is already using.Try again later.
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'imageUploadUnsuccess') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> There is a error on image upload Please upload the image again .
               </div>
          </div>";
     }

     // signin error
     else if ($_SESSION['error'] == 'wronglogin') {
          echo "
          <div class='floating-container'>
	          <div class='alert alert-danger alert-dismissible popup'>
	               <a  href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
	               <strong>Danger!</strong> Wrong credentials.
	          </div>
          </div>";
     } else if ($_SESSION['error'] == 'createUserSuccess') {
          echo "
          <div class='floating-container'>
	          <div class='alert alert-success alert-dismissible popup'>
	               <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
	               <strong>Success!</strong> Account created , please login.
	          </div>
          </div>";
     }
     // quatation page
     else if ($_SESSION['error'] == 'Success') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-success alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong> Your request has been successfully sent.
               </div>
          </div>";
     } else if ($_SESSION['error'] == 'UnSuccess') {
          echo "
               <div class='floating-container'>
                    <div class='alert alert-warning alert-dismissible popup'>
                         <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                         <strong>Warning!</strong> Your request was unsuccess .
                    </div>
               </div>";
     } elseif ($_SESSION['error'] == 'invalidName') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                     <strong>Warning!</strong> Invalid name format may include only a-z or A-Z.
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'invalidPartNumber') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                     <strong>Warning!</strong> Invalid part name format may include only 'a-z A-Z 0-9 - #'
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'invalidbrand') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                     <strong>Warning!</strong>  Invalid part name format may include only 'a-z A-Z 0-9 @ # $ % & - _ \ /.'
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'invalidNumber') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                     <strong>Warning!</strong> Amount must be greater than Zero.
               </div>
          </div>";
     } elseif ($_SESSION['error'] == 'invalidAccess') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                     <strong>Warning!</strong> Please log in.
              </div>
          </div>";
     } else if ($_SESSION['error'] == 'loginSuccess') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-success alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong> You have successfully logged in .
               </div>
          </div>";
     } else if ($_SESSION['error'] == 'invalidAccess2') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                     <strong>Warning!</strong> Invalid access ! Please try again .
              </div>
          </div>";
     } else if ($_SESSION['error'] == 'UpdateSuccess') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-success alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong> You have updated your details successfully .
              </div>
          </div>";
     } else if ($_SESSION['error'] == 'UpdateUnsuccess') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> You have not updated your details successfully .
              </div>
          </div>";
     } else if ($_SESSION['error'] == 'MsgSended') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-success alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong> You have send the message successfully .
              </div>
          </div>";
     } else if ($_SESSION['error'] == 'MsgNotSended') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> message send unsuccessfully .
              </div>
          </div>";
     } elseif ($_SESSION['error'] == 'invalidstrinWithNumber') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> Invalid string format ,may include only 'a-z A-Z 0-9 - \ / , : . s'
               </div>
          </div>";
     } else if ($_SESSION['error'] == 'ReviewSuccess') {
          echo "
          <div class='floating-container'>
          <div class='alert alert-success alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong> You have successfully reviewed the item ,Thank you.
              </div>
          </div>";
     }else if ($_SESSION['error'] == 'Noitem') {
          echo "
          <div class='floating-container'>
               <div class='alert alert-info alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Info!</strong> The order id you have enter is invalid,Please enter valid order id.
               </div>
          </div>";
     }else if ($_SESSION['error'] == 'ReturnreqSuccess') {
          echo "
          <div class='floating-container'>
          <div class='alert alert-success alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong> You have successfully submit the return request,Sorry for the inconvenience.
              </div>
          </div>";
     }else if ($_SESSION['error'] == 'Cancel_order_Accepted') {
          echo "
          <div class='floating-container'>
          <div class='alert alert-success alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong> Cancel order accepted.
              </div>
          </div>";
     }else if ($_SESSION['error'] == 'Cancel_order_Rejected') {
          echo "
          <div class='floating-container'>
          <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> Cancel order rejected .
              </div>
          </div>";
     }
     
     
}

$_SESSION['error'] = "";
?>