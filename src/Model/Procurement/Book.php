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
                departTo_id,
                bookRegis_date,
                year
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
                :departTo_id,
                :bookRegis_date,
                :year
            );
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($book);
        return $this->pdo->lastInsertId();

    }
    public function getBookId($year) {
        $sql="
            select 
                bookId 
            from 
                tb_book 
            where
                year='".$year."'
            order by
                bookId
            desc
        ";  
        $stmt = $this->pdo->query($sql);
        // $stmt->execute($year);
        $data = $stmt->fetchAll();
        $row = $stmt->rowCount();
        
        if($row == 0){
            $num=1;
            return $num;
        }else{
            // $num['bookId']=intval($data[0])+1;
            $num=intval($data[0]['bookId'])+1;
            return $num;
        }
        // return $row;
    }
    public function getBookIdByDate($date) {
        $sql="
            select 
                * 
            from 
                tb_book  
            where 
                date_add = :date_add AND
                year = :year
            order by
                regis
            desc
        ";  
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($date);
        $data =$stmt->fetchAll();
        $row = $stmt->rowCount();
        
        // $num['bookId_num']=intval($data[0]['bookId_num'])+1;
        if($row == 0){
            $num['bookId']=1;
            $num['bookId_num']=1;
            return $num;
        }else{
            $num['bookId']=intval($data[0]['bookId']);
            $num['bookId_num']=intval($data[0]['bookId_num'])+1;
            return $num;
        }
        // return $row;
    }
    public function getBookIdByDate2($date) {
        $sql="
            select 
                * 
            from 
                tb_book  
            where 
                date_add = :date_add 
            order by
                regis
            desc
        ";  
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($date);
        $data =$stmt->fetchAll();
        $row = $stmt->rowCount();
        
        // $num['bookId_num']=intval($data[0]['bookId_num'])+1;
        if($row == 0){
            $num['bookId']=1;
            $num['bookId_num']=1;
            return $num;
        }else{
            $num['bookId']=intval($data[0]['bookId']);
            $num['bookId_num']=intval($data[0]['bookId_num'])+1;
            return $num;
        }
        // return $row;
    }
    public function getBookByDate($date) {
        $sql="
            select 
                b.*,df.*,dt.*
            from 
                tb_book AS b
                LEFT JOIN tb_departmentf AS df ON b.departmentForm_id = df.id
                LEFT JOIN tb_departmentt AS dt ON b.departTo_id = dt.id
            where 
                b.bookRegis_date = :bookRegis_date AND
                b.year = :year
            order by
                b.bookId
        ";  
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($date);
        $data =$stmt->fetchAll();
        return $data;
    }
    public function getBookSearch($sql) {
        $stmt = $this->pdo->query($sql);
       
        $data = $stmt->fetchAll();
         return $data;
    }
    public function getYear() {
        $sql="
            select 
                year
            from 
                tb_book 
            group by
                year
            order by
                year
        ";  
        $stmt = $this->pdo->query($sql);
        $data =$stmt->fetchAll();
        return $data;
    }
    public function getBookById($id) {
        $sql="
            select 
                b.id as bid,b.*,df.id as fid,df.*,dt.id as tid,dt.*
            from 
                tb_book AS b
                LEFT JOIN tb_departmentf AS df ON b.departmentForm_id = df.id
                LEFT JOIN tb_departmentt AS dt ON b.departTo_id = dt.id
            where 
                b.id = ?
            order by
                b.bookId
        ";  
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data =$stmt->fetchAll();
        return $data[0];
    }
    public function UpdateBook($book) {
        $sql = "
            UPDATE 
                tb_book 
            SET
                bookNum= :bookNum,
                bookName= :bookName,
                bookDate= :bookDate,
                departmentForm_id= :departmentForm_id,
                departTo_id=:departTo_id
            WHERE
                id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($book);
        return true;

    }
}