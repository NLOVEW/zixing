<?php
    namespace Home\Controller;
    use Think\Controller;
    header("Content-type: text/html; charset=utf-8");

    class ManagerController extends Controller{

        function index(){
            $this->display();
        }

        function welcome(){
            $this->display();
        }

        function personal(){
            $this->display();
        }

        function completePassword(){

        }

        function loginTotal(){
            $this->display();
        }


        function resource(){
            $this->display();
        }

        function totalRecord(){
            $this->display();
        }

        function resourceUpload(){
            //获取配置信息
            if (isset($_REQUEST["course"])) {
                $course = $_REQUEST["course"];
            } elseif (!empty($_POST['course'])) {
                $course = $_POST['course'];

            }

            if (isset($_REQUEST["keyWord"])) {
                $keyWord = $_REQUEST["keyWord"];
            } elseif (!empty($_POST['keyWord'])) {
                $keyWord = $_POST['keyWord'];
            }



            //上传文件
            if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
                exit;
            }
            if ( !empty($_REQUEST[ 'debug' ]) ) {
                $random = rand(0, intval($_REQUEST[ 'debug' ]) );
                if ( $random === 0 ) {
                    header("HTTP/1.0 500 Internal Server Error");
                    exit;
                }
            }
            @set_time_limit(50 * 60);
            $targetDir = 'Public/Resource/Tem';
            $uploadDir = 'Public/Resource';
            $cleanupTargetDir = true;
            $maxFileAge = 5 * 3600;
            if (!file_exists($targetDir)) {
                @mkdir($targetDir);
            }
            if (!file_exists($uploadDir)) {
                @mkdir($uploadDir);
            }
            if (isset($_REQUEST["name"])) {
                $fileName = $_REQUEST["name"];
                $fileName=iconv("UTF-8","gb2312", $fileName);
            } elseif (!empty($_FILES)) {
                $fileName = $_FILES["file"]["name"];
                $fileName=iconv("UTF-8","gb2312", $fileName);

            } else {
                $fileName = uniqid("file_");
                $fileName=iconv("UTF-8","gb2312", $fileName);
            }

            $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
            $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
            $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
            $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
            if ($cleanupTargetDir) {
                if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
                }
                while (($file = readdir($dir)) !== false) {
                    $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
                    if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                        continue;
                    }
                    if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                        @unlink($tmpfilePath);
                    }
                }
                closedir($dir);
            }
            if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }
            if (!empty($_FILES)) {
                if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
                }
                if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                }
            } else {
                if (!$in = @fopen("php://input", "rb")) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                }
            }
            while ($buff = fread($in, 4096)) {
                fwrite($out, $buff);
            }
            @fclose($out);
            @fclose($in);
            rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");
            $index = 0;
            $done = true;
            for( $index = 0; $index < $chunks; $index++ ) {
                if ( !file_exists("{$filePath}_{$index}.part") ) {
                    $done = false;
                    break;
                }
            }
            if ( $done ) {
                if (!$out = @fopen($uploadPath, "wb")) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
                }
                if ( flock($out, LOCK_EX) ) {
                    for( $index = 0; $index < $chunks; $index++ ) {
                        if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                            break;
                        }
                        while ($buff = fread($in, 4096)) {
                            fwrite($out, $buff);
                        }
                        @fclose($in);
                        @unlink("{$filePath}_{$index}.part");
                    }
                    flock($out, LOCK_UN);
                }
                @fclose($out);
            }
            die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
        }


    }
