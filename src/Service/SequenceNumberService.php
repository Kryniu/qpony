<?php


namespace App\Service;


class SequenceNumberService
{
    /**
     * @param array $data
     * @return array
     */
    public function getMaxNumbers(array $data): array
    {
        $result = [];
        foreach($data as $key => $value) {
            if(null === $value) {
                continue;
            }
            $result[$key] = [
                'input' => $value,
                'output' => $this->getMaxNumber($value),
            ];
        }

        return $result;
    }
    /**
     * @param int $number
     * @return int
     */
    public function getMaxNumber(int $number): int
    {
        $a = [0 => 0, 1 => 1];
        for ($i = 0; $i < $number; $i++) {
            $a[2 * $i] = $a[$i];
            $a[2 * $i + 1] = $a[$i] + $a[$i + 1];
        }
        $a = array_slice($a, 0, $number + 1);

        return max($a);
    }
}