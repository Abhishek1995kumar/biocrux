<?php 

use App\Models\Admin\Admin;
const ACTIVE   = 1;
const DEACTIVE = 2;
const PENDING  = 3;
const REJECTED = 4;

// Name Decrapted
// function admin_name($data){
//     $data = Admin::where('id', $data->id)->first();
//     $name = secure($data->name, 'D');
//     return $name;
// };
// function admin_lname($data){
//     $data = Admin::where('id', $data->id)->first();
//     $lname = secure($data->lname, 'D');
//     return $lname;
// };
// function admin_username($data){
//     $data = Admin::where('id', $data->id)->first();
//     $username = secure($data->username, 'D');
//     return $username;
// };
// function admin_phone($data){
//     $data = Admin::where('id', $data->id)->first();
//     $phone = secure($data->phone, 'D');
//     return $phone;
// };
// function admin_pincode($data){
//     $data = Admin::where('id', $data->id)->first();
//     $pincode = secure($data->pincode, 'D');
//     return $pincode;
// };
// function admin_address($data){
//     $data = Admin::where('id', $data->id)->first();
//     $address = secure($data->address, 'D');
//     return $address;
// };
// function admin_aadhar_card($data){
//     $data = Admin::where('id', $data->id)->first();
//     $aadhar_card = secure($data->aadhar_card, 'D');
//     return $aadhar_card;
// };
// function admin_id_proof($data){
//     $data = Admin::where('id', $data->id)->first();
//     $id_proof = secure($data->id_proof, 'D');
//     return $id_proof;
// };
// function admin_addressproof($data){
//     $data = Admin::where('id', $data->id)->first();
//     $addressproof = secure($data->addressproof, 'D');
//     return $addressproof;
// };
// function admin_landmark($data){
//     $data = Admin::where('id', $data->id)->first();
//     $landmark = secure($data->landmark, 'D');
//     return $landmark;
// };

function fileUpload($data, $path) {
    
}
