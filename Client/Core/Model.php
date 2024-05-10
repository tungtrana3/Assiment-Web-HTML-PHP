<?php

namespace Core;


use PDO;
use PDOException;

class Model
{

    public function Connect(): ?PDO
    {
        $conn = NULL;
        try {
            //Install database
            $conn = new PDO("mysql:host=" . config('host') . ";charset=utf8", config('user'), config('pass'));
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS " . config('db_name');
            // use exec() because no results are returned
            $conn->exec($sql);
            $conn->exec("USE " . config('db_name'));
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
        return $conn;
    }

    private function disconnect($conn)
    {
        unset($conn);
    }

    public function InsertRow(string $sql, array $value = [], bool $LastID = false)
    {
        $result = null;
        $conn = $this->Connect();
        //Insert the Data in Database
        $stmt = $conn->prepare($sql);
        if (!count($value) == 0 and !$value == NULL) :
            foreach ($value as $Key => $Value) :
                $stmt->bindValue($Key + 1, $Value);
            endforeach;
        endif;
        if ($stmt->execute()) :
            $result = true;
            if ($LastID) :
                $result = $conn->lastInsertId();
            endif;
        else :
            $result = false;
            $this->disconnect($conn);
        endif;
        return $result;
    }

    public function SelectRow(string $sql, array $value = [], bool $fetch = false)
    {
        $result = NULL;
        $conn = $this->Connect();

        //Select the Data in Database
        $stmt = $conn->prepare($sql);

        if (!count($value) == 0 and !$value == NULL) :
            foreach ($value as $key => $Value) :
                $stmt->bindValue($key + 1, $Value);
            endforeach;
        endif;

        if ($stmt->execute()) :
            if ($fetch) :
                $result = $stmt->fetch();
            else :
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            endif;
        else :
            $result = false;
            $this->disconnect($conn);
        endif;
        return $result;
    }

    public function UpdateRow(string $sql, array $value): bool
    {
        $conn = $this->Connect();
        //Update the Data in Database
        $stmt = $conn->prepare($sql);
        if (!count($value) == 0 and !$value == NULL) :
            foreach ($value as $Key => $Value) :
                $stmt->bindValue($Key + 1, $Value);
            endforeach;
        endif;

        if ($stmt->execute()) :
            $result = true;
        else :
            $result = false;
            $this->disconnect($conn);
        endif;
        return $result;
    }

    public function DeleteRow(string $sql, array $value = []): bool
    {
        $conn = $this->Connect();
        //Update the Data in Database
        $stmt = $conn->prepare($sql);
        if (!count($value) == 0 and !$value == NULL) :
            foreach ($value as $Key => $Value) :
                $stmt->bindValue($Key + 1, $Value);
            endforeach;
        endif;

        if ($stmt->execute()) :
            $result = true;
        else :
            $result = false;
            $this->disconnect($conn);
        endif;
        return $result;
    }
    function getStatusCodeMeeage($status)
    {
        $codes = array(
            100 => "Continue",
            101 => "Switching Protocols",

            200 => "OK",
            201 => "Created",
            202 => "Accepted",
            203 => "Non-Authoritative Information",
            204 => "No Content",
            205 => "Reset Content",
            206 => "Partial Content",

            300 => "Multiple Choices",
            301 => "Moved Permanently",
            302 => "Found",
            303 => "See Other",
            304 => "Not Modified",
            305 => "Use Proxy",
            306 => "(Unused)",
            307 => "Temporary Redirect",

            400 => "Bad Request",
            401 => "Unauthorized",
            402 => "Payment Required",
            403 => "Forbidden",
            404 => "Not Found",
            405 => "Method Not Allowed",
            406 => "Not Acceptable",
            407 => "Proxy Authentication Required",
            408 => "Request Timeout",
            409 => "Conflict",
            410 => "Gone",
            411 => "Length Required",
            412 => "Precondition Failed",
            413 => "Request Entity Too Large",
            414 => "Request-URI Too Long",
            415 => "Unsupported Media Type",
            416 => "Requested Range Not Satisfiable",
            417 => "Expectation Failed",

            500 => "Internal Server Error",
            501 => "Not Implemented",
            502 => "Bad Gateway",
            503 => "Service Unavailable",
            504 => "Gateway Timeout",
            505 => "HTTP Version Not Supported"
        );

        return (isset($codes[$status])) ? $codes[$status] : "";
    }
    function sendResponse($status = 200, $body = "", $content_type = "text/html")
    {
        $status_header = "HTTP/1.1 " . $status . " " . $this->getStatusCodeMeeage($status);
        header($status_header);
        header("Content-type: " . $content_type);
        echo $body;
    }
}
