<?php

function storeFile($request, $dataName, $inputName, $folder)
{
    $file = $request->file($inputName);
    $modFileName = str_replace(' ', '', $dataName);
    $newName = uniqid() . '-' . $modFileName . '.' . $request->file($inputName)->extension();
    Storage::disk('public')->put($folder . '/' . $newName, File::get($file));

    return $newName;
}

function deleteFile($fileName)
{
    Storage::disk('public')->delete($fileName);
}
