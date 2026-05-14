<?php

namespace App\Controllers;

class Schema extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // ambil semua tabel
        $tables = $this->db->listTables();

        $schema = [];

        foreach ($tables as $table) {

            $fields = $this->db->getFieldData($table);

            $schema[$table] = $fields;
        }

        // query runner
        $query = '';
        $result = [];
        $message = '';

        if ($this->request->getMethod() === 'POST') {

            $query = $this->request->getPost('query');

            try {

                $exec = $this->db->query($query);

                if ($exec instanceof \CodeIgniter\Database\MySQLi\Result) {

                    $result = $exec->getResultArray();
                }

                $message = 'Query berhasil dijalankan';

            } catch (\Throwable $e) {

                $message = $e->getMessage();
            }
        }

        return view('schema/index', [
            'schema' => $schema,
            'query' => $query,
            'result' => $result,
            'message' => $message
        ]);
    }
}