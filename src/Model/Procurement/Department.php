<?php
namespace App\Model\Procurement;

use App\Database\DbProcurement;

class Department extends DbProcurement {
    public function InsertDepartmentf($data) {
        $sql="
            INSERT INTO tb_departmentf (
                id, 
                dNameF        
            ) VALUES (
                NULL, 
                :dNameF
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function InsertDepartmentt($data) {
        $sql="
            INSERT INTO tb_departmentt (
                id, 
                dNameT        
            ) VALUES (
                NULL, 
                :dNameT
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
        $stmt = $this->pdo->query($sql);
        // $stmt->execute([$dSub]);
        
        $data = $stmt->fetchAll();
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
        $stmt = $this->pdo->query($sql);
        // $stmt->execute([$dSub]);
        $data = $stmt->fetchAll();
        return $data;
    }
    

}
?>