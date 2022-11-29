<?php

function validate_first_name($POST){
    if(!isset($POST['fn'])){
        return false;
    }else if(strlen(trim($POST['fn']))<1){
        return false;
    }
    return true;
}

function validate_last_name($POST){
    if(!isset($POST['ln'])){
        return false;
    }else if(strlen(trim($POST['ln']))<1){
        return false;
    }
    return true;
}

function validate_email($POST){
    // Remove all illegal characters from email
    $email = filter_var($POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Separate string by @ characters (there should be only one)
        $parts = explode('@', $email);

        // Remove and return the last part, which should be the domain
        $domain = array_pop($parts);

        // Check if the domain is WMSU
        if (strcmp(strtolower($domain), 'wmsu.edu.ph') != 0)
        {
            return false;
        }
    } else {
        return false;
    }
    return true;
}

function validate_rank($POST){
    if(!isset($POST['rank'])){
        return false;
    }else if(strcmp($POST['rank'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_department($POST){
    if(!isset($POST['department'])){
        return false;
    }else if(strcmp($POST['department'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_role($POST){
    if(!isset($POST['role'])){
        return false;
    }
    return true;
}

function validate_add_faculty($POST){
    if(!validate_first_name($POST) || !validate_last_name($POST) || !validate_email($POST) ||
     !validate_rank($POST) || !validate_department($POST) || !validate_role($POST)){
        return false;
     }
    return true;
}

function validate_program_code($POST){
    if(!isset($POST['code'])){
        return false;
    }else if(strlen(trim($POST['code']))<1){
        return false;
    }
    return true;
}

function validate_program_code_duplicate($POST){
    if(!isset($POST['code'])){
        return false;
    }
    elseif(isset($POST['old-code'])){
        if(strcmp(strtolower($POST['code']), strtolower($POST['old-code'])) == 0){
            return true;
        }else{
            $program = new Program();
            foreach ($program->show() as $value){
                if(strcmp(strtolower($value['code']), strtolower($POST['code'])) == 0){
                    return false;
                }
            }
        }
    }else{
        $program = new Program();
        foreach ($program->show() as $value){
            if(strcmp(strtolower($value['code']), strtolower($POST['code'])) == 0){
                return false;
            }
        }
    }
    return true;
}

function validate_program_desc($POST){
    if(!isset($POST['description'])){
        return false;
    }else if(strlen(trim($POST['description']))<1){
        return false;
    }
    return true;
}

function validate_level($POST){
    if(!isset($POST['level'])){
        return false;
    }else if(strcmp($POST['level'], 'None') == 0){
        return false;
    }
    return true;
}

function validate_cet($POST){
    if(!isset($POST['cet'])){
        return false;
    }else if($POST['cet'] < 55){
        return false;
    }
    return true;
}

function validate_status($POST){
    if(!isset($POST['status'])){
        return false;
    }
    return true;
}

function validate_add_program($POST){
    if(!validate_program_code($POST) || !validate_program_desc($POST) || !validate_cet($POST) ||
     !validate_level($POST) || !validate_status($POST) || !validate_program_code_duplicate($POST)){
        return false;
     }
    return true;
}

function validate_signup_first_name($POST){
    if(!isset($POST['firstname'])){
        return false;
    }else if(strlen(trim($POST['firstname']))<1){
        return false;
    }
    return true;
}

function validate_signup_last_name($POST){
    if(!isset($POST['lastname'])){
        return false;
    }else if(strlen(trim($POST['lastname']))<1){
        return false;
    }
    return true;
}

function validate_signup_username($POST){
    if(!isset($POST['username'])){
        return false;
    }else if(strlen(trim($POST['username']))<1){
        return false;
    }
    return true;
}

function validate_username_duplicate($POST){
    if(!isset($POST['username'])){
        return false;
    }
    elseif(isset($POST['old_username'])){
        if(strcmp(strtolower($POST['username']), strtolower($POST['old_username'])) == 0){
            return true;
        }else{
            $accounts = new Accounts();
            foreach ($accounts->show() as $value){
                if(strcmp(strtolower($value['username']), strtolower($POST['username'])) == 0){
                    return false;
                }
            }
        }
    }else{
        $accounts = new Accounts();
        foreach ($accounts->show() as $value){
            if(strcmp(strtolower($value['username']), strtolower($POST['username'])) == 0){
                return false;
            }
        }
    }
    return true;
}

function validate_signup_password($POST){
    if(!isset($POST['password'])){
        return false;
    }else if(strlen(trim($POST['password']))<1){
        return false;
    }
    return true;
}

function validate_signup($POST){
    if(!validate_signup_first_name($POST) || !validate_signup_last_name($POST) || !validate_signup_username($POST) || !validate_signup_password($POST) || !validate_username_duplicate($POST)){
        return false;
     }
    return true;
}

?>