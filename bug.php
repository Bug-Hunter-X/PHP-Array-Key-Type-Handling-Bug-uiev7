```php
<?php
function increment_array_value(&$arr, $key) {
  if (!isset($arr[$key])) {
    $arr[$key] = 0; // Initialize if key doesn't exist
  }
  $arr[$key]++;
}

$my_array = [];
increment_array_value($my_array, 'count');
echo $my_array['count']; // Outputs 1

increment_array_value($my_array, 'count');
echo $my_array['count']; // Outputs 2

// The bug
increment_array_value($my_array, 10); //Using an integer key
echo $my_array[10]; //Outputs 1

increment_array_value($my_array, 10); //Another increment
echo $my_array[10]; //Outputs 2

//This will show the problem
increment_array_value($my_array, '10');
echo $my_array['10']; //Outputs 1. Should be 3 if you look at the integers
?>
```