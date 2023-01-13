<?php

class FormValidation
{
       /**
     * make sure email is unique
     */
    public static function checkEmailUniqueness($email)
    {
       $user = DB::connect()->select(
            'SELECT * FROM users WHERE email = :email',
            [
                'email' => $email
            ]
        );
        //if user with the same email already exists
        if ($user)
        {
            return 'Email is already in-use';
        }
        return false;
    }


    public static function validate($data, $rules = [])
    {
        $error = false;

        //do all the form validation
        foreach($rules as $key => $condition)
        {
            switch($condition)
            {
                case 'required':
                    if(empty($data[$key]))
                    {
                        $error .= ''. $key . '  is empty<br />  ';
                    }
                    break;
                //make sure password is not empty and also more than 8 characters
                case 'password_check':
                    if(empty($data[$key]))
                    {
                        $error .= ''. $key . '  is empty<br />  ';
                    } 
                    else if (strlen($data[$key]) < 8)
                    {
                        $error .= 'Password should be atleast 8 characters<br />';
                    }
                    break;
                // make sure password matches
                case 'is_password_match':
                    if ( $data['password'] !== $data['confirm_password'] ) {
                        $error .= 'Password do not match<br />';
                    }
                    break;
                //make sure the email is valid
                case 'email_check':
                    if(!filter_var($data[$key], FILTER_VALIDATE_EMAIL))
                    {
                        $error .= "Email provided is invalid<br />";
                    }
                    break;
                            // make sure login form csrf token is match
                case 'login_form_csrf_token':
                    // $data[$key] is $_POST['csrf_token'];
                    if ( !CSRF::verifyToken( $data[$key], 'login_form' ) ) {
                        $error .= "Invalid CSRF Token<br />";
                    }
                    break;
                // make sure signup form csrf token is match
                case 'signup_form_csrf_token':
                    // $data[$key] is $_POST['csrf_token'];
                    if ( !CSRF::verifyToken( $data[$key], 'signup_form' ) ) {
                        $error .= "Invalid CSRF Token<br />";
                    }
                    break;
                case 'edit_user_form_csrf_token':
                    // $data[$key] is $_POST['csrf_token'];
                    if ( !CSRF::verifyToken( $data[$key], 'edit_user_form' ) ) {
                        $error .= "Invalid CSRF Token<br />";
                    }
                    break;
                case 'add_user_form_csrf_token':
                    // $data[$key] is $_POST['csrf_token'];
                    if ( !CSRF::verifyToken( $data[$key], 'add_user_form' ) ) {
                        $error .= "Invalid CSRF Token<br />";
                    }
                    break;
                case 'delete_user_form_csrf_token':
                    // $data[$key] is $_POST['csrf_token'];
                    if ( !CSRF::verifyToken( $data[$key], 'delete_user_form' ) ) {
                        $error .= "Invalid CSRF Token<br />";
                    }
                    break;
                case 'edit_post_form_csrf_token':
                    // $data[$key] is $_POST['csrf_token'];
                    if ( !CSRF::verifyToken( $data[$key], 'edit_post_form' ) ) {
                        $error .= "Invalid CSRF Token<br />";
                    }
                    break;
                case 'add_post_form_csrf_token':
                    // $data[$key] is $_POST['csrf_token'];
                    if ( !CSRF::verifyToken( $data[$key], 'add_post_form' ) ) {
                        $error .= "Invalid CSRF Token<br />";
                    }
                    break;
            }
        }
        return $error;
    }
}