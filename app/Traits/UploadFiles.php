<?php

namespace App\Traits;

trait UploadFiles
{
  public function storeFile($file, $filePath): bool|string
  {
    if ($file != null) {
      $fileName = $this->generateRandomName($file->extension());

      $file->move(public_path('uploads/' . $filePath), $fileName);

      return $fileName;
    }

    return false;
  }

  public function storeImage($file): bool|string
  {
    return  $this->storeFile($file, 'images');
  }

  public function updateFile($file, $filePath, $oldName): bool|string
  {
    if (file_exists($oldName)) {
      @unlink($oldName);
    }

    if ($file != null) {
      $fileName = $this->generateRandomName($file->extension());

      $file->move(public_path('uploads/' . $filePath), $fileName);

      return $fileName;
    }

    return false;
  }

  public function updateImage($file, $oldName): bool|string
  {
    return $this->updateFile($file, 'images', $oldName);
  }

  public function deleteFile($oldName): bool
  {
    if (file_exists($oldName)) {
      @unlink($oldName);
      return true;
    }

    return false;
  }

  private function generateRandomName($fileExtension)
  {
    return time() . rand(11111111, 99999999) . (time() * rand(5000, 100000)) . '.' . $fileExtension;
  }
}
