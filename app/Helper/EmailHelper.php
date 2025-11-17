<?php

namespace App\Helper;

use Modules\EmailSetting\App\Models\EmailSetting;

class EmailHelper{


    public static function mail_setup(){

        $setting_data = EmailSetting::all();

        $email_setting = array();

        foreach($setting_data as $data_item){
            $email_setting[$data_item->key] = $data_item->value;
        }

        $email_setting = (object) $email_setting;

    }
}
