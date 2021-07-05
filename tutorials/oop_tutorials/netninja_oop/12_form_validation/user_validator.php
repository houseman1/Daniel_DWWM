<?php

// Create a user validator class to handle validation.
// Create a constructor which takes POST data from the form.
// Check required "fields to check" are present in the data.
// Create methods to validate individual fields.
// Create a method to validate a username.
// Return an error array once all checks are done.

class UserValidator
{
    // '$fields' is static so that, if we need to, we can check
    // which fields are necessary in the post data (using UserValidator::$fields)
    // before we create an instance.
    private $data;
    private $errors = [];
    private static $fields = ['username', 'email'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    // The 'validate_form()' function checks if the fields exist on the form.
    // Then, if they do, it calls two private functions to validate each field.
    // The 'array_key_exists()' function checks an array for a specified key,
    // and returns true if the key exists and false if the key does not exist.
    // syntax: array_key_exists(key, array)
    // The 'trigger_error()' function creates a user-level error message.
    public function validate_form()
    {
        foreach(self::$fields as $field)
        {
            if(!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validate_username();
        $this->validate_email();
        return $this->errors;
    }


    private function validate_username()
    {
        $val = trim($this->data['username']);

        if(empty($val))
        {
            $this->add_error('username', 'username cannot be empty');
        } else
        {
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val))
            {
                $this->add_error('username', 'username must be 6-12 characters and alphanumeric');
            }
        }
    }

    private function validate_email()
    {
        $val = trim($this->data['email']);

        if(empty($val))
        {
            $this->add_error('email', 'email cannot be empty');
        } else
        {
            if(!filter_var($val, FILTER_VALIDATE_EMAIL))
            {
                $this->add_error('email', 'email must be a valid email');
            }
        }
    }

    private function add_error($key, $val)
    {
        $this->errors[$key] = $val;
    }
}

?>