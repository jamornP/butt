<?php
namespace App\Model\Procurement;

use App\Database\DbProcurement;

class Book extends DbProcurement {
    public function InsertBook($book) {
        $sql = "
            INSERT INTO tb_book (
                id, 
                date_add, 
                bookId_recive, 
                bookId, 
                bookId_num, 
                bookNum, 
                bookName, 
                bookDate, 
                departmentForm_id, 
                departTo_id
            ) VALUES (
                NULL, 
                :date_add, 
                :bookId_recive, 
                :bookId, 
                :bookId_num, 
                :bookNum, 
                :bookName, 
                :bookDate, 
                :departmentForm_id, 
                :departTo_id
            );
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($book);
        return $this->pdo->lastInsertId();

    }
    public function getBookIdByDate($date) {
        $sql="
            select 
                bookId 
            from 
                tb_book 
            where 
                date_add =?
            order by
                bookId
            desc
        ";  
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$date]);
        $data =$stmt->fetchAll();
        $row = $stmt->rowCount();
        $num=intval($data[0]['bookId'])+1;
        if($row == 0){
            $num=1;
            return $num;
        }else{
            // $num['bookId']=intval($data[0])+1;
            return $num;
        }
        // return $row;
    }

}