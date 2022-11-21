<?php
    namespace App\Traits;
    use Illuminate\Support\Facades\Storage;

    trait FileUpload {
        public function uploadFile($file) {
            $fileName = $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName, 'public');
            return $fileName;
        }

        public function checkIfFileExists($file) {
            if(Storage::disk('public')->exists("uploads/$file")) 
            return true;
        }

        public function deleteFile($file) {
            try{
                Storage::disk('public')->delete("uploads/$file");
            }catch(ModelNotFoundException $exception) {
                return back()->withError('file not deleted something went wrong')->withInput();
            }
        }
    }