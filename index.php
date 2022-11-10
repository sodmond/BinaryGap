function solution($N) {
    // write your code in PHP7.4
    $c = str_split(decbin($N));
    if (!in_array('0', $c)){
        return 0;
    }
    $filter = array_filter($c, function($val) { 
        return $val > 0; 
    });
    if (count($filter) < 2){
        return 0;
    }
    $prevKey = 0;
    $temp = [];
    foreach ($filter as $key => $value) {
        if (array_key_first($filter) == $key) {
            $prevKey = $key;
            continue;
        }
        $temp[] = ($key - $prevKey) - 1;
        $prevKey = $key;
    }
    return max($temp);
}
