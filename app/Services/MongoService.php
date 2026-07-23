<?php
namespace App\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;

class MongoService
{
    protected $db;

    public function __construct()
    {
        $this->db = DB::connection("mongodb");
    }

    #- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
    # GET METHODS
    #- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    public function getDocument(string $collection, string $field, mixed $filter): ?object
    {
        return $this->db->table($collection)->where($field, $filter)->first();
    }

    public function getDocuments(string $collection): Collection
    {
        return $this->db->table($collection)->get();
    }

    public function getDocumentsByFilter(string $collection, string $field, mixed $filter): Collection
    {
        return $this->db->table($collection)->where($field, $filter)->get();
    }

    public function getDocumentsByFilters(string $collection, array $filters): Collection
    {
        $query = $this->db->table($collection);
        foreach($filters as $field => $value)
        {
            $query->where($field, $value);
        }
        return $query->get();
    }

    #- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
    # INSERT METHODS
    #- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
    
    public function insertDocument(string $collection, array $data)
    {
        try{
            return $this->db->table($collection)->insert($data);
        } catch(Exception $e){
            Log::error('Error al insertar documento: ' . $e->getMessage());
            return false;
        }
    }

    #- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
    # DELETE METHODS
    #- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
    
    public function deleteDocument(string $collection, string $field, mixed $filter): bool
    {
        try{
            return $this->db->table($collection)
            ->where($field, $filter)->first()?->delete() > 0;
        }
        catch(Exception $e)
        {
            Log::error("Error al eliminar el documento en '{$collection}': " . $e->getMessage());
            return false;
        }
    }

    public function deleteAllDocuments(string $collection): bool
    {
        try{
            return $this->db->table($collection)->delete() > 0;
        }
        catch(Exception $e)
        {
            Log::error("Error al eliminar todos los documentos de '{$collection}': " . $e->getMessage());
            return false;
        }
    }

    public function deleteDocumentByFilters(string $collection, array $filters): bool
    {
        try{
                $query = $this->db->table($collection);
                foreach($filters as $field => $value)
                {
                    $query->where($field, $value);
                }
                return $query->delete() > 0;
        }
        catch(Exception $e)
        {
            Log::error("Error al eliminar el documento en '{$collection}': " . $e->getMessage());
            return false;
        }
    }

    ## - - - - - - - - - - - - - - - -  update methods - - - - - - - - - - - - - - -  ##    
    public function updateDocument(string $collection, string $field, mixed $fieldValue, string $filterField, mixed $filter): bool
    {
        try{
            return $this->db->table($collection)
            ->where($filterField, $filter)->update([$field => $fieldValue]) > 0;
        }
        catch(Exception $e){
            Log::error("Error al actualizar el documento en '{$collection}': " . $e->getMessage());
            return false;
        }
    }

    public function updateDocuments(string $collection, array $data): bool
    {
        try{
            return $this->db->table($collection)->update($data);
        }
        catch(Exception $e){
            Log::error("Error al actualizar los documentos en '{$collection}': " . $e->getMessage());
            return false;
        }
    }

    public function updateDocumentsByFilters(string $collection, array $values, array $filters): int
    {
        try {
            $query = $this->db->table($collection);

            foreach($filters as $field => $value)
            {
                $query->where($field, $value);
            }
            return $query->update($values);
        } catch (\Exception $e) {
            Log::error("Error al actualizar los documentos por filtro en '{$collection}': " . $e->getMessage());
            return 0;
        }
    }
}
?>