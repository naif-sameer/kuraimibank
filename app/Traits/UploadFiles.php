<?php

namespace App\Traits;

trait UploadFiles
{
  public function storeFile($file, $filePath): bool|string
  {
    if ($file != null) {
      $fileName = $this->generateRandomName() . $file->extension();

      $file->move(public_path('uploads/' . $filePath), $fileName);

      return $fileName;
    }

    return false;
  }

  public function updateFile($file, $filePath, $oldName): bool|string
  {
    if (file_exists($oldName)) {
      @unlink($oldName);
    }

    if ($file != null) {
      $fileName = $this->generateRandomName() . $file->extension();

      $file->move(public_path('uploads/' . $filePath), $fileName);

      return $fileName;
    }

    return false;
  }

  public function deleteFile($oldName): bool
  {
    if (file_exists($oldName)) {
      @unlink($oldName);
      return true;
    }

    return false;
  }

  private function generateRandomName()
  {
    return time() . rand(1111111, 9999999) . '.';
  }
}
