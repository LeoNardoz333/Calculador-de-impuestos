<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class CRUD_Basics extends Controller
{
    ## - - - - - - - - - - - - - - - -  get methods - - - - - - - - - - - - - - -  ##
    public function getDocument($collection, $field, $filter)
    {
        return DB::connection('mongodb')
        ->collection($collection)
        ->where($field, $filter)
        ->first() ?? null;
    }

    public function getDocuments($collection)
    {
        return DB::connection('mongodb')
        ->collection($collection)->get();
    }

    public function getDocumentsByFilter($collection, $field, $filter)
    {
        return DB::connection('mongodb')
        ->collection($collection)
        ->where($field, $filter);
    }

    public function getDocumentsByFilters($collection, array $filters)
    {
        $query = DB::connection('mongodb')->collection($collection);
        foreach($filters as $field => $value)
        {
            $query->where($field, $value);
        }
        return $query->get();
    }

    ## - - - - - - - - - - - - - - - -  delete methods - - - - - - - - - - - - - - -  ##    
    public function insertDocument($collection, array $data)
    {
        try{
            DB::connection('mongodb')->collection($collection)->insert($data);
        } catch(\Exception $e){
            Log::error('Error al insertar documento: ' . $e->getMessage());
            return null;
        }
    }

    ## - - - - - - - - - - - - - - - -  delete methods - - - - - - - - - - - - - - -  ##    
    
    public function deleteDocument($collection, $field, $filter)
    {
        try{
            return DB::connection('mongodb')->collection($collection)
            ->where($field, $filter)->first()->delete() > 0;
        }
        catch(\Exception $e)
        {
            Log::error('Error al eliminar el documento: ' . $e->getMessage());
            return false;
        }
    }

    public function deleteAllDocuments($collection)
    {
        try{
            return DB::connection('mongodb')->collection($collection)->delete() > 0;
        }
        catch(\Exception $e)
        {
            Log::error('Error al eliminar todos los documentos de la colección "' . $collection . '": ' . $e->getMessage());
            return false;
        }
    }

    public function deleteDocumentByFilters($collection, array $filters)
    {
        try{
                $query = DB::connection('mongodb')->collection($collection);
                foreach($filters as $field => $value)
                {
                    $query->where($field, $value);
                }
                return $query->delete() > 0;
        }
        catch(\Exception $e)
        {
            Log::error('Error al eliminar el documento: ' . $e->getMessage());
            return false;
        }
    }

    ## - - - - - - - - - - - - - - - -  update methods - - - - - - - - - - - - - - -  ##    
    public function updateDocument($collection, $field, $fieldValue, $filterField, $filter)
    {
        try{
            return DB::connection('mongodb')->collection($collection)
            ->where($filterField, $filter)->update([$field => $fieldValue]);
        }
        catch (\Exception $e){
            Log::error('Error al actualizar el documento "' . $collection . '": ' . $e->getMessage());
            return false;
        }
    }

    public function updateDocuments($collection, array $data)
    {
        try{
            return  DB::connection('mongodb')->collection($collection)->update($data);
        }
        catch(\Exception $e){
            Log::error('Error al actualizar los documentos de la colección "' . $collection . '": ' . $e->getMessage());
            return false;
        }
    }

    public function updateDocumentsByFilters($collection, array $values, array $filters)
    {
        try {
            $query = DB::connection('mongodb')->collection($collection);

            foreach($filters as $field => $value)
            {
                $query->where($field, $value);
            }
            return $query->update($values);
        } catch (\Exception $e) {
            Log::error('Error al actualizar los documentos de la colección "' . $collection . '": ' . $e->getMessage());
            return false;
        }
    }
}
