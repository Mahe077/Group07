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
     } elseif ($_SESSION['error'] == 'ReviewSuccess') {
          echo "
          <div class='floating-container'>
          <div class='alert alert-success alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong> You have successfully reviewed the item ,Thank you.
              </div>
          </div>";
     }elseif ($_SESSION['error'] == 'Noitem') {
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
     elseif ($_SESSION['error'] == 'Delivery_assigned_succesfully') {
          echo "
          <div class='floating-container'>
          <div class='alert alert-success alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong>Delivery assigned succesfully.
              </div>
          </div>";
     }
     elseif ($_SESSION['error'] == "Delivery_assign_failed") {
               echo "
               <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                         <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                         <strong>Warning!</strong>Delivery assigned unsuccessfully.
                   </div>
               </div>";
          }
     elseif ($_SESSION['error'] == "Stock_update_successfully") {
               echo "
               <div class='floating-container'>
               <div class='alert alert-success alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Success!</strong>stock update succesfully.
              </div>
          </div>";
          }
     elseif ($_SESSION['error'] == "Stock_update_failed") {
          echo "
          <div class='floating-container'>
               <div class='alert alert-warning alert-dismissible popup'>
                    <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Warning!</strong> stock update unsuccessfully .
              </div>
          </div>";
          }
          elseif ($_SESSION['error'] == "Ask_stocks_succesfully") {
               echo "
               <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                         <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                         <strong>Success!</strong> stock requested successfully .
                   </div>
               </div>";
               }
          elseif ($_SESSION['error'] == "Ask_stocks_fialed") {
               echo "
               <div class='floating-container'>
                    <div class='alert alert-warning alert-dismissible popup'>
                         <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                         <strong>Warning!</strong> stock requested unsuccessfully .
                    </div>
               </div>";
               }
          elseif ($_SESSION['error'] == "item_inserted_succesfully") {
               echo "
               <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                         <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                         <strong>Success!</strong> item inserted successfully .
                    </div>
               </div>";
               }
          elseif ($_SESSION['error']== "item_inserted_failed") {
               echo "
               <div class='floating-container'>
                    <div class='alert alert-warning alert-dismissible popup'>
                         <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                         <strong>Warning!</strong> item inserted unsuccessfully .
                    </div>
               </div>";
               }
               elseif ($_SESSION['error'] == "password_reset_succesfully") {
                    echo "
                    <div class='floating-container'>
                         <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> password reset succesfully .
                         </div>
                    </div>";
                    }
               elseif ($_SESSION['error']== "password_reset_failed") {
                    echo "
                    <div class='floating-container'>
                         <div class='alert alert-warning alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Warning!</strong> password reset failed .
                         </div>
                    </div>";
                    }
               elseif (  $_SESSION['error'] == "reset_passwordmissmatch") {
                    echo "
                    <div class='floating-container'>
                         <div class='alert alert-warning alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Warning!</strong> reset password missmatch .
                         </div>
                    </div>";
                    }
               elseif ($_SESSION['error'] == "Password_updated_Success") {
                    echo "
                    <div class='floating-container'>
                         <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> password updated succesfully .
                         </div>
                    </div>";
               }else if ($_SESSION['error'] == 'Pending_order_Accepted') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Pending order accepted.
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'Pending_order_Rejected') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-warning alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Warning!</strong> Pending order rejected .
                        </div>
                    </div>";
               }
               else if ($_SESSION['error'] == 'New_order_Accepted') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> New order accepted.
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'New_order_Rejected') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-warning alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Warning!</strong> New order rejected .
                        </div>
                    </div>";
               } else if ($_SESSION['error'] == 'Return_order_Accepted') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Return order accepted.
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'Return_order_Rejected') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-warning alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Warning!</strong> Return order rejected .
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'Product_list_deleted') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Product removed.
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'insert_item') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Item inserted.
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'Category_list_deleted') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Category removed.
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'Category_item') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Category inserted.
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'Stockmanager_deleted') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Stockmanager removed.
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'Stockmanager_item') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Stockmanager inserted.
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'Quotation_accepted') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Quotation accepted.
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'Quotation_rejected') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Quotation rejected.
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'updated_success') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Updated the user account.
                        </div>
                    </div>";
               }else if ($_SESSION['error'] == 'Stock_delete') {
                    echo "
                    <div class='floating-container'>
                    <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Stock manager deleted.
                        </div>
                    </div>";
               }elseif ($_SESSION['error'] == "Verification_mail_sent_succesfully") {
                    echo "
                    <div class='floating-container'>
                         <div class='alert alert-success alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Success!</strong> Verification_mail_sent_succesfully .
                         </div>
                    </div>";
               }elseif ($_SESSION['error']== "Verification_mail_sent_failed") {
                    echo "
                    <div class='floating-container'>
                         <div class='alert alert-warning alert-dismissible popup'>
                              <a href='#'  class='remove-alert' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Warning!</strong> Verification mail sent failed .
                         </div>
                    </div>";
                    }
}
$_SESSION['error'] = "";
?>