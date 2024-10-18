<?php
class ImagenesRepository extends QueryBuilder
{
 /**
 * @param string $table
 * @param string $classEntity
 */
 public function __construct(string $table='imagenes', string $classEntity='Imagen')
 {
 parent::__construct($table, $classEntity);
 }

/**
 * @param ImagenGaleria $imagenGaleria
 * @return Categoria
 * @throws NotFoundException
 * @throws QueryException
 */
public function getCategoria(Imagen $imagenGaleria): Categoria
{
    $categoriaRepository = new CategoriaRepository();
    return $categoriaRepository->find($imagenGaleria->getCategoria());
}
 public function guarda(Imagen $imagenGaleria)
 {
 $fnGuardaImagen = function () use ($imagenGaleria) { // Creamos una función anónima que se llama como callable
 $categoria = $this->getCategoria($imagenGaleria);
 $categoriaRepository = new CategoriaRepository();
 $categoriaRepository->nuevaImagen($categoria);
 $this->save($imagenGaleria);
 };
 $this->executeTransaction($fnGuardaImagen); // Se pasa un callable
 }

 
}