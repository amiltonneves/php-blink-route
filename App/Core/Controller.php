<?php

namespace App\Core;

use Exception;

abstract class Controller
{
    protected String $view;
    protected array $viewData;

    /**
     * Renderiza o layout que chamará a view ou somente renderiza a view
     * 
     * @param String $view O nome da view a ser renderizada
     * @param String $title O titulo da view
     * @param array $viewData Array associativo com dados
     * @return void
     */
    protected function view(String $view, String $title, array $viewData = []): void
    {
        $this->view = $view;
        $this->viewData['data'] = [
            'title' => $title,
            'data' => $viewData
        ];

        if ($this->validateData()) {
            extract($this->viewData['data']['data']);
            if (file_exists(MASTER_VIEW)) {
                require_once MASTER_VIEW;
            }
        }
    }

    /**
     * Valida se a variável data contém dados e se a view existe
     * 
     * @return bool se não gerar exceção, retorna true
     */
    private function validateData(): bool
    {
        if (!isset($this->viewData['data'])) {
            throw new Exception('O indice data está faltando');
        }

        if (!isset($this->view)) {
            throw new Exception('O indice view está faltando');
        }

        if (!file_exists(VIEWS_CONTENTS . $this->view . '.php')) {
            throw new Exception("A view {$this->view} não existe");
        }
        return true;
    }
}