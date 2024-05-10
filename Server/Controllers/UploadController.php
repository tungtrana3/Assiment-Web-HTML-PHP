<?php

namespace Controllers;

use Models\UploadImage;

class UploadController extends \Core\BaseController
{
    protected string $Model = "UploadImage";

    public function upload()
    {

        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            return $this->Database->sendResponse(405);
        }
        $allowedExts = array("jpg", "jpeg", "gif", "png");
        $nameParts = explode(".", $_FILES["file"]["name"]);
        $extension = end($nameParts);
        $msg = null;
        $storeUrl = "http://localhost/server/Public/upload/";
        if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "image/pjpeg"))
            && ($_FILES["file"]["size"] < 10000000)
            && in_array($extension, $allowedExts)
        ) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            } else {
                if (file_exists(__DIR__ . "/../public/upload/" . $_FILES["file"]["name"])) {
                    $result = array('data' => $storeUrl . $_FILES["file"]["name"]);
                    return $this->Database->sendResponse(200, json_encode($result, JSON_UNESCAPED_SLASHES));
                    // $msg =  $_FILES["file"]["name"] . " already exists. ";
                } else {
                    move_uploaded_file(
                        $_FILES["file"]["tmp_name"],
                        __DIR__ . "/../public/upload/" . $_FILES["file"]["name"]
                    );
                }
            }
        } else {
            $msg = "Invalid file";
        }

        if ($msg != null) {
            return $this->Database->sendResponse(400, json_encode(array('msg' => $msg)));
        } else {
            $result = array('data' => $storeUrl . $_FILES["file"]["name"]);
            $this->Database->sendResponse(200, json_encode($result, JSON_UNESCAPED_SLASHES));
        }
    }
}
