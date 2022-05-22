<?php
    
class zeroOnSides
{
    /** int[] */
    private $input = [
            [3,5,6,0,7,0,1],
            [5,0,0,6,0,8],
            [1,2,3,0,0,0,0],
            [1,2,3],
        ];
    
    /** int[] */
    private $output = [
            [0,3,5,6,7,1,0],
            [0,0,5,6,8,0],
            [0,0,1,2,3,0,0],
            [1,2,3],
        ];

    /**
     * @param int[] $numbers
     * 
     * @return int[]
     */ 
    private function convert(array $numbers): array
        {
            $count = 0;

            foreach ($numbers as $key => $val) {
                if ($val == 0 ) {
                    unset($numbers[$key]);
                    $count++;
            
                }
            }

            for($i = 1; $i <= $count; $i++ ) {
                if($i % 2) {
                    array_unshift($numbers, 0);
                } else {
                    $numbers[] = 0;    
                }
            }

            return $numbers;
        }
    
    /**
     * @param int[] $input
     * @param int[] $output
     * 
     * @return bool 
     */ 
    private function checker(array $input, array $output): bool
    {
        return $output == $this->convert($input);
    }

    public function show(): void
    {
        foreach($this->input as $key => $input) {
            var_dump($this->checker($input, $this->output[$key]));
        }
    }

}

$zero = new zeroOnSides();
$zero->show(); // true, true, true, true
