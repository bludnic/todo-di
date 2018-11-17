<?php

namespace Todo\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use function Todo\Helpers\config;

class ImageUploader {
  public static function upload(UploadedFile $file) {
    $fileName = md5(uniqid()) . '.' . $file->guessExtension();

    $file->move(static::getUploadsDirectory(), $fileName);

    return $fileName;
  }

  public static function getUploadsDirectory() {
    $basePath = realpath(__DIR__ . '/../../../');
    $uploadsPath = $basePath . '/' . config('directories')['uploads'];

    return $uploadsPath;
  }
}
