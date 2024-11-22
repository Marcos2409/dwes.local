<?php

namespace dwes\app\repository;

use dwes\core\database\QueryBuilder;
use dwes\app\entity\Usuario;
use dwes\core\App;

class UsuarioRepository extends QueryBuilder
{
    /**
     * @param string $table
     * @param string $classEntity
     */
    public function __construct(string $table = 'usuarios', string $classEntity = Usuario::class)
    {
        parent::__construct($table, $classEntity);
    }

    /**
     * @param Usuario $usuario
     * @return Usuario
     * @throws NotFoundException
     * @throws QueryException
     */
    public function guarda(Usuario $usuario): Usuario
    {
        $fnGuardaUsuario = function () use ($usuario) {
            $this->save($usuario);
        };
        $this->executeTransaction($fnGuardaUsuario);

        return $usuario;
    }
}
