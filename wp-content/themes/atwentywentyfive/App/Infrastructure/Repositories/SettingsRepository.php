<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\sdbh;

class SettingsRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new sdbh();
    }

    /**
     * Получает все продукты из базы данных.
     * @return array
     */
    public function getAllSettings(): array
    {
        $query = "SELECT * FROM a25_settings";
        $result = $this->db->make_query($query);

        return $result;
    }
}
