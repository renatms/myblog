<?php
/**
 * Created by PhpStorm.
 * User: ecartman
 * Date: 09.04.2020
 * Time: 0:28
 */

namespace app\models;


use yii\base\Model;

class UpLoadForm extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload($file)
    {
        if ($this->validate()) {
            $this->image->saveAs("uploaded/{$file}");
            return $file;
        } else {
            return false;
        }
    }
}

