<?php

namespace App\Traits\File;

use SplFileInfo;
use App\Models\File;
use Illuminate\Http\Request;

trait HasFile
{
    public function files() {
        $elem_type = get_called_class();
        return $this->hasMany(File::class, 'model_id', 'id')
            ->where('model_type', $elem_type)
            ;
    }

    public function file() {
        $elem_type = get_called_class();
        return $this->hasOne(File::class, 'model_id', 'id')
            ->where('model_type', $elem_type)->oldest()
            ;
    }

    /**
     * @param Request $request
     * @param $fieldname_rqst
     * @param $file_role
     * @param string $directory
     * @param string $oldfile
     * @return string|null
     */
    public function verifyAndStoreFile( Request $request, $fieldname_rqst, $file_role, $directory = 'unknown', $oldfile = ' ' ) {

        if( $request->hasFile( $fieldname_rqst ) ) {

            if (!$request->file($fieldname_rqst)->isValid()) {

                flash('Fichier Invalide!')->error()->important();

                return null;//redirect()->back()->withInput();
            }

            $file_dir = config('app.' . $directory);

            // Check if the old image exists inside folder
            if (file_exists( $file_dir . '/' . $oldfile)) {
                unlink($file_dir . '/' . $oldfile);
            }

            $elem_type = get_called_class();

            // Set image name
            $file = $request->file($fieldname_rqst);//$request->image;
            $file_name = md5($directory . '_' . time()) . '.' . $file->getClientOriginalExtension();

            // Move image to folder
            $file->move($file_dir, $file_name);

            $file = File::create([
                'config_dir' => $directory,
                'model_type' => $elem_type,
                'model_id' => $this->id,
                'name' => $file_name,
                'role' => $file_role,
                'type' => $file->getClientMimeType(),
                'size' => $file->getSize(),
                'extension' => $file->getClientOriginalExtension(),
            ]);

            return $file;
        }

        return -1;
    }

    public function splitFileIntoSubfiles($from_dir, $from_file, $to_dir, $subfile_max_line,$entete_premiere_ligne = false) {
        $raw_dir = config('app.RAW_FOLDER');
        $path = $raw_dir . '/' . config('app.' . $from_dir) . '/' . $from_file;
        //dd($path);
        //$file = File::get($path);
        $file_info = new SplFileInfo($path);
        $subfiles = [];

        $file_arr = file($file_info->getPathname());//file($path);

        if ($entete_premiere_ligne) {
            //remove first line
            $data = array_slice($file_arr, 1);
        } else {
            $data = $file_arr;
        }

        $parts = (array_chunk($data, $subfile_max_line));
        $parts_count = count($parts);

        if ($parts_count > 0) {
            $i = 1;
            $nb_rows_all = 0;
            $dest_dir = config('app.' . $to_dir);
            foreach ($parts as $line) {
                $filename = str_replace(['-', ' ', ':'], "", gmdate('Y-m-d h:i:s')) . '_' . $i . '.csv';
                $filename_full = $raw_dir.'/'.$dest_dir . '/' . $filename;

                file_put_contents($filename_full, $line);
                $i++;

                $nb_rows_curr = intval(exec("wc -l '" . $filename_full . "'"));
                //$subfiles[] = ['name' => $filename,'nb_rows' => $nb_rows_curr];
                array_push($subfiles, ['name' => $filename,'nb_rows' => $nb_rows_curr]);
            }
        }

        return $subfiles;
    }
}
