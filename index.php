2020
<?php
//file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
$message = file_get_contents('php://input');
$line_api = "https://notify-api.line.me/api/notify";
$access = "OKTpi6eNBQ5iJB92S4ilxjnnkSJyTl12awd5Aucvmhf";

/*-------------line noti----------------------*/
                $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer ' . $access);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $line_api);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($ch);

                $result_ = json_decode($result, true);
                if ($result_['status'] != 200 && $result_['message'] != "ok") {
                    // echo "message : ". $result_['message'].$result_['status'];
                    // Session::flash('alertError', 'แชร์ไปยัง Line ไม่สำเร็จ'.$result_['message']);
                } else {
                    // Session::flash('alertSuccess', 'แชร์ไปยัง Line เรียบร้อยเเล้ว');
                }
                /*-------------line noti----------------------*/
