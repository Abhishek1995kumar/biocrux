<?php

namespace App\Traits;

use Exception;
use Pusher\Pusher;
use App\Models\Log;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

trait CommonFunctionTrait {
    // Start Admin side query
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // image Upload
        function uploadFileTraits($request, $fieldName, $uploadpath) {
            if ($request->hasFile($fieldName)) {
                $file = $request->file($fieldName);
                $name = time() . '-' . $fieldName . '-' . $file->getClientOriginalName();
                $file->move($uploadpath, $name);
                chmod($uploadpath . '/' . $name, 0777);
                // Create relative web path with forward slashes
                $relativePath = 'uploads/' . $name;

                return $relativePath;
            } else {
                return null;
            }
        }

        function updateUploadFileTrait($request, $fieldName, $uploadpath, $oldImage) {
            if ($request->hasFile($fieldName)) {
                $file = $request->file($fieldName);
                $name = time() . '-' . $fieldName . '-' . $file->getClientOriginalName();
                $imagePath = $uploadpath . '/' . $name;
                $file->move($uploadpath, $name);
                chmod($uploadpath . '/' . $name, 0777);
                $relativePath = 'uploads/' . $name;
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
                return $relativePath;
            } else {
                $removeImage = $fieldName . '_remove';
                if ($request->$removeImage == 1) {
                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                    return null;
                } else {
                    return $oldImage;
                }
            }
        }

        // public function updateUploadFileTrait1($request, $fieldName, $uploadPath, $oldImage = null, $multiple = false, $generateThumb = false) {
        //     $uploadPath = public_path($uploadPath); // e.g., 'uploads/subbotler'
        //     if (!File::exists($uploadPath)) {
        //         File::makeDirectory($uploadPath, 0777, true);
        //     }

        //     $savedPaths = [];

        //     if ($multiple && $request->hasFile($fieldName)) {
        //         foreach ($request->file($fieldName) as $file) {
        //             $name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        //             $file->move($uploadPath, $name);
        //             chmod($uploadPath . '/' . $name, 0777);
        //             $relativePath = 'uploads/' . $name;
        //             $savedPaths[] = $relativePath;

        //             if ($generateThumb) {
        //                 $this->generateThumbnail($uploadPath . '/' . $name, $uploadPath . '/thumbs/' . $name);
        //             }
        //         }

        //         // Delete old files
        //         if (!empty($oldImage)) {
        //             foreach ((array)$oldImage as $old) {
        //                 $this->safeDelete($old);
        //             }
        //         }

        //         return $savedPaths;
        //     }

        //     if ($request->hasFile($fieldName)) {
        //         $file = $request->file($fieldName);
        //         $name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        //         $file->move($uploadPath, $name);
        //         chmod($uploadPath . '/' . $name, 0777);
        //         $relativePath = 'uploads/' . $name;

        //         if ($generateThumb) {
        //             $this->generateThumbnail($uploadPath . '/' . $name, $uploadPath . '/thumbs/' . $name);
        //         }

        //         $this->safeDelete($oldImage);
        //         return $relativePath;
        //     } else {
        //         // Handle image removal via checkbox or hidden input
        //         $removeImageField = $fieldName . '_remove';
        //         if ($request->$removeImageField == 1) {
        //             $this->safeDelete($oldImage);
        //             return $multiple ? [] : null;
        //         } else {
        //             return $oldImage;
        //         }
        //     }
        // }

        // private function safeDelete($path) {
        //     if (!empty($path) && file_exists(public_path($path))) {
        //         unlink(public_path($path));
        //     }
        // }

        // private function generateThumbnail($originalPath, $thumbPath) {
        //     $thumbDir = dirname($thumbPath);
        //     if (!file_exists($thumbDir)) {
        //         mkdir($thumbDir, 0777, true);
        //     }

        //     $img = Image::make($originalPath)->resize(200, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     });
        //     $img->save($thumbPath, 80); // 80% quality
        // }
    // Image Upload


        public function storeLog($action, $type, $model) {
            $log = new Log();
            $log->action = $action;
            $log->type = $type;
            $log->model = $model;
            $log->user_id = Auth::user()->id;
            $log->save();
            $this->sendNotification($action, $type, $model);
        }

