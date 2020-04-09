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
    /**
     * функция отладки, останавливает работу программы выводя значение переменной $value
     * @param null $value
     * @param int $die
     */
    public static function d($value=null, $die=1)
    {
        echo 'Debug: <br /><pre>';
        print_r($value);
        echo '</pre>';

        if($die) die;
    }

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

