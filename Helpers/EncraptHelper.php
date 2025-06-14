<?php 

if(!function_exists('secure')) {
    function secure($key, $value) {
        try {
            if (empty($key)) {
                return null;
            }

            if (empty($value)) {
                return null; 
            }

            $encode = "";

        } catch(Throwable $th) {
            // Handle any exceptions that occur during encryption
            return null; // or handle as needed
        }
    }
}


