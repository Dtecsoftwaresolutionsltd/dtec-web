<?php

namespace App\Helper;

use Modules\EmailSetting\App\Models\EmailSetting;
use Illuminate\Support\Facades\Config;

class EmailHelper{


    public static function mail_setup(){

        $setting_data = EmailSetting::all();

        $email_setting = array();

        foreach($setting_data as $data_item){
            $email_setting[$data_item->key] = $data_item->value;
        }

        $email_setting = (object) $email_setting;

        if ($email_setting) {
            if (property_exists($email_setting, 'mail_host')) {
                Config::set('mail.mailers.smtp.host', $email_setting->mail_host);
            }
            if (property_exists($email_setting, 'mail_port')) {
                Config::set('mail.mailers.smtp.port', $email_setting->mail_port);
            }
            if (property_exists($email_setting, 'mail_encryption')) {
                Config::set('mail.mailers.smtp.encryption', $email_setting->mail_encryption);
            }
            if (property_exists($email_setting, 'smtp_username')) {
                Config::set('mail.mailers.smtp.username', $email_setting->smtp_username);
            }
            if (property_exists($email_setting, 'smtp_password')) {
                Config::set('mail.mailers.smtp.password', $email_setting->smtp_password);
            }
            if (property_exists($email_setting, 'email')) {
                Config::set('mail.from.address', $email_setting->email);
            }
            if (property_exists($email_setting, 'sender_name')) {
                Config::set('mail.from.name', $email_setting->sender_name);
            }
        }

    }
}
