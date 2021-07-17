<?php

class MergeSort
{
    public function merge(array &$list, int $left, int $middle, int $right)
    {
        // Puntos medios de los subarrays
        $n1 = $middle - $left + 1;
        $n2 = $right - $middle;

        // Inicializa los sub arrays
        $L = [];
        $R = [];

        // Se llenan los nuevos subarrays con sus valores especificos
        // para cada lado
        for ($i = 0; $i < $n1; $i++) {
            $L[$i] = $list[$left + $i];
        }

        for ($j = 0; $j < $n2; $j++) {
            $R[$j] = $list[$middle + 1 + $j];
        }

        $i = $j = 0;
        $k = $left;

        while ($i < $n1 && $j < $n2) {
            if ($L[$i] < $R[$j]) {
                $list[$k] = $L[$i];
                $i++;
            } else {
                $list[$k] = $R[$j];
                $j++;
            }
            $k++;
        }


        while ($i < $n1) {
            $list[$k] = $L[$i];
            $i++;
            $k++;
        }

        while ($j < $n2) {
            $list[$k] = $R[$j];
            $j++;
            $k++;
        }
    }

    public function mergeSort(array &$list, int $left, int $right)
    {
        if ($left < $right) {
            // Se encuentra el punto medio del array
            $middle = $left + ($right - $left) / 2;

            // Primero se ordena la mitad izquierda 
            // y luego la mitad derecha
            $this->mergeSort($list, $left, $middle);
            $this->mergeSort($list, $middle + 1, $right);

            // por ultimo se mezclan ambos lados
            $this->merge($list, $left, $middle, $right);
        }
    }


    public static function main()
    {
        $inputList = [44, 56, 100, 1000, 32, 2, 1, -4, 5, -10];
        print_r($inputList);
        $mergesort = new MergeSort();
        $mergesort->mergeSort($inputList, 0, count($inputList) - 1);
        print("\n");
        print_r($inputList);
    }
}



MergeSort::main();
