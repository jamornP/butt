<?php
namespace App\Model\Procurement;

use App\Database\DbProcurement;

class Department extends DbProcurement {
    public function InsertDepartment($data) {
        $sql="
            INSERT INTO tb_department (
                id, 
                dName, 
                dSub
            ) VALUES (
                NULL, 
                :dName, 
                :dSub
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getDepartmentF() {
        $sql="
            SELECT 
                *
            FROM
                tb_departmentf
            ORDER BY 
                dNameF
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$dSub]);
        $data =$stmt->fetchAll();
        return $data;
    }
    public function getDepartmentT() {
        $sql="
            SELECT 
                *
            FROM
                tb_departmentt
            ORDER BY 
                dNameT
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$dSub]);
        $data =$stmt->fetchAll();
        return $data;
    }
    

}
?>