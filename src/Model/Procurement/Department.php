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
    public function getDepartmentBydSub($data) {
        $sql="
        
        ";
        
    }
    

}
?>