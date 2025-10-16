<?php
namespace App\Core;

use App\Database\Db;
use PDOException;

abstract class Model
{
    protected String $table;

    /**
     * Insere um registro no banco de dados
     *
     * @param array $data Array associativo com campo => valor para inserção
     */
    public function create(array $data)
    {
        try {
            $connect = Db::connect();

            $sql = "insert into {$this->table}(";
            $sql .= implode(',', array_keys($data)) . ") values (";
            $sql .= ':' . implode(',:', array_keys($data)) . ")";

            $prepare = $connect->prepare($sql);
            return $prepare->execute($data);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
    /**
     * Busca todos os registros em uma tabela do banco de dados
     *
     * @param String $fields Campos a serem buscados na tabela [separados por virgula]
     * @return array retorna a lista com todos os registros
     */
    public function all($fields = '*'): array
    {
        try {
            $connect = Db::connect();

            $query = $connect->query("select {$fields} from {$this->table}");
            return $query->fetchAll();
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
        return [];
    }

    /**
     * Busca um registro em uma tabela com base em um campo
     *
     * @param String $fieldBy Campo que será buscado
     * @param String $by Valor do campo a ser buscado
     * @param String $fields Campos a serem trazidos na consulta
     * @return null|array retorna um array com os dados pesquisados
     */
    public function findBy($fieldBy, $by, $fields = '*'): null | array
    {
        try {
            $connect = Db::connect();

            $query = $connect->prepare("select {$fields} from {$this->table} where {$fieldBy} = :by");
            $query->execute([":by" => $by]);
            return $query->fetch();
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
        return null;
    }

    /**
     * Atualiza um registro em uma tabela com base em um campo
     *
     * @param String $fieldBy campo a ser buscado
     * @param String $by valor do campo a ser buscado
     * @param array $data Array associativo com campo => valor para atualização
     * @return bool retorna se a atualização foi bem sucedida
     */
    public function update($fieldBy, $by, $data): bool
    {
        $columns = '';
        foreach ($data as $column => $value) {
            $columns .= $column . ' = :' . $column . ',';
        }
        $columns = rtrim($columns, ',');

        try {
            $connect = Db::connect();

            $sql = "update {$this->table} set ";
            $sql .= $columns;
            $sql .= " where {$fieldBy}=:{$fieldBy}";
            $prepare        = $connect->prepare($sql);
            $data[$fieldBy] = $by; //Attaching id in array
            return $prepare->execute($data);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
        return false;
    }

    /**
     * Apaga um registro em uma tabela com base em um campo
     *
     * @param String $id Id que terá os registros apagado
     * @return bool retorna se o registro foi apagado
     */
    public function delete($id): bool
    {
        try {
            $connect = Db::connect();

            $sql     = "delete from {$this->table} where id = :delete";
            $prepare = $connect->prepare($sql);
            $prepare->execute($id);
            redirect('/');
            return true;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
        return false;
    }
}
