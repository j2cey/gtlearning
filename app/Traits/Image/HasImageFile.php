<?php

namespace App\Traits\Image;

use Illuminate\Http\Request;
use App\Traits\File\HasFile;

trait HasImageFile
{
    use HasFile;

    public function verifyAndStoreImage( Request $request, $fieldname_rqst, $fieldname_db, $directory = 'unknown', $oldimage = ' ' ) {

        return $this->verifyAndStoreFile($request,$fieldname_rqst,$fieldname_db,$directory,$oldimage);

    }

    public function verifyAndStoreImage_bkp( Request $request, $fieldname = 'image', $directory = 'unknown', $oldimage = ' ' ) {

        /*if( $request->hasFile( $fieldname ) ) {

            if (!$request->file($fieldname)->isValid()) {
                return null;
            }

            $file_dir = config('app.' . $directory);

            // Check if the old image exists inside folder
            if (file_exists( $file_dir . '/' . $oldimage)) {
                unlink($file_dir . '/' . $oldimage);
            }

            // Set image name
            $image = $request->file($fieldname);
            $image_name = md5($directory . '_' . time()) . '.' . $image->getClientOriginalExtension();

            // Move image to folder
            $image->move($file_dir, $image_name);

            return $image_name;
        }*/

        return null;

    }
}
