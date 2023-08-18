<?php
namespace App\Service;
interface TodolistService {
    public function saveTodo(string $id, string $name) : void;
    public function getTodo() : array;
    public function removeTodo(string $id) :void;
}
