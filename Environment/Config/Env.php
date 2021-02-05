<?php

namespace Config;

abstract class Env
{
    public const DB_FEATURE = [
        "db_drive" => "mysql",
        "db_port" => 3306,
        "db_name" => "api",
        "db_host" => "localhost",
        "db_username" => "root",
        "db_passwd" => "",
        "db_charset" => "utf8",
    ];

    public const ROOT_API = "/php/Api/";
}