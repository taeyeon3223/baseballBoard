<?php

namespace Eve\Controller;

use Eve\App\DB;

class FindController extends MasterController
{
    // 비밀번호 변경
    public function pwChange()
    {
        $nowUser = $_SESSION['user']->id;
        $nowPw = $_POST['nowPw'];
        $newPw = $_POST['newPw'];
        $newPwCheck = $_POST['newPwCheck'];

        if ($newPw !== $newPwCheck) {
            echo false;
            exit;
        }

        $sql = "SELECT * FROM users WHERE id = ? AND password = PASSWORD(?)";
        $user = DB::fetch($sql, [$nowUser, $nowPw]);
        
        if ($user) {
            $usql = "UPDATE users SET password = PASSWORD(?) WHERE id = ?";
            $result = DB::execute($usql, [$newPw, $nowUser]);
            if ($result) echo true;
        } else echo "DB오류";
    }
    
    // 아이디 찾기
    public function idFind()
    {
        $name = $_POST['name'];
        $sql = "SELECT * FROM users WHERE name = ?";
        $list = DB::fetchAll($sql, [$name]);
        if ($list) echo json_encode($list, JSON_UNESCAPED_UNICODE);
        else echo false;
    }

    // 비밀번호 찾기
    public function pwFind()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sql = "SELECT * FROM users WHERE id = ? AND name = ?";
        $user = DB::fetch($sql, [$id, $name]);
        if ($user) {
            $usql = "UPDATE users SET password = PASSWORD(?) WHERE id = ?";
            $result = DB::execute($usql, ["12345678", $id]);
            if ($result) echo "변경 완료";
        } else echo false;
    }
}