        public function sendNotification($action, $type, $model) {
            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                [
                    'cluster' => env('PUSHER_APP_CLUSTER'),
                    'useTLS' => true,
                ]
            );
            $data = [
                'action' => $action,
                'type' => $type,
                'model' => $model,
            ];
            $pusher->trigger('my-channel', 'my-event', $data);
            return response()->json(['success' => true]);
        }

        public function checkEmail(Request $request) {
            $data = User::where('email', $request->email)->where('deleted_at', null)->first();
            if ($data) {
                return response()->json([
                    'status' => 201,
                    'data' => $data,
                    'message' => 'Email Already Exist',
                ]);
            }
        }

        public function checkPhone(Request $request) {
            $data = User::where('phone', $request->phone)->where('deleted_at', null)->first();
            if ($data) {
                return response()->json([
                    'status' => 201,
                    'data' => $data,
                    'message' => 'Phone Already Exist',
                ]);
            }
        }
    
        public function checkPassword(Request $request) {
            $user = User::where('id', Auth::user()->id)->first();
            if (Hash::check($request->password, $user->password)) {
                return response()->json(['success' => true]);
            }
        }

        public function uploadMedia(Request $request) {
            try {
                // Get the base64 encoded file data from the request
                $fileData = $request->file;
    
                // Extract the MIME type
                $mime = explode(';', $fileData)[0];
                $mime_parts = explode(':', $mime);
                $extension = explode('/', $mime_parts[1])[1];
    
                // Decode the base64 encoded file data
                $fileData = preg_replace('/^data:[\w\/]+;base64,/', '', $fileData);
                $fileData = str_replace(' ', '+', $fileData);
                $fileBinary = base64_decode($fileData);
    
                // Generate a unique filename
                $filename = time() . '.' . $extension;
                $path = 'media/files/' . $request->type;
    
                // Ensure directory exists
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
    
                // Handle different file types
                if (in_array($extension, ['png', 'jpeg', 'jpg'])) {
                    // Create an image resource
                    $image = imagecreatefromstring($fileBinary);
                    if (!$image) {
                        throw new \Exception('Invalid image data.');
                    }
    
                    // Adjust compression level for better quality
                    $quality = 50; // Higher value means better quality for JPEG
                    if ($extension == 'jpeg' || $extension == 'jpg') {
                        imagejpeg($image, $path . '/' . $filename, $quality);
                    } elseif ($extension == 'png') {
                        imagepng($image, $path . '/' . $filename, 5); // 0 for best quality, 9 for max compression
                    }
    
                    imagedestroy($image);
                } elseif ($extension == 'pdf') {
                    // Directly store PDF files
                    file_put_contents($path . '/' . $filename, $fileBinary);
                } else {
                    throw new \Exception('Unsupported file type.');
                }
    
                return response()->json([
                    'status' => 200,
                    'message' => 'File uploaded successfully',
                    'path' => $path . '/' . $filename,
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => 500,
                    'message' => 'An error occurred: ' . $th->getMessage(),
                ], 500);
            }
    
        } 
        
        public function delete(Request $request) {
            if ($request->type == 'temporary') {
                $model = DB::table($request->table)->where('id', $request->hiddenId)->update(['delete_at' => now()]);
                $this->storeLog('Delete', 'delete', $model);
            } else {
                $model = DB::table($request->table)->where('id', $request->hiddenId)->delete();
                $this->storeLog('Delete', 'delete', 'Permanent Delete');
            }
    
            Session()->flash('alert-success', "Entry Deleted Successfully");
            return redirect()->back();
        }

        public function generateTokenTrait() {
            return bin2hex(random_bytes(16)); //generates a crypto-secure 32 characters long
            // return md5(uniqid(mt_rand(), TRUE)); //generates a crypto-secure 32 characters long
        }

        public function loginTrait($request) {
            // queryHelper('enable');
            $result = User::where('phone', $request->login)->orWhere('email', $request->login)->first();
            // queryHelper('print');
            if ($result) {             
                if ($result->status == 1 && $result->deleted_at == null && $result->rolee->panelFlag == 1 && $result->login_status == 0) {
                    if (Hash::check($request->post('password'), $result->password)) {
                        $result->login_status = 1;
                        $result->api_token = $this->generateTokenTrait();
                        // dd("if condition inside if condition", $result);
                        $result->save();
                        Auth::login($result);
                        $this->storeLog('Login', 'login', 'Login');
                        return response()->json([
                            'status' => 200,
                            'message' => 'Logged In successfully',
                        ]);
                    } else {
                        return response()->json([
                            'status' => 201,
                            'message' => 'Incorrect Password',
                        ]);
                    }
                } else {
                    if ($result->status != 1) {
                        return response()->json([
                            'status' => 204,
                            'message' => 'User Not Active',
                        ]);
                    } elseif ($result->deleted_at != null) {
                        return response()->json([
                            'status' => 205,
                            'message' => 'User Deleted',
                        ]);
                    } elseif ($result->rolee->panelFlag != 1) {
                        return response()->json([
                            'status' => 206,
                            'message' => 'Unauthorized User',
                        ]);
                    } 
                    elseif ($result->login_status == 1) {
                        return response()->json([
                            'status' => 409,
                            'message' => 'Already User Login',
                        ]);
                    }
                }
            } else {
                return response()->json([
                    'status' => 202,
                    'message' => 'Invalid Details',
                ]);
            }
        }
    // End Admin side query
}
