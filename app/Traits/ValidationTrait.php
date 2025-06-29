<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Json;
use Throwable;

trait ValidationTrait {
    public function rolesValidationTrait($data) {
        try {
            $rules = [
                // 'category_id' => 'required|exists:categories,id', 
                'name' => 'required|string|max:50',
                'slug' => 'string|max:100|unique:sub_categories,slug,' . $data['id']
            ];
    
            $message = [
                'name.required' => 'The sub category name field is required',
                'name.string' => 'The sub category name must be a string',
                'name.max' => 'The sub category name may not be greater than 50 characters',
                'slug.string' => 'The slug must be a string',
                'slug.max' => 'The slug may not be greater than 100 characters',
                'slug.unique' => 'The slug has already been taken',
            ];
    
            return Validator::make($data, $rules, $message);
    
        } catch(Throwable $th) {
            // Handle error here
        }
    }


    public function loginValidationTrait($data){
        try {
            $rules = [
                'login' => 'required|string',
                'password' => 'required|string|min:5',
            ];

            $customMessages = [
                'login.required' => 'The email or mobile field is required',
                'login.string' => 'The email or mobile must be a valid string',
                'password.required' => 'The password field is required',
                'password.string' => 'The password must be a valid string',
                'password.min' => 'The password must be at least 6 characters',
            ];

            $errors = [];
            foreach ($rules as $field => $ruleString) {
                $ruleArray = explode('|', $ruleString);
                foreach ($ruleArray as $rule) {
                    if ($rule === 'required') {
                        if (!isset($data[$field]) || trim($data[$field]) === '') {
                            $errors[$field] = $customMessages[$field . '.required'] ?? ucfirst($field) . ' is required';
                            break;
                        }
                    }

                    if ($rule === 'string') {
                        if (isset($data[$field]) && !is_string($data[$field])) {
                            $errors[$field] = $customMessages[$field . '.string'] ?? ucfirst($field) . ' must be a valid string';
                            break;
                        }
                    }

                    if (str_starts_with($rule, 'min:')) {
                        $minValue = (int) str_replace('min:', '', $rule);
                        if (isset($data[$field]) && strlen($data[$field]) < $minValue) {
                            $errors[$field] = $customMessages[$field . '.min'] ?? ucfirst($field) . " must be at least $minValue characters";
                            break;
                        }
                    }
                }
            }

            return $errors;

        } catch (Throwable $th) {
            return ['server' => $th->getMessage()];
        }
    }


    public function roleValidationTrait($data) {
        try {
            $rules = [
                'role_name' => 'required|string|max:50',
                // 'permissions' => 'nullable|array',
                // 'permissions.*' => 'string',
            ];

            $message = [
                'role_name.required' => 'The role name field is required',
                'role_name.string' => 'The role name must be a string',
                'role_name.max' => 'The role name may not be greater than 50 characters',
                // 'permissions.array' => 'The permissions must be an array',
                // 'permissions.*.string' => 'Each permission must be a string',
            ];

            return Validator::make($data, $rules, $message);
            
        } catch (Throwable $th) {
        }
    }

    public function roleUpdateValidationTrait($data) {
        try {
            $rules = [
                'role_name' => 'string|max:50',
                'slug' => 'string|max:100|unique:roles,slug,' . $data['id'], 
            ];

            $message = [
                'role_name.string' => 'The role name must be a string',
                'role_name.max' => 'The role name may not be greater than 50 characters',
                'slug.string' => 'The slug must be a string',
                'slug.max' => 'The slug may not be greater than 100 characters',
                'slug.unique' => 'The slug has already been taken',
            ];

            return Validator::make($data, $rules, $message);
            
        } catch (Throwable $th) {
        }
    }

   
}
