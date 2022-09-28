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
    public function getDepartmentFId() {
        $sql="
            SELECT 
                *
            FROM
                tb_departmentf
            ORDER BY 
                id
        ";
        $stmt = $this->pdo->query($sql);
        // $stmt->execute([$dSub]);
        
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getDepartmentTId() {
        $sql="
            SELECT 
                *
            FROM
                tb_departmentt
            ORDER BY 
                id
        ";
        $stmt = $this->pdo->query($sql);
        // $stmt->execute([$dSub]);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getDepartmentById($id,$tb) {
        $sql="
            SELECT
                * 
            FROM ".
                $tb."
            WHERE
                id=".$id
        ;
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function UpdateDepartmentf($data) {
        $sql="
            UPDATE 
                tb_departmentf
            SET 
                dNamef=:dname
            WHERE 
                id=:id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
    public function UpdateDepartmentt($data) {
        $sql="
            UPDATE 
                tb_departmentt
            SET 
                dNameT=:dname
            WHERE 
                id=:id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;
    }
}
?>