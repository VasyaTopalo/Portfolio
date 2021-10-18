<?php

function extractFields(array $target, array $fields): array {
    $result = [];
    foreach ($fields as $field) {
        if(isset($target[$field])) {
            $result[$field] = trim($target[$field]);
        }
    }
    return $result;
}