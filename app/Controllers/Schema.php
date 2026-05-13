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

            // ambil field tiap tabel
            $fields = $this->db->getFieldData($table);

            $schema[$table] = $fields;
        }

        $data['schema'] = $schema;

        return view('schema/index', $data);
    }
}