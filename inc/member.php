<?php // Member Class File

class Member {
    // 멤버 변수 (private이기 때문에 생성자(public을 통해서 접근하게끔 구현))
    private $conn;

    // 생성자 
    public function __construct($db) {
        $this->conn = $db;
    }

    // 아이디 중복체크용 멤버 함수, 메소드
    public function id_exist($id) {
        $sql = "SELECT * FROM `member` WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->rowCount() ? true : false; // 쿼리 했을때 나오는 row값이 1이상(중복)이면 true 아니면(중복안됨) false
    }

    public function email_exist($email) {
        $sql = "SELECT * FROM `member` WHERE email=:email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->rowCount() ? true : false; // 쿼리 했을때 나오는 row값이 1이상(중복)이면 true 아니면(중복안됨) false
    }
}