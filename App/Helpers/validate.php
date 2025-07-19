<?php

function validate(App\Core\Model $model, array $validations)
{
    $result = [];
    $params = '';

    foreach ($validations as $field => $validate) {
        $result[$field] = (!str_contains($validate, '|')) ?
            singleValidation($model, $validate, $field, $params) :
            mutipleValidations($model, $validate, $field, $params);
    }

    if (in_array(false, $result)) {
        return false;
    }

    return $result;
}

function singleValidation($model, $validate, $field, $params)
{
    if (str_contains($validate, ':')) {
        [$validate, $params] = explode(':', $validate);
    }
    return $validate($model, $field, $params);
}

function mutipleValidations($model, $validate, $field, $params)
{

    $explodePipeValidate = explode('|', $validate);
    $result = [];

    foreach ($explodePipeValidate as $validate) {

        if (str_contains($validate, ':')) {
            [$validate, $params] = explode(':', $validate);
        }

        $result[$field] = $validate($model, $field, $params);

        if (isset($result[$field]) and $result[$field] === false) {
            break;
        }
    }
    return $result[$field];
}

function required($model, $field)
{
    if ($_POST[$field] === '') {
        setFlash($field, "O campo é obrigatório");
        return false;
    }

    return htmlspecialchars($_POST[$field]);
}

function email($model, $field)
{
    $emailIsValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

    if (!$emailIsValid) {
        setFlash($field, "O campo tem que ser um email válido");
        return false;
    }
    return filter_input(INPUT_POST, $field, FILTER_SANITIZE_EMAIL);
}

function unique($model, $field, $params)
{
    $data = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

    $user = $model->findBy($params, $field, $data);

    if ($user) {
        setFlash($field, "O email já está cadastrado");
        return false;
    }

    return $data;
}

function maxlen($model, $field, $params)
{
    $data = filter_input(INPUT_POST, $field, FILTER_VALIDATE_INT);

    if (strlen($data) > (int)$params) {
        setFlash($field, "Esse campo não pode passar de {$params} caracteres");
        return false;
    }

    return $data;
}