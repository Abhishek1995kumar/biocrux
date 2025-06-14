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


    public function rescuerValidationTrait($data) {
        try {
            $rules = [
                'user_id' => 'nullable|numeric|exists:users,id',
                'area_location' => 'nullable|array',
                'area_location.*' => 'numeric|exists:locations,id',
                'animal_type_id' => 'nullable|array',
                // 'animal_type_id.*' => 'numeric|exists:animal_types,id',
                'animal_type_id.*' => 'numeric',
                'name' => 'required|string',
                'phone' => 'required|string|min:10|max:13',
                'email' => 'required|email|max:50',
                'no_of_animal' => 'required|integer|min:1',
                'aadhar_document' => 'required|file|mimes:jpg,png,pdf|max:5120',
                'description' => 'required|string|max:1000',
                'vaccination' => 'nullable|array',
                'vaccination.*' => 'in:1,2,3',
                'volunteering_drives' => 'nullable|numeric',
                'share_details_with_bmc' => 'nullable|numeric',
                'manageable_animal_feed' => 'nullable|numeric|between:1,3',
                'is_agreed' => 'nullable|boolean',
                'disclaimer' => 'nullable|boolean',
            ];
    
            return Validator::make($data, $rules);
        

            // $message = [
            //     // 'user_id.exists' => 'The: enter valid user id',
            //     'user_id.numeric' => 'The: user id is must be numeric',
            //     // 'area_location.exists' => 'The: enter valid area location',
            //     'area_location.numeric' => 'The: area location id is must be numeric !',
            //     'animal_type_id.numeric' => 'The: animal type id is must be numeric !',
            //     'name.required' => 'The: name field is required',
            //     'name.string' => 'The: enter valid name (eg. Abhishek Mishra)',
            //     'email.required' => 'The: email is required',
            //     'email.email' => 'The: valid email is required, email should be email type!',
            //     'email.max' => 'The: email field is must be only 50 character, please try again',
            //     'phone.required' => 'The: phone number is required',
            //     'phone.string' => 'The: phone is invalid',
            //     'phone.min' => 'The: phone is atleast 10 digit',
            //     'phone.max' => 'The: phone is maximum 13 digit',
            //     'animal_care.required' => 'The: animal care field is required',
            //     'animal_care.string' => 'The: animal care field must be alpha character',
            //     'no_of_animal.required' => 'The: number of animal field is required',
            //     'no_of_animal.string' => 'The: number of animal field must be alpha character',
            //     'aadhar_document.required' => 'The: aadhar document field is required',
            //     'aadhar_document.string' => 'The: aadhar document field must be file type',
            //     'description.string' => 'The: description field is invalid',
            //     'description.required' => 'The: description field is required',
            //     'vaccination.numeric' => 'The: vaccination field is invalid',
            //     'vaccination.required' => 'The: vaccination field is required',
            //     'volunteering_drives.required' => 'The: volunteering drives field is required',
            //     'volunteering_drives.numeric' => 'The: volunteering drives field is invalid',
            //     'share_details_with_bmc.required' => 'The: share details with bmc field is required',
            //     'share_details_with_bmc.numeric' => 'The: share details with bmc field is invalid',
            //     'manageable_animal_feed.required' => 'The: manageable animal feed field is required',
            //     'manageable_animal_feed.numeric' => 'The: manageable animal feed field is invalid',
            //     'manageable_animal_feed.between' => 'The: manageable animal feed field is between 1 and 3',
            // ];
        } catch (Throwable $th) {
            errorLog($th->getMessage()); 
            return response()->json(['error' => 'Validation failed!'], 400);
        }
    }

    public function ngoRegiterValidation($data) {
        try {
            $rules = [
                'user_id' => 'nullable|numeric',
                'admin_id' => 'nullable|numeric',
                'pin_code_id' => 'nullable|numeric',
                'area_location' => 'nullable|array',
                'ngo_registration_code' => 'string',
                'ngo_name' => 'required|string',
                'bmc_enlisted' => 'nullable|numeric',
                'ngo_registered' => 'nullable|numeric',
                'is_welfare_board' => 'nullable|numeric',
                'is_charity' => 'string',
                'experience' => 'string',
                'address' => 'string',
                'shelter_available' => 'string',
                'aadhar_document' => 'required|file|mimes:jpg,png,pdf|max:5120',
                'license_document' => 'required|file|mimes:jpg,png,pdf|max:5120',
                'full_name_applicant' => 'string',
                'mobile_applicant' => 'string',
                'email_applicant' => 'string',
                'is_agreed' => 'nullable',
                'disclaimer' => 'nullable',
                'special_in_sterilization' => 'string',
                'special_in_vaccination' => 'string',
                'special_in_rescue' => 'string',
                'collab_with_ngo' => 'string',
                'collab_with_gov_agencies' => 'string',
                'search_name_input' => 'nullable|array',
                'search_name_input.*' => 'string',
                'animal_type_id' => 'nullable|array',
                'animal_type_id.*' => 'string',
                'ngo_contact_full_name' => 'nullable|array',
                'ngo_contact_full_name.*' => 'string',
                'ngo_contact_mobile' => 'nullable|array',
                'ngo_contact_mobile.*' => 'string|max:13',
                'ngo_contact_email' => 'nullable|array',
                'ngo_contact_email.*' => 'string|max:100',
                'ngo_contact_designation' => 'nullable|array',
                'ngo_contact_designation.*' => 'string',
                'shelter_pin_code_id' => 'nullable|array',
                'shelter_pin_code_id.*' => 'string',
                'shelter_address' => 'nullable|array',
                'shelter_address.*' => 'string',
            ];

            $message = [];

            return Validator::make($data, $rules, $message);
        } catch (Throwable $th) {
        }
    }

    public function breederRegiterValidation($data) {
        try {
            $rules = [
                'user_id' => 'nullable|numeric',
                'admin_id' => 'nullable|numeric',
                'animal_type_id' => 'nullable',
                'pin_code_id' => 'nullable',
                'breeder_registration_code' => 'string',
                'name' => 'required|string',
                'mobile' => 'string',
                'email' => 'string',
                'org_name' => 'string',
                'registeration_no' => 'string',
                'experience' => 'string',
                'address' => 'string',
                'is_breeder' => 'string',
                'breeder_reg_no' => 'string',
                'breed_category' => 'nullable|array',
                'breed_category.*' => 'string',
                'dog_category' => 'nullable|array',
                'dog_category.*' => 'string',
                'cat_category' => 'nullable|array',
                'cat_category.*' => 'string',
                'bird_category' => 'nullable|array',
                'bird_category.*' => 'string',
                'small_mammal_category' => 'nullable|array',
                'small_mammal_category.*' => 'string',
                'reptile_category' => 'nullable|array',
                'reptile_category.*' => 'string',
                'interest_in_foster_care' => 'nullable|string',
                'interest_in_boarding_pets' => 'string',
                'interest_in_training_pets' => 'string',
                'sterilization_drive' => 'string',
                'vaccination_drive' => 'string',
                'rescue_drive' => 'string',
                'license_documents' => 'required|file|mimes:jpg,png,pdf|max:5120',
                'aadhar_documents' => 'required|file|mimes:jpg,png,pdf|max:5120',
                'is_agreed' => 'nullable',
                'disclaimer' => 'nullable',
                'request_from' => 'nullable',
                'field_vaccination_drive' => 'nullable',
            ];

            $message = [];

            return Validator::make($data, $rules, $message);
        } catch (Throwable $th) {
        }
    }

    public function petShowRegiterValidation($data) {
        try {
            $rules = [
                'user_id' => 'nullable|numeric',
                'admin_id' => 'nullable|numeric',
                'animal_type_id' => 'nullable|array',
                'animal_type_id.*' => 'string',
                'shop_name' => 'required|string',
                'owner_name' => 'required|string',
                'email' => 'required|email|max:100',
                'mobile' => 'required|string|min:10|max:13',
                'registeration_no' => 'string',
                'experience' => 'string',
                'address' => 'string|max:512',
                'ensuring_health' => 'string',
                'provide_true_info' => 'string',
                'sourced_from_reg_breeder' => 'string',
                'support_ownership' => 'nullable',
                'ensure_documentation' => 'nullable',
                'encourage_adoption' => 'nullable',
                'sterilization_drive' => 'nullable',
                'vaccination_drive' => 'nullable',
                'field_vaccination_drive' => 'nullable',
                'rescue_drive' => 'string',
                'license_documents' => 'required|file|mimes:jpg,png,pdf|max:5120',
                'aadhar_documents' => 'required|file|mimes:jpg,png,pdf|max:5120',
                'is_agreed' => 'nullable',
                'disclaimer' => 'nullable',
                'request_from' => 'nullable',
                'pet_shop_registration_code' => 'nullable',
            ];

            $message = [];

            return Validator::make($data, $rules, $message);
        } catch (Throwable $th) {
        }
    }

    public function privatePetPractionerRegiterValidation($data) {
        try {
            $rules = [
                'user_id' => 'nullable|numeric',
                'admin_id' => 'nullable|numeric',
                'facility_id' => 'nullable|array',
                'facility_id.*' => 'string',
                'full_name' => 'required|string',
                'email' => 'required|email|max:100',
                'contact_no' => 'required|string|min:10|max:13',
                'hospital_contact_no' => 'required|string|max:13',
                'license_no' => 'string',
                'experience' => 'string',
                'hospital_name' => 'string|max:512',
                'location' => 'string',
                'address' => 'string',
                'sterilization' => 'string',
                'vaccination' => 'nullable',
                'emergency_medical_care' => 'nullable',
                'other_services' => 'nullable',
                'sterilization_drive' => 'nullable',
                'vaccination_drive' => 'nullable',
                'emergency_drive' => 'nullable',
                'medical_care_drive' => 'string',
                'awareness_drive' => 'string',
                'avail_for_emergency' => 'string',
                'avail_regular' => 'string',
                'collab_with_ngo' => 'nullable',
                'collab_with_gov_agencies' => 'nullable',
                'license_documents' => 'required|file|mimes:jpg,png,pdf|max:5120',
                'aadhar_documents' => 'required|file|mimes:jpg,png,pdf|max:5120',
                'is_agreed' => 'nullable',
                'disclaimer' => 'nullable',
                'request_from' => 'nullable',
                'private_pet_practioner_registration_code' => 'nullable',
            ];

            $message = [];
            return Validator::make($data, $rules, $message);
        } catch (Throwable $th) {
        }
    }

    public function ambulanceValidation($data) {
        try {
            $rules = [
                // ambulance table validation
                'organization_name' => 'nullable|string',
                'registeration_no' => 'nullable|string',
                'full_name' => 'required|string|max:100',
                'email' => 'required|email|max:100',
                'mobile' => 'required|string|max:13',
                'aadhar_documents' => 'required|file|mimes:jpg,png,pdf|max:5120',
                'license_documents' => 'required|file|mimes:jpg,png,pdf|max:5120',
                'is_volunteering' => 'nullable|boolean',
                'is_agreed' => 'nullable|boolean',
                'disclaimer' => 'nullable|boolean',
                // Contact Details (Array)
                'contact_full_name' => 'nullable|array',
                'contact_full_name.*' => 'string|max:100',
                'contact_email' => 'nullable|array',
                'contact_email.*' => 'email|max:100',
                'contact_mobile' => 'nullable|array',
                'contact_mobile.*' => 'string|max:13',
                // Capacity Details (Array)
                'ambulance_capacity' => 'nullable|array',
                'ambulance_capacity.*' => 'string',
                'ambulance_animal_type' => 'nullable|array',
                'ambulance_animal_type.*' => 'string',
                'ambulance_contact_no' => 'nullable|array',
                'ambulance_contact_no.*' => 'string|max:13',
                'ambulance_emergency_no' => 'nullable|array',
                'ambulance_emergency_no.*' => 'string|max:13',
                'ambulance_cost' => 'nullable|array',
                'ambulance_cost.*' => 'string',
                'ambulance_equipment' => 'nullable|array',
                'ambulance_equipment.*' => 'string',
                'start_time' => 'nullable|array',
                'start_time.*' => 'date_format:H:i',
                'end_time' => 'nullable|array',
                'end_time.*' => 'date_format:H:i',

            ];

            $message = [];

            return Validator::make($data, $rules, $message);
        } catch (Throwable $th) {
        }
    }

    public function raiseGrievenceValidationTrait($data) {

    }



    // Admin Side Validations
    // role Validation
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
    

    // category and subcategory validation 
    public function categoryValidationTrait($data) {
        try {
            $rules = [
                'name' => 'required|string|max:50',
            ];

            $message = [
                'name.required' => 'The category name field is required',
                'name.string' => 'The category name must be a string',
                'name.max' => 'The category name may not be greater than 50 characters',
            ];

            return Validator::make($data, $rules, $message);

        } catch(Throwable $th) {

        }
    }

    public function updateCategoryValidationTrait($data) {
        try {
            $rules = [
                'name' => 'required|string|max:50',
                // 'slug' => 'string|max:100|unique:categories,slug,' . $data['id'], // Ensure unique except for the current record
            ];
    
            $message = [
                'name.required' => 'The category name field is required',
                'name.string' => 'The category name must be a string',
                'name.max' => 'The category name may not be greater than 50 characters',
                // 'slug.string' => 'The slug must be a string',
                // 'slug.max' => 'The slug may not be greater than 100 characters',
                // 'slug.unique' => 'The slug has already been taken',
            ];
    
            return Validator::make($data, $rules, $message);
    
        } catch (Throwable $th) {
            // Handle the exception as needed
        }
    }

    public function subCategoryValidationTrait($data) {
        try {
            $rules = [ 
                'name' => 'required|string|max:100',
            ];
    
            $message = [
                'name.required' => 'The sub category name field is required',
                'name.string' => 'The sub category name must be a string',
                'name.max' => 'The sub category name may not be greater than 50 characters',
            ];
    
            return Validator::make($data, $rules, $message);
    
        } catch(Throwable $th) {
            // Handle error here
        }
    }

    public function updateSubCategoryValidationTrait($data) {
        try {
            $rules = [
                // 'category_id' => 'required|exists:categories,id', 
                'name' => 'required|string|max:50',
                // 'slug' => 'string|max:100|unique:sub_categories,slug,' . $data['id']
            ];
    
            $message = [
                // 'category_id.required' => 'The category name field is required',
                // 'category_id.exists' => 'The category name is not found, please enter valid category name',
                'name.required' => 'The sub category name field is required',
                'name.string' => 'The sub category name must be a string',
                'name.max' => 'The sub category name may not be greater than 50 characters',
                // 'slug.string' => 'The slug must be a string',
                // 'slug.max' => 'The slug may not be greater than 100 characters',
                // 'slug.unique' => 'The slug has already been taken',
            ];
    
            return Validator::make($data, $rules, $message);
    
        } catch(Throwable $th) {
            // Handle error here
        }
    }
   
}